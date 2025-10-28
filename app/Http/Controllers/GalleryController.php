<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    function MgtGallery()  {

        $Gallery = DB::table('galleries')->orderBy('created_at', 'desc')->get();

        $data=[
            'Page'=>'gallery.MgtGallery',
            'Title'=>'Manage Gallery',
            'Desc'=>'Manage Gallery Images',
            'Gallery'=>$Gallery,

            ];

            return view('index', $data);
    }

    function CreateGallery(Request $request) {

        // $request->validate([
        //     'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        // ]);


        if ($request->hasfile('Image')) {
            foreach ($request->file('Image') as $file) {
                $imageName = $file->getClientOriginalName();
                $file->move('uploads/gallery/', $imageName);
                $data[] = $imageName;

                $Gallery        = new Gallery;
                $Gallery->Image = 'uploads/gallery/' . $imageName;
                $Gallery->save();
            }
            return redirect()->back()->with("success", "Gallery images uploaded successfully");
        }

    }


}
