<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GeneralSettingsController extends Controller
{
    function GeneralSettings()  {

        $Settings = DB::table('general_settings')->get();

        $data = [
            'Page' => 'settings.GeneralSettings',
            'Title' => 'General Settings',
            'Desc' => 'Manage Company Settings',
            'Settings' => $Settings,

        ];

        return view('index', $data);

    }

    function CreateGeneralSettings(Request $request)  {

        try {
        DB::table('general_settings')->insert([
            'CompanyName' => $request->CompanyName,
            'Code' => $request->Code,
            'Phone' => $request->Phone,
            'Phone2' => $request->Phone2,
            'Plot' => $request->Plot,
            'Address' => $request->Address,
            'Email' => $request->Email,
            'Country' => $request->Country,
            'Currency' => $request->Currency,
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Settings created successfully!');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
    }
    function UpdateGeneralSettings(Request $request)  {

        try {
        DB::table('general_settings')->where('id',$request->id)->update([
            'CompanyName' => $request->CompanyName,
            'Code' => $request->Code,
            'Phone' => $request->Phone,
            'Phone2' => $request->Phone2,
            'Plot' => $request->Plot,
            'Address' => $request->Address,
            'Email' => $request->Email,
            'Country' => $request->Country,
            'Currency' => $request->Currency,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully!');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
    }

    function MgtFeatures()  {

        $Settings = DB::table('general_settings')->get();

        $data = [
            'Page' => 'settings.MgtFeatures',
            'Title' => 'General Features',
            'Desc' => 'Manage Company Features',
            'Settings' => $Settings,

        ];

        return view('index', $data);
    }

    function UpdateLogo(Request $request)  {

        $request->validate([
            'Logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'logo.' . $request->Logo->extension();
        $request->Logo->move('uploads', $imageName);

        DB::table('general_settings')->where('id',$request->id)->update([
            'Logo' => 'uploads/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Logo updated successfully!');
    }
    function UpdateCrumb(Request $request)  {

        $request->validate([
            'Crumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'crumb.' . $request->Crumb->extension();
        $request->Crumb->move('uploads', $imageName);

        DB::table('general_settings')->where('id',$request->id)->update([
            'Crumb' => 'uploads/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Crumb updated successfully!');
    }
}
