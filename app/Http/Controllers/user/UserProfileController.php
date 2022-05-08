<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\controller;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Contact;
use App\Models\User_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\hash;


class UserProfileController extends Controller
{
    public function compliteAccountInfo()
    {
        $Profile = User_profile::where('user_id', Auth::id())->first();

        if ($Profile == null) {
            return view('user.profile.compliteProfileInfo');
        } else {
            return redirect()->route('main.page');
        }
    }

    public function storeAccountInfo(Request $request)
    {
        $this->validate($request, [
            'province' => 'required',
            'gender' => 'required',
            'Phone_number' => 'required',
        ]);
        $profile = User_profile::create([
            'province' => $request->province,
            'gender' => $request->gender,
            'Phone_number' => $request->Phone_number,
            'user_id' => Auth::id(),
            'image' => 'upload/profile/nophoto.png',
        ]);

        if ($request->has('image') &&$request->image!=null) {
            $photo = $request->image;
            $newPhoto = time() . $photo->getClientOriginalName();
            $photo->move('upload/profile', $newPhoto);
            $profile->image = 'upload/profile/' . $newPhoto;
            $profile->save();
        }

        return redirect()->route('main.page');
    }


    public function editProfile()
    {
        $hotelInfo = Hotel::all();
        $contacts = Contact::all();
        $user = User::find(Auth::id());
        $profile = User_profile::where('user_id', Auth::id())->first();
        return view('user.settings.editprofile', compact('hotelInfo', 'contacts', 'user', 'profile'));
    }

    public function updateProfile(Request $request)
    {
        $this->validate(
            $request,
            [
                'password'=>'required',
                'name' => 'required',
                'email' => 'required',
                'province' => 'required',
                'gender' => 'required',
                'Phone_number' => 'required',
            ]
        );

        if (Hash::check($request->password, Auth::user()->password)) {
            $user=User::find(Auth::id());
            $user->name=$request->name;
            $user->email=$request->email;
            $user->save();

            $profile = User_profile::where('user_id', Auth::id())->first();
            $profile->province = $request->province;
            $profile->gender = $request->gender;
            $profile->Phone_number = $request->Phone_number;


            if ($request->has('image') && $request->image!=null) {
                $photo = $request->image;
                $newPhoto = time() . $photo->getClientOriginalName();
                $photo->move('upload/profile', $newPhoto);
                $profile->image = 'upload/profile/' . $newPhoto;

            }
            $profile->save();
            return redirect()->back()->with('message','Your information Updated successfully');
           }

           return redirect()->back()->with('message','password incorrect');
        }


    public function changePassword()
    {
        $hotelInfo = Hotel::all();
        $contacts = Contact::all();
        return view('user.settings.changepassword', compact('hotelInfo', 'contacts'));
    }

    public function UpdatePassword(Request $request)
    {
        $this->validate(
            $request,
            [
                'old_password'=>'required',
                'password' => 'min:8',
                'password_confirmation' => 'required_with:password|same:password|min:8'
            ]
        );

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user=User::find(Auth::id());
            $user->password=bcrypt(($request->password));
            $user->save();
            return redirect()->back()->with('success','Your password changed Successfully');
           }


        return redirect()->back()->with('error','password incorrect');
    }

}
