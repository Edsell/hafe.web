<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use function seoMeta;
use DB;

class HomeController extends Controller
{

    function Home() {

        $Slider = DB::table('sliders')
        ->where('status','1')->get();

        $Gallery = DB::table('galleries')
        ->limit(6)->latest()->get();

        $About = DB::table('abouts')->get();
        $Points = DB::table('about_points')->get();
        $Paragraphs = DB::table('about_paragraphs')->get();

        $WhyUs = DB::table('whies')->get();

        $Blogs = DB::table('blogs')
        ->where('status', 1)
        ->orderByDesc('created_at')
        ->limit(6)
        ->get();

        $Blogs = DB::table('blogs as b')
        ->leftJoinSub(
            DB::table('blog_comments')
                ->selectRaw('blog_id, COUNT(*) as approved_comments_count')
                ->where('is_approved', 1)
                ->groupBy('blog_id'),
            'ac',
            'ac.blog_id',
            '=',
            'b.id'
        )
        ->select('b.*', DB::raw('COALESCE(ac.approved_comments_count, 0) as approved_comments_count'))
        ->orderByDesc('b.created_at')
        ->get();


        $data = [
            'Page' => 'home',
            'Title' => 'Welcome',
            'Slider' => $Slider,
            'Gallery' => $Gallery,
            'About' => $About,
            'Points' => $Points,
            'Paragraphs' => $Paragraphs,
            'WhyUs' => $WhyUs,
            'Blogs' => $Blogs,
        ];
        return view('home',$data);
    }

    function AboutPage()  {

        $Gallery = DB::table('galleries')
        ->limit(6)->latest()->get();

        $About = DB::table('abouts')->get();
        $Points = DB::table('about_points')->get();
        $Paragraphs = DB::table('about_paragraphs')->get();

        $WhyUs = DB::table('whies')->get();

        $AboutTitleHere = $About->value('Title');
        $AboutDetailsHere = $About->value('Details');
        $AboutImageHere = $About->value('Image');

        $meta = seoMeta(
            $AboutTitleHere,
            $AboutDetailsHere,
            asset($AboutImageHere),
            route('AboutPage')
        );


        $data = [
            'Page' => 'pages.about',
            'Title' => 'About Us',
            'Desc' => 'About',
            'Gallery' => $Gallery,
            'About' => $About,
            'Points' => $Points,
            'Paragraphs' => $Paragraphs,
            'WhyUs' => $WhyUs,
            'meta' => $meta,
        ];
        return view('pgBg',$data);

    }

    // function BlogPage() {

    //     $Gallery = DB::table('galleries')
    //     ->limit(6)->latest()->get();

    //     $Blogs = DB::table('blogs')->get();

    //     $Categories = BlogCategory::withCount('blogs')->get();

    //     $blogsAll = DB::table('blogs')->get();

    //     $Gallery = DB::table('galleries')
    //     ->limit(6)->get();


    //     $data = [
    //         'Page' => 'pages.blogs',
    //         'Title' => 'Our Blog Posts',
    //         'Desc' => 'Blog',
    //         'Gallery' => $Gallery,
    //         'Blogs' => $Blogs,
    //         'Categories' => $Categories,
    //         'blogsAll' => $blogsAll,

    //     ];
    //     return view('pgBg',$data);

    // }

    // app/Http/Controllers/PageController.php


    public function BlogPage(Request $request)
    {
        $q        = trim((string) $request->input('q', ''));
        $category = $request->integer('category'); // CategoryID from query string
        $type     = $request->input('type');       // optional: 'video' or 'article'

        // Base: published blogs
        $query = DB::table('blogs')->where('status', '1');

        // Optional: filter by type (video/article)
        if (filled($type) && in_array($type, ['video','article'], true)) {
            $query->where('Type', $type);
        }

        // Keyword search (optional)
        if ($q !== '') {
            $query->where(function ($w) use ($q) {
                $w->where('Name', 'like', "%{$q}%")
                  ->orWhere('Details', 'like', "%{$q}%")
                  ->orWhere('Author', 'like', "%{$q}%");
            });
        }

        // Category filter (optional)
        if ($category) {
            $query->where('CategoryID', $category);
        }

        // Subquery: approved comments per blog
        $approvedCounts = DB::table('blog_comments')
            ->selectRaw('blog_id, COUNT(*) AS approved_comments_count')
            ->where('is_approved', 1)
            ->groupBy('blog_id');

        // Attach the count to each blog in your main query
        $query = $query
            ->leftJoinSub($approvedCounts, 'ac', 'ac.blog_id', '=', 'blogs.id')
            ->addSelect(
                'blogs.*',
                DB::raw('COALESCE(ac.approved_comments_count, 0) AS approved_comments_count')
            )
            ->orderByDesc('blogs.created_at');

        // Keep your pagination exactly as you have it
        $blogsAll = $query->paginate(9)->withQueryString();

        // Categories + counts of published blogs in each category
        $Categories = DB::table('blog_categories as c')
            ->leftJoin('blogs as b', function ($join) {
                $join->on('b.CategoryID', '=', 'c.id')->where('b.status', '=', '1');
            })
            ->select('c.id', 'c.CategoryName', DB::raw('COUNT(b.id) as blogs_count'))
            ->groupBy('c.id', 'c.CategoryName')
            ->orderBy('c.CategoryName')
            ->get();

        // Optional: currently selected category (for active state)
        $selectedCategory = $category
            ? $Categories->firstWhere('id', $category)
            : null;

        return view('pgBg', [
            'Page'              => 'pages.blogs',
            'Title'             => 'Our Blog',
            'Desc'              => 'Blog',
            'blogsAll'          => $blogsAll,
            'Categories'        => $Categories,
            'selectedCategory'  => $selectedCategory,
            'selectedType'      => $type, // pass through to view (optional)
        ]);
    }



