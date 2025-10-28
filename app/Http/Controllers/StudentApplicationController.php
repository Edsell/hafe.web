<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentApplicationRequest;
use App\Mail\NewStudentApplicationMail;
use App\Models\StudentApplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentApplicationController extends Controller
{
    public function create()
    {
        $data = ['Page' => 'pages.apply', 'Title' => 'Apply Now', 'Desc' => 'Student Registration'];
        return view('pgBg', $data);
    }

    public function store(StoreStudentApplicationRequest $request)
    {
        if ($request->filled('website')) {
            return back()->with('error','Invalid submission.');
        }

        $application = StudentApplications::create($request->validated());

        // Send email immediately (no queue) to env recipient
        $to = env('ADMISSIONS_TO_EMAIL', 'hafeschool@gmail.com');
        Mail::to($to)->send(new NewStudentApplicationMail($application));

        return redirect()->route('apply.thankyou');
    }

    public function thankyou()
    {
        $data = ['Page' => 'pages.apply-thanks', 'Title' => 'Thank You', 'Desc' => 'Application Received'];
        return view('pgBg', $data);
    }

    // ===== Admin CRUD (unchanged) =====
    public function index(Request $request)
    {
        $q = StudentApplications::query();
        if ($request->filled('status')) {
            $q->where('status', $request->status);
        }

        $applications = $q->latest()->paginate(20);

        // NOTE: pass $Title / $Desc like your other admin pages do
        $data = [
            'Page' => 'students.list',
            'Title' => 'Students',
            'Desc'  => 'Student Applications',
            'applications' => $applications,
        ];
        return view('index',$data);
    }

    public function show(StudentApplications $application)
    {
         $data = [
            'Page' => 'students.show',
            'application' => $application,
            'Title' => 'Students',
            'Desc'  => 'Application Details',
        ];
        return view('index', $data);
    }

    public function update(Request $request, StudentApplications $application)
    {
        $application->update($request->validate([
            'status' => ['required','in:submitted,reviewed,accepted,rejected']
        ]));
        return back()->with('success','Status updated.');
    }

    public function destroy(StudentApplications $application)
    {
        $application->delete();
        return back()->with('success','Application deleted.');
    }

    // Optional: resend the email to admissions
    public function resend(StudentApplications $application)
    {
        $to = env('ADMISSIONS_TO_EMAIL', 'hafeschool@gmail.com');
        Mail::to($to)->send(new NewStudentApplicationMail($application));

        return back()->with('success','Application email re-sent.');
    }
}
