<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function MgtSlider()
    {
        $sliders = Slider::latest()->get();

        $data = [
            'Page'  => 'slider.MgtSlider',
            'Title' => 'Slider',
            'Desc'  => 'Manage Slider',
            'sliders' => $sliders,
        ];

        return view('index', $data);

    }
    public function CreateSlider()
    {

        $data = [
            'Page'  => 'slider.CreateSlider',
            'Title' => 'Create',
            'Desc'  => 'Create Slider',
        ];

        return view('index', $data);

    }


    // Store new slider
    public function CreateSliderForm(Request $request)
    {
        $validated = $request->validate([
            'Phrase' => 'required',
            'Span'   => 'required',
            'Text'   => 'required',
            'Image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        $imageName = time() . '_slider.' . $request->Image->extension();
        $request->Image->move('uploads/sliders', $imageName);

        DB::table('sliders')->insert([
            'Phrase' => $request->Phrase,
            'Span' => $request->Span,
            'Text' => $request->Text,
            'created_at' => now(),
            'Image' => 'uploads/sliders/' . $imageName,
        ]);

        return redirect()->route('MgtSlider')->with('success', 'Slider created successfully!');
    }

    // Show edit form
    public function UpdateSlider($id)
    {
        $slider = Slider::findOrFail($id);

        $data = [
            'Page'  => 'slider.UpdateSlider',
            'Title' => 'Update Slider',
            'Desc'  => 'Update Slider',
            'slider' => $slider,
        ];

        return view('index', $data);
    }

    // Update slider
    public function UpdateSliderForm(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        // $validated = $request->validate([
        //     'Phrase' => 'required|string|max:255',
        //     'Span'   => 'required|string|max:255',
        //     'Text'   => 'required|string|max:500',
        //     'Image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        // ]);

        $request->validate([
            'id'          => 'required',
            'TableName'          => 'required',
        ]);

        $UploadUpdate = DB::table($request->TableName)
        ->where('id', $request->id)
        ->first();

    if ($request->hasfile('Image')) {

        unlink($UploadUpdate->Image);

        $ImageName = time() . '_slider' . $request->Image->extension();

        $request->Image->move('uploads/sliders', $ImageName);

        DB::table('sliders')->where('id', $request->id)->update([
            'Phrase' => $request->Phrase,
            'Span' => $request->Span,
            'Text' => $request->Text,
            'updated_at_at' => now(),
            'Image' => 'uploads/sliders/' . $ImageName,
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

        return redirect()->route('MgtSlider')->with('success', 'Slider updated successfully!');
    }



    // Toggle status
    public function toggleStatus(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = $slider->status == 1 ? 0 : 1;
        $slider->save();

        return redirect()->route('MgtSlider')->with('success', 'Slider status updated!');
    }
}
