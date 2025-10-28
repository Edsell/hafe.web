<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    function MgtUsers(Request $request)  {

        $query = DB::table('users')
        ->where('users.id', '!=', '1') //super admin hidden
        ->select('users.*');

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });
    }

    $Users = $query->paginate(10)->withQueryString();

        $data = [
            'Page' => 'users.MgtUsers',
            'Title' => 'Users',
            'Desc' => 'Manage Users',
            'Users' => $Users,

        ];

        return view('index', $data);

    }

    function CreateUser() {

        $data = [
            'Page' => 'users.CreateUser',
            'Title' => 'Create User',
            'Desc' => 'Create User',

        ];

        return view('index', $data);

    }

    function CreateUserForm(Request $request)  {

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, //admin,doctor,manager
        ]);

        return redirect()->route('MgtUsers')->with('success', 'User created successfully');

    }
    function UpdateUser($id) {

        if ($id == 1) {
            abort(404); //super admin account "Forbidden"
        }

        $User = DB::table('users')->where('id',$id)->get();
        $UserUser = $User->value('name');
        $data = [
            'Page' => 'users.UpdateUser',
            'Title' => 'Update User',
            'Desc' => 'Update '.$UserUser,
            'User' => $User,

        ];

        return view('index', $data);

    }

    function UpdateUserForm(Request $request, $id)  {

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, //admin,doctor,manager
        ]);

        return redirect()->route('MgtUsers')->with('success', 'User updated successfully');

    }
    function UpdateUserAvatar(Request $request, $id)  {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '_user.' . $request->avatar->extension();
        $request->avatar->move('uploads/users/avatars', $imageName);

        DB::table('users')->where('id',$id)->update([
            'avatar' => 'uploads/users/avatars/' . $imageName,
        ]);
        return redirect()->back()->with("success", "User photo added successfully");

    }

    function UserProfile() {

        $User = DB::table('users')->where('id',Auth::user()->id)->get();
        $UserUser = $User->value('name');
        $data = [
            'Page' => 'users.UserProfile',
            'Title' => 'User Profile',
            'Desc' => 'Manage Account - '.$UserUser,
            'User' => $User,

        ];

        return view('index', $data);

    }

    function UpdateUserProfile(Request $request)  {

        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        DB::table('users')->where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');

    }

    function UpdateUserProfileAvatar(Request $request)  {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '_user.' . $request->avatar->extension();
        $request->avatar->move('uploads/users/avatars', $imageName);

        DB::table('users')->where('id',Auth::user()->id)->update([
            'avatar' => 'uploads/users/avatars/' . $imageName,
        ]);
        return redirect()->back()->with("success", "Profile photo updated successfully");

    }
    public function DeleteUserProfileAvatar()
    {
        $user = Auth::user();

        // Check if user has a custom avatar and if the file exists
        if ($user->avatar && File::exists(public_path($user->avatar))) {
            File::delete(public_path($user->avatar));
        }

        // Option 1: Set avatar to null
        DB::table('users')->where('id', $user->id)->update([
            'avatar' => null,
        ]);

        return redirect()->back()->with('success', 'Profile photo deleted successfully');
    }
    public function DeleteUserAvatar($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        // Check if avatar exists and delete the file
        if ($user && $user->avatar && File::exists(public_path($user->avatar))) {
            File::delete(public_path($user->avatar));
        }

        DB::table('users')->where('id', $id)->update([
            'avatar' => null,
        ]);

        return redirect()->back()->with('success', 'User avatar deleted successfully');
    }
}