    function BlogDetails($slug)  {

        $blogsRaw = DB::table('blogs as B')
            ->where('B.slug', $slug)
            ->join('blog_categories as C', 'C.id', '=', 'B.CategoryID')
            ->leftJoin('blog_paragraphs as P', 'P.BlogID', '=', 'B.id')
            ->select(
                'B.*',
                'C.CategoryName as category_name',
                'P.id as paragraph_id', 'P.Paragraph as paragraph_text', 'P.Title as paragraph_title',
            )
            ->orderBy('P.created_at', 'asc')
            ->get();

            $BlogNameHere = $blogsRaw->value('Name');
            $BlogDetailsHere = $blogsRaw->value('Details');
            $BlogImageHere = $blogsRaw->value('Image');

        $Blogs = $blogsRaw->groupBy('id')->map(function($items) {
            $blog = $items->first();

            $blog->paragraphs = $items->map(fn($i) => (object)[
                'id' => $i->paragraph_id,
                'title' => $i->paragraph_title,
                'paragraph' => $i->paragraph_text
            ])->unique('id')->values();

            return $blog;
        });



        $Categories = BlogCategory::withCount('blogs')->get();

        $blogsAll = DB::table('blogs')->get();

        $Gallery = DB::table('galleries')
        ->limit(6)->get();

        $catNameP = DB::table('blog_categories as C')
        ->join('blogs as B','B.CategoryID','=','C.id')
        ->where('B.slug',$slug)->get();
        $catName = $catNameP->value('CategoryName');

        $comments = DB::table('blogs as B')
        ->where('B.slug', $slug)
        ->leftJoin('blog_comments as C','C.blog_id','=','B.id')
        ->where('C.is_approved', 1)
        ->orderBy('C.created_at', 'desc')
        ->get();

        $commentsCount = $comments->count();

        $meta = seoMeta(
            $BlogNameHere,
            $BlogDetailsHere,
            asset($BlogImageHere),
            route('BlogDetails', $slug)
        );


        $data = [
            'Page' => 'pages.blogDetails',
            'Title' => $BlogNameHere,
            'Desc' => 'Blog Details',
            'Blogs' => $Blogs,
            // 'Tags' => $Tags,
            'Categories' => $Categories,
            'blogsAll' => $blogsAll,
            'Gallery' => $Gallery,
            'catName' => $catName,
            'comments' => $comments,
            'commentsCount' => $commentsCount,
            'meta' => $meta,
        ];

        return view('pgBg',$data);

    }

    function ContactPage(Request $request) {


        // Generate a simple math CAPTCHA and store the answer in session
        $a = random_int(2, 9);
        $b = random_int(1, 9);
        $request->session()->put('captcha_answer', $a + $b);

        $data = [
            'Page' => 'pages.contact',
            'Title' => 'Contact',
            'Desc' => 'Contact Us',
            // pass captcha numbers to the view
            'captchaA' => $a,
            'captchaB' => $b,
        ];

        return view('pgBg',$data);

    }
    function FAQ() {


        $Gallery = DB::table('galleries')
        ->limit(6)->get();

        $data = [
            'Page' => 'pages.faq',
            'Title' => 'FAQ',
            'Desc' => 'Frequently Asked Questions',
            'Gallery' => $Gallery,
        ];

        return view('pgBg',$data);

    }
    function GalleryPage() {


        $Gallery = DB::table('galleries')
        ->limit(6)->get();

        $GalleryAll = DB::table('galleries')
        ->orderByDesc('created_at')
        ->paginate(24);

        $data = [
            'Page' => 'pages.gallery',
            'Title' => 'Gallery',
            'Desc' => 'Our Gallery',
            'Gallery' => $Gallery,
            'GalleryAll' => $GalleryAll,
        ];

        return view('pgBg',$data);

    }
    function PrivacyPolicy() {


        $data = [
            'Page'  => 'pages.privacy',
            'Title' => 'Privacy Policy',
            'Desc'  => 'Our commitment to your privacy',
        ];

        return view('pgBg',$data);

    }

}
