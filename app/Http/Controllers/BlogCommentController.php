<?php

namespace App\Http\Controllers;

use App\Models\BlogComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BlogCommentController extends Controller
{
    public function MgtComments(Request $request)
    {
        $status = $request->input('status', 'pending');

        $comments = DB::table('blog_comments as C')
            ->join('blogs as B', 'B.id', '=', 'C.blog_id')
            ->select(
                'C.id','C.name','C.email','C.content','C.is_approved','C.created_at','C.approved_at',
                'B.Name as BlogTitle','B.slug as BlogSlug','B.id as BlogID'
            )
            ->when($status === 'pending', fn($q) => $q->where('C.is_approved', 0))
            ->when($status === 'approved', fn($q) => $q->where('C.is_approved', 1))
            ->orderByDesc('C.created_at')
            ->paginate(20)
            ->withQueryString();

        $data = [
            'Page'    => 'blogs.MgtComments',
            'Title'   => 'Comments',
            'Desc'    => 'Manage Comments',
            'Comments'=> $comments,
            'Status'  => $status,
        ];

        return view('index', $data);
    }

    public function UpdateComment($id)
    {
        $Comment = DB::table('blog_comments as C')
            ->join('blogs as B', 'B.id', '=', 'C.blog_id')
            ->select('C.*', 'B.Name as BlogTitle', 'B.slug as BlogSlug', 'B.id as BlogID')
            ->where('C.id', $id)
            ->first();

        if (!$Comment) abort(404);

        $data = [
            'Page'    => 'blogs.UpdateComment',
            'Title'   => 'Update',
            'Desc'    => 'Update Comment',
            'Comment' => $Comment,
        ];

        return view('index', $data);
    }

    /**
     * Approve a pending comment (AJAX or form POST)
     */
    public function ApproveComment($id)
    {
        $affected = DB::table('blog_comments')
            ->where('id', $id)
            ->where('is_approved', 0)
            ->update(['is_approved' => 1, 'approved_at' => now()]);

        return back()->with('success', $affected ? 'Comment approved.' : 'Comment already approved or not found.');
    }

    public function DeleteComment($id)
    {
        DB::table('blog_comments')->where('id', $id)->delete();
        return back()->with('success', 'Comment deleted.');
    }

    public function SaveComment(Request $request, $id)
    {
        $request->validate([
            'content' => ['required','string','min:5','max:4000'],
            'name'    => ['required','string','max:120'],
            'email'   => ['required','email','max:190'],
            'is_approved' => ['nullable','boolean'],
        ]);

        DB::table('blog_comments')->where('id', $id)->update([
            'content'     => $request->string('content'),
            'name'        => $request->string('name'),
            'email'       => $request->string('email'),
            'is_approved' => (bool)$request->boolean('is_approved'),
            'approved_at' => $request->boolean('is_approved') ? now() : null,
            'updated_at'  => now(),
        ]);

        return redirect()->route('admin.MgtComments')->with('success', 'Comment updated.');
    }



    public function CreateComment(Request $request, string $slug)
    {
        // Honeypot + validation
        $rules = [
            'name'    => ['required','string','max:120'],
            'email'   => ['required','email','max:190'],
            'content' => ['required','string','min:5','max:4000'],
            'website' => ['nullable','prohibited'],         // honeypot must be empty
            'comment_started_at' => ['nullable','date'],    // timing honeypot
        ];
        $messages = ['website.prohibited' => 'Form verification failed.'];

        $v = Validator::make($request->all(), $rules, $messages);
        $v->after(function($validator) use ($request) {
            // at least 3s “thinking” time
            $started = $request->input('comment_started_at');
            if ($started) {
                try {
                    $delta = now()->diffInSeconds(\Carbon\Carbon::parse($started), false);
                    if (abs($delta) < 3) {
                        $validator->errors()->add('content','Please take a moment before submitting.');
                    }
                } catch (\Throwable $e) {
                    $validator->errors()->add('content','Please try again.');
                }
            }
        });
        if ($v->fails()) {
            return back()->withErrors($v)->withInput();
        }

        // Find blog by slug
        $blog = DB::table('blogs')->where('slug', $slug)->first();
        abort_if(!$blog, 404);

        // Create pending comment (needs admin approval)
        BlogComments::create([
            'blog_id'    => $blog->id,
            'name'       => $request->string('name'),
            'email'      => $request->string('email'),
            'content'    => $request->string('content'),
            'is_approved'=> false,
            'ip'         => $request->ip(),
            'user_agent' => (string) $request->header('User-Agent'),
        ]);

        return back()->with('comment_submitted', 'Thanks! Your comment is awaiting approval.');
    }


}
