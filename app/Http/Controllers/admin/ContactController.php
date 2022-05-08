<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\controller;
use App\Models\Contact;
use Illuminate\Http\Request;

use App\Models\Hotel;
class ContactController extends Controller
{

    public function index()
    {
        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }



    public function create()
    {
        $hotels = Hotel::all();
        if ($hotels->count() == 0) {
            return redirect()->route('Hotel.create');
        }
        return view('admin.contact.create',compact('hotels'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'contact'=>'required',
            'type'=>'required'
      ]);
      Contact::create($request->all());
        return redirect()->route('admin.contact.index');
    }



    public function edit($id)
    {
        $contact=Contact::find($id);
        $hotels = Hotel::all();
        return view('admin.contact.edit',compact('contact','hotels'));
    }


    public function update(Request $request,  $id)
    {
        $request->validate([
            'contact'=>'required',
            'type'=>'required'
      ]);

      $contact=Contact::find($id);
      $contact->update($request->all());
      return redirect()->route('admin.contact.index');
    }


    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.index');
    }
}
