<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Blogs;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class BlogController extends Controller
{

    function MgtBlogs() {

        $Blogs = Blogs::with([
            'category',
            'paragraphs' => fn($q) => $q->orderBy('created_at', 'asc'),
        ])
        ->latest()
        ->paginate(10)
        ->withQueryString();

        $data = [
            'Page'  => 'blogs.MgtBlogs',
            'Title' => 'Blogs',
            'Desc'  => 'Manage Blogs',
            'Blogs' => $Blogs,
        ];

        return view('index', $data);
    }

    function CreateBlog()  {

        $Category = DB::table('blog_categories')->get();

        $data = [
            'Page'=>'blogs.CreateBlog',
            'Title'=>'Create',
            'Desc'=>'Create Blog',
            'Category'=> $Category,

            ];

            return view('index', $data);
    }
    function UpdateBlog($id)  {
        $Blog = DB::table('blogs as B')
        ->where('B.id',$id)
        ->join('blog_categories as C','C.id','=','B.CategoryID')
        ->select('B.*','C.CategoryName','C.id as CatID')
        ->get();

        $Category = DB::table('blog_categories')->get();

        $data = [
            'Page'=>'blogs.UpdateBlog',
            'Title'=>'Update',
            'Desc'=>'Update Blog',
            'Blog' => $Blog,
            'Category' => $Category,

            ];

            return view('index', $data);
    }

    protected function makeUniqueSlug(string $name, ?int $ignoreId = null): string
{
    $base = Str::slug($name, '-');
    $slug = $base;
    $i = 1;

    while (
        DB::table('blogs')
          ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
          ->where('slug', $slug)
          ->exists()
    ) {
        $slug = $base.'-'.$i++;
    }

    return $slug;
}


public function CreateBlogForm(Request $request)
{
    $request->validate([
        'CategoryID' => ['required'],
        'Name'       => ['required','string','max:255'],
        'Details'    => ['nullable','string'],
        'Image'      => ['required','image','mimes:jpeg,png,jpg,gif,svg,webp','max:4096'],
    ]);

    // Build filename safely
    $ext        = $request->file('Image')->extension();
    $imageName  = time().'_blog.'.$ext;
    $targetDir  = public_path('uploads/blogs');
    if (!File::exists($targetDir)) {
        File::makeDirectory($targetDir, 0755, true);
    }

    // Move file (your convention)
    $request->file('Image')->move($targetDir, $imageName);
    $imageRelativePath = 'uploads/blogs/'.$imageName;

    // Optimize in place
    ImageOptimizer::optimize(public_path($imageRelativePath));

    // Unique slug
    $slug = $this->makeUniqueSlug($request->Name);

    DB::table('blogs')->insert([
        'CategoryID' => $request->CategoryID,
        'Name'       => $request->Name,
        'Author'     => Auth::user()->name ?? 'HAFE',
        'Details'    => $request->Details,
        'Image'      => $imageRelativePath,
        'slug'       => $slug,
        'status'     => '1',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('MgtBlogs')->with('success', 'Blog created successfully!');
}

public function UpdateBlogForm(Request $request)
{
    $request->validate([
        'id'        => ['required','integer'],
        'TableName' => ['required','in:blogs'], // guard the table name
        'Name'      => ['required','string','max:255'],
        'CategoryID'=> ['required'],
        'Details'   => ['nullable','string'],
        'Image'     => ['nullable','image','mimes:jpeg,png,jpg,gif,svg,webp','max:4096'],
    ]);

    // Fetch current row
    $row = DB::table($request->TableName)->where('id', $request->id)->first();
    if (!$row) {
        return back()->withErrors(['id' => 'Blog not found.']);
    }

    $updates = [
        'CategoryID' => $request->CategoryID,
        'Name'       => $request->Name,
        'Author'     => Auth::user()->name ?? ($row->Author ?? 'HAFE'),
        'Details'    => $request->Details,
        'updated_at' => now(),
        'slug'       => $this->makeUniqueSlug($request->Name, $request->id),
    ];

    // If a new image is uploaded
    if ($request->hasFile('Image')) {
        // Delete old image if it exists and is a local file
        if (!empty($row->Image) && File::exists(public_path($row->Image))) {
            File::delete(public_path($row->Image));
        }

        // Fix: ensure a DOT before extension (your original had none)
        $ext        = $request->file('Image')->extension();
        $ImageName  = time().'_blog.'.$ext; // also normalized to _blog for consistency
        $targetDir  = public_path('uploads/blogs');
        if (!File::exists($targetDir)) {
            File::makeDirectory($targetDir, 0755, true);
        }

        $request->file('Image')->move($targetDir, $ImageName);
        $newRelative = 'uploads/blogs/'.$ImageName;

        // Optimize
        ImageOptimizer::optimize(public_path($newRelative));

        $updates['Image'] = $newRelative;
    }

    // Apply updates (your convention)
    DB::table($request->TableName)
        ->where('id', $request->id)
        ->update($updates);

    return redirect()->route('MgtBlogs')->with('success', 'Blog updated successfully!');
}


    function MgtBlogCategory()  {

        $Categories = DB::table('blog_categories')->get();

        $data = [
            'Page'=>'blogs.MgtBlogCategory',
            'Title'=>'Categories',
            'Desc'=>'Manage Categories',
            'Categories' => $Categories,

            ];

            return view('index', $data);
    }

    function CreateBlogCategory(Request $request) {

        DB::table('blog_categories')->insert([
            'CategoryName' => $request->CategoryName
        ]);
        return redirect()->back()->with('success', 'Category created successfully!');

    }
    function UpdateBlogCategory(Request $request) {

        DB::table('blog_categories')->where('id',$request->id)->update([
            'CategoryName' => $request->CategoryName
        ]);
        return redirect()->back()->with('success', 'Category updated successfully!');

    }

    function BlogParagraph($id)  {
        $Blog = DB::table('blogs')
        ->where('id',$id)->get();

        $data = [
            'Page'=>'blogs.BlogParagraph',
            'Title'=>'Paragraph',
            'Desc'=>'Create Blog Paragraph',
            'Blog' => $Blog,

            ];

            return view('index', $data);
    }

    function CreateBlogParagraph(Request $request) {
        DB::table('blog_paragraphs')->insert([
            'BlogID' => $request->BlogID,
            'Title' => $request->Title,
            'Paragraph' => $request->Paragraph,
            'created_at' => now(),
        ]);
        return redirect()->route('MgtBlogs')->with('success', 'Paragraph created successfully!');

    }
    function UpdateBlogParagraph(Request $request) {
        DB::table('blog_paragraphs')->where('id',$request->id)->update([
            'Title' => $request->Title,
            'Paragraph' => $request->Paragraph,
            'updated_at' => now(),
        ]);
        return redirect()->route('MgtBlogs')->with('success', 'Paragraph updated successfully!');

    }

    // Create Blog Quote
    function CreateBlogQuote(Request $request) {
        DB::table('blog_quotes')->insert([
            'BlogID'     => $request->BlogID,
            'Quote'      => $request->Quote,
            'Author'     => $request->Author,
            'created_at' => now(),
        ]);

        return redirect()->route('MgtBlogs')->with('success', 'Quote created successfully!');
    }

    // Update Blog Quote
    function UpdateBlogQuote(Request $request) {
        DB::table('blog_quotes')->where('id', $request->id)->update([
            'Quote'      => $request->Quote,
            'Author'     => $request->Author, // optional
            'updated_at' => now(),
        ]);

        return redirect()->route('MgtBlogs')->with('success', 'Quote updated successfully!');
    }

    // Create Blog Tag
    function CreateBlogTags(Request $request) {
        $request->validate([
            'BlogID' => 'required|exists:blogs,id',
            'Tags' => 'required|string',
        ]);

        $tags = explode(',', $request->Tags); // Split by commas
        foreach ($tags as $tag) {
            $trimmedTag = trim($tag);
            if ($trimmedTag !== '') {
                DB::table('blog_tags')->insert([
                    'BlogID' => $request->BlogID,
                    'Tags' => $trimmedTag,
                    'slug' => Str::slug($request->Tags),
                    'created_at' => now(),
                ]);
            }
        }

        return redirect()->route('MgtBlogs')->with('success', 'Tags added successfully!');
    }


    // Update Blog Tag
    function UpdateBlogTag(Request $request) {
        DB::table('blog_tags')->where('id', $request->id)->update([
            'Tag'        => $request->Tag,
            'slug' => Str::slug($request->Tags),
            'updated_at' => now(),
        ]);

        return redirect()->route('MgtBlogs')->with('success', 'Tag updated successfully!');
    }



    //Video blogs logic

private function extractYouTubeId(string $url): ?string
{
    // Handles full, short, and embed links
    $patterns = [
        '/youtube\.com\/watch\?v=([^\&\?\/]+)/',
        '/youtube\.com\/embed\/([^\&\?\/]+)/',
        '/youtu\.be\/([^\&\?\/]+)/',
        '/youtube\.com\/shorts\/([^\&\?\/]+)/',
    ];
    foreach ($patterns as $p) {
        if (preg_match($p, $url, $matches)) {
            return $matches[1];
        }
    }
    return null;
}

public function CreateVideoBlog()
{
    $Category = DB::table('blog_categories')->get();

    return view('index', [
        'Page'     => 'blogs.CreateVideoBlog',
        'Title'    => 'Create',
        'Desc'     => 'Create Video Blog',
        'Category' => $Category,
    ]);
}

public function CreateVideoBlogForm(Request $request)
{
    $request->validate([
        'CategoryID' => 'required',
        'Name'       => 'required|string|max:255',
        'VideoURL'   => 'required|url',
        'Image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // optional custom thumb
    ]);

    $videoId = $this->extractYouTubeId($request->VideoURL);
    if (!$videoId) {
        return back()->withErrors(['VideoURL' => 'Please provide a valid YouTube link.'])->withInput();
    }

    $imagePath = null;
    if ($request->hasFile('Image')) {
        $imageName = time() . '_blog_thumb.' . $request->Image->extension();
        $request->Image->move('uploads/blogs', $imageName);
        $imagePath = 'uploads/blogs/' . $imageName;
    }

    DB::table('blogs')->insert([
        'CategoryID' => $request->CategoryID,
        'Name'       => $request->Name,
        'Author'     => Auth::user()->name,
        'Details'    => $request->Details,
        'Image'      => $imagePath, // optional custom thumbnail
        'Type'       => 'video',
        'VideoURL'   => $request->VideoURL,
        'VideoID'    => $videoId,
        'status'     => 1,
        'slug'       => Str::slug($request->Name, '-'),
        'created_at' => now(),
    ]);

    return redirect()->route('MgtBlogs')->with('success', 'Video blog created successfully!');
}

public function UpdateVideoBlog($id)
{
    $Blog = DB::table('blogs as B')
        ->where('B.id', $id)
        ->join('blog_categories as C', 'C.id', '=', 'B.CategoryID')
        ->select('B.*', 'C.CategoryName', 'C.id as CatID')
        ->first();

    if (!$Blog || $Blog->Type !== 'video') {
        abort(404);
    }

    $Category = DB::table('blog_categories')->get();

    return view('index', [
        'Page'     => 'blogs.UpdateVideoBlog',
        'Title'    => 'Update',
        'Desc'     => 'Update Video Blog',
        'Blog'     => [$Blog], // your views often expect a collection
        'Category' => $Category,
    ]);
}

public function UpdateVideoBlogForm(Request $request)
{
    $request->validate([
        'id'        => 'required|exists:blogs,id',
        'CategoryID'=> 'required',
        'Name'      => 'required|string|max:255',
        'VideoURL'  => 'required|url',
        'Image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $videoId = $this->extractYouTubeId($request->VideoURL);
    if (!$videoId) {
        return back()->withErrors(['VideoURL' => 'Please provide a valid YouTube link.'])->withInput();
    }

    $update = [
        'CategoryID' => $request->CategoryID,
        'Name'       => $request->Name,
        'Author'     => Auth::user()->name,
        'Details'    => $request->Details,
        'Type'       => 'video',
        'VideoURL'   => $request->VideoURL,
        'VideoID'    => $videoId,
        'slug'       => Str::slug($request->Name, '-'),
        'updated_at' => now(),
    ];

    if ($request->hasFile('Image')) {
        $imageName = time() . '_blog_thumb.' . $request->Image->extension();
        $request->Image->move('uploads/blogs', $imageName);
        $update['Image'] = 'uploads/blogs/' . $imageName;
    }

    DB::table('blogs')->where('id', $request->id)->update($update);

    return redirect()->route('MgtBlogs')->with('success', 'Video blog updated successfully!');
}




}
