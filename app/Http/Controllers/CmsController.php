<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CmsController extends Controller
{

    function MgtAbout() {

        $About = DB::table('abouts')->get();
        $Points = DB::table('about_points')->get();
        $Paragraphs = DB::table('about_paragraphs')->get();

        $data = [
            'Page'  => 'cms.MgtAbout',
            'Title' => 'About Us',
            'Desc'  => 'Manage About Us Page',
            'About' => $About,
            'Points' => $Points,
            'Paragraphs' => $Paragraphs,
        ];

        return view('index', $data);
    }

    // Update About Us record
    function UpdateAbout(Request $request) {
        $request->validate([
            'id'        => 'required',
            'TableName' => 'required',
        ]);

        $UploadUpdate = DB::table($request->TableName)
            ->where('id', $request->id)
            ->first();

        if ($request->hasFile('Image')) {
            // Delete old image if exists
            if (!empty($UploadUpdate->Image) && file_exists($UploadUpdate->Image)) {
                unlink($UploadUpdate->Image);
            }

            // Save new image
            $ImageName = time() . '_about.' . $request->Image->extension();
            $request->Image->move('uploads/about', $ImageName);

            // Update with image
            DB::table('abouts')->where('id', $request->id)->update([
                'Title'   => $request->Title,
                'Details' => $request->Details,
                'Image'   => 'uploads/about/' . $ImageName,
            ]);
        }

        // Update other fields (without replacing image if not uploaded)
        DB::table($request->TableName)->where('id', $request->id)
            ->update(
                $request->except([
                    '_token',
                    'TableName',
                    'id',
                    'Image',
                ])
            );

        return redirect()->back()->with('success', 'About Us updated successfully!');
    }

    function CreateAboutPoints(Request $request)  {
        DB::table('about_points')->insert([
            'AboutID' => $request->AboutID,
            'Point' => $request->Point,
        ]);

        return redirect()->back()->with('success', 'Point created successfully!');

    }
    function CreateAboutParagraph(Request $request)  {
        DB::table('about_paragraphs')->insert([
            'AboutID' => $request->AboutID,
            'SubTitle' => $request->SubTitle,
            'Paragraph' => $request->Paragraph,
        ]);

        return redirect()->back()->with('success', 'About paragraph added successfully!');

    }
    function UpdateAboutParagraph(Request $request)  {
        DB::table('about_paragraphs')->where('id',$request->id)->update([
            'SubTitle' => $request->SubTitle,
            'Paragraph' => $request->Paragraph,
        ]);

        return redirect()->back()->with('success', 'About paragraph updated successfully!');

    }


    function MgtSlider()  {

        $Sliders = DB::table('sliders')->get();

        $data = [
            'Page' => 'cms.MgtSlider',
            'Title' => 'Manage Sliders',
            'Desc' => 'Manage website sliders',
            'Sliders' => $Sliders,

        ];

        return view('index', $data);

    }
    function CreateSlider()  {
        $data = [
            'Page' => 'cms.CreateSlider',
            'Title' => 'Create Sliders',
            'Desc' => 'Create website sliders',

        ];

        return view('index', $data);

    }

    function UpdateSlider($id)  {
        $Slider = DB::table('sliders')
        ->where('id',$id)
        ->get();

        $SlideName = $Slider->value('Title');

        $data = [
            'Page' => 'cms.UpdateSlider',
            'Title' => 'Update Slider',
            'Desc' => 'Update Slider: '.$SlideName,
            'Slider' => $Slider,

        ];

        return view('index', $data);

    }

    function CreateSliderForm(Request $request)  {

        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '_cms.' . $request->Image->extension();
        $request->Image->move('uploads/cms/sliders', $imageName);

        try {
        DB::table('sliders')->insert([
            'Title' => $request->Title,
            'Image' => 'uploads/cms/sliders/' . $imageName,
            'Link' => $request->Link,
            'created_at' => now(),
        ]);

        return redirect()->route('MgtSlider')->with('success', 'Slider created successfully!');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
    }

    function UpdateSliderForm(Request $request)  {

        DB::table('sliders')->where('id',$request->id)->update([
            'Title' => $request->Title,
            'Link' => $request->Link,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully!');

    }
    function UpdateSliderImage($id)  {

        $Slider = DB::table('sliders')
        ->where('id',$id)
        ->get();

        $SlideName = $Slider->value('Title');

        $data = [
            'Page' => 'cms.UpdateSliderImage',
            'Title' => 'Update Slider Image',
            'Desc' => 'Update Slider Image: '.$SlideName,
            'Slider' => $Slider,

        ];

        return view('index', $data);


    }
    function UpdateSliderImageForm(Request $request)  {

        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '_cms.' . $request->Image->extension();
        $request->Image->move('uploads/cms/sliders', $imageName);


        DB::table('sliders')->where('id',$request->id)->update([
            'Image' => 'uploads/cms/sliders/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Slider updated successfully!');

    }

    function MgtSections()  {

        $AboutUs=DB::table('abouts')->get();
        $CounterData=DB::table('counters')->get();
        $VideoData=DB::table('videos')->get();
        $AboutData=DB::table('videos')->get();
        $AboutImages=DB::table('about_images')->get();
        $data = [
            'Page' => 'cms.MgtSections',
            'Title' => 'Manage Sections',
            'Desc' => 'Manage Website Sections',
            'AboutUs' => $AboutUs,
            'CounterData' => $CounterData,
            'VideoData' => $VideoData,
            'AboutData' => $AboutData,
            'AboutImages' => $AboutImages,

        ];

        return view('index', $data);

    }

    public function UpdateCounter(Request $request)
    {
        $exists = DB::table('counters')->exists();

        if (!$exists) {
            DB::table('counters')->insert([
                'Courses' => $request->Courses,
                'Students' => $request->Students,
                'Staff' => $request->Staff,
                'Awards' => $request->Awards,
            ]);
            return redirect()->back()->with('success', 'Section created successfully!');
        } else {
            DB::table('counters')->update([
                'Courses' => $request->Courses,
                'Students' => $request->Students,
                'Staff' => $request->Staff,
                'Awards' => $request->Awards,
            ]);
            return redirect()->back()->with('success', 'Section updated successfully!');
        }
    }
    public function UpdateVideo(Request $request)
    {

        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '_cms.' . $request->Image->extension();
        $request->Image->move('uploads/cms/video', $imageName);


        $exists = DB::table('videos')->exists();

        if (!$exists) {
            DB::table('videos')->insert([
                'Link' => $request->Link,
                'Title' => $request->Title,
                'Desc' => $request->Desc,
                'Image' => 'uploads/cms/video/' . $imageName,
            ]);
            return redirect()->back()->with('success', 'Section created successfully!');
        } else {
            DB::table('videos')->update([
                'Link' => $request->Link,
                'Title' => $request->Title,
                'Desc' => $request->Desc,
                'Image' => 'uploads/cms/video/' . $imageName,
            ]);
            return redirect()->back()->with('success', 'Section updated successfully!');
        }
    }

    function MgtCTA()  {

        $CTA = DB::table('call_to_actions')->get();

        $data=[
            'Page'=>'cms.MgtCTA',
            'Title'=>'Manage Call To Action',
            'Desc'=>'Manage Call To Action',
            'CTA'=>$CTA,
            'PDFJS'        => 'true',

            ];

            return view('index', $data);

    }

    function CreateCTA()  {

        $data=[
            'Page'=>'cms.CreateCTA',
            'Title'=>'Create Call To Action',
            'Desc'=>'Create Call To Action',

            ];

            return view('index', $data);
    }

    public function CreateCTAForm(Request $request)
    {
        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'Doc'   => 'required|mimes:pdf|max:40072',
        ]);

        // Optional extra safety check
        if (strtolower($request->file('Doc')->getClientOriginalExtension()) !== 'pdf') {
            return redirect()->back()->with("error", "The file must be a PDF. Upload Failed.");
        }

        // Save Image
        $imageName = time() . '_cms.' . $request->file('Image')->getClientOriginalExtension();
        $request->file('Image')->move('uploads/cta', $imageName);

        // Save PDF
        $fileName = time() . '_cms_file.' . $request->file('Doc')->getClientOriginalExtension();
        $request->file('Doc')->move('uploads/cta', $fileName);

        // Insert into database
        DB::table('call_to_actions')->insert([
            'Title' => $request->Title,
            'Desc' => $request->Desc,
            'Doc' => 'uploads/cta/' . $fileName,
            'Image' => 'uploads/cta/' . $imageName,
        ]);

        return redirect()->route('MgtCTA')->with('success', 'CTA created successfully!');
    }

    public function ActivateCTA(Request $request)
    {
        $CTA = DB::table('call_to_actions')->where('id', $request->id)->first();

        if (!$CTA) {
            return redirect()->back()->with('error', 'CTA not found.');
        }

        // Toggle logic
        $newStatus = ($CTA->status === 'true') ? 'false' : 'true';

        DB::table('call_to_actions')->where('id', $request->id)->update([
            'status' => $newStatus,
        ]);

        $message = $newStatus === 'true' ? 'CTA activated successfully' : 'CTA deactivated successfully';

        return redirect()->back()->with('success', $message);
    }

    function MgtFeatures()  {

        $Features = DB::table('features')->get();
        $data=[
            'Page'=>'cms.features.MgtFeatures',
            'Title'=>'Manage Features',
            'Desc'=>'Features & Offers',
            'Features' => $Features,

            ];

            return view('index', $data);

    }

    function CreateFeature(request $request) {

        DB::table('features')->insert([
            'Title' => $request->Title,
            'Desc' => $request->Desc,
            'Icon' => $request->Icon,
        ]);

        return redirect()->back()->with('success', 'Feature created successfully!');

    }
    function UpdateFeature(request $request) {

        DB::table('features')->where('id',$request->id)->update([
            'Title' => $request->Title,
            'Desc' => $request->Desc,
            'Icon' => $request->Icon,
        ]);

        return redirect()->back()->with('success', 'Feature updated successfully!');

    }

    function MgtWhy() {
        $Why = DB::table('whies')->get();
        $data = [
            'Page'=>'cms.MgtWhy',
            'Title'=>'Why Us',
            'Desc'=>'Manage Purpose',
            'Why' => $Why,

            ];

            return view('index', $data);

    }

    function CreateWhy(Request $request) {

        $ImageName = time() . '_cms.' . $request->Image->extension();
        $request->Image->move('uploads/why', $ImageName);

        DB::table('whies')->insert([
            'Title' => $request->Title,
            'Phrase' => $request->Phrase,
            'Image' => 'uploads/why/' . $ImageName,

        ]);
        return redirect()->back()->with('success', 'Purpose created successfully!');

    }

    function UpdateWhy($id) {

        $Why = DB::table('whies')->where('id',$id)->get();
        $data = [
            'Page'=>'cms.UpdateWhy',
            'Title'=>'Update',
            'Desc'=>'Update Purpose',
            'Why' => $Why,

            ];

            return view('index', $data);


    }

    function UpdateWhyForm(Request $request) {
        $request->validate([
            'id'          => 'required',
            'TableName'          => 'required',
        ]);

        $UploadUpdate = DB::table($request->TableName)
        ->where('id', $request->id)
        ->first();

    if ($request->hasfile('Image')) {

        unlink($UploadUpdate->Image);

        $ImageName = time() . '_cms.' . $request->Image->extension();

        $request->Image->move('uploads/why', $ImageName);

        DB::table('whies')->where('id',$request->id)->update([
            'Title' => $request->Title,
            'Phrase' => $request->Phrase,
            'Image' => 'uploads/why/' . $ImageName,

        ]);
    }

    DB::table($request->TableName)->where('id', $request->id)
    ->update(
        array_merge(
            $request->except([
                '_token',
                'TableName',
                'id',
                'Image',
            ]),

        )
    );

        return redirect()->back()->with('success', 'Purpose updated successfully!');
    }




}
