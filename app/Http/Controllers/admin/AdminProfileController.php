<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\auth;
class AdminProfileController extends Controller
{

    public function index()
    {
        $admins=Admin::all();
        return view('admin.manageAdmins.index')->with('admins', $admins);
    }


    public function create()
    {
        return view('admin.manageAdmins.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

            'image' => 'required|image',
            'gender' => 'required',
            'SNN' => 'required',
            'Phone_number' => 'required',
            'Role' => 'required',
            'age' => 'required',
        ]);

        $photo = $request->image;

        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/admins',$newphoto);


        Admin::create([
            'full_name' => $request->full_name,
            'gender' => $request->gender,
            'SNN' => $request->SNN,
            'Phone_number' => $request->Phone_number,
            'Role' => $request->Role,
            'password' => Hash::make( $request->password),
            'email' => $request->email,
            'age' => $request->age,
            'image' => 'upload/admins/'.$newphoto,
        ]);

        return redirect()->route('profile.index');
    }


    public function show($id)
    {

        $id_admin=Admin::where('id', Auth::guard('admin')->id())->first();
        if($id==$id_admin->SNN||$id_admin->Role=="Boss")
        {
            $Admin=Admin::where('SNN', $id)->first();
            return view('admin.manageAdmins.show')->with('Admin',$Admin);
        }
        else{
            return view('admin.error.unauthorized');

        }

    }


    public function edit($id)
    {
        $Admin=Admin::where('id', $id)->first();
        return view('admin.manageAdmins.edit')->with('Admin',$Admin);
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            //'image' => 'required|image',
            'gender' => 'required',
            'SNN' => 'required',
            'Phone_number' => 'required',
            'Role' => 'required',
            'age' => 'required',
        ]);
        $admin = Admin::find($id);
        if ($request->has('image')) {
            $photo = $request->image;
            $newphoto = time() . $photo->getClientOriginalName();
            $photo->move('upload/admins', $newphoto);
            $admin->image = 'upload/admins/' . $newphoto;
        }

        $admin->full_name = $request->full_name;
        $admin->SNN = $request->SNN;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        $admin->age = $request->age;
        $admin->Phone_number = $request->Phone_number;
        $admin->Role = $request->Role;
        $admin->password =Hash::make( $request->password);
        $admin->save();

        return redirect()->route('profile.index');
    }


    public function destroy($id)
    {
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->back();
    }

     public function unauthorized()
    {
        return view('admin.error.unauthorized');
    }





}
