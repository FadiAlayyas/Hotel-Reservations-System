<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Hotel;

class ServiceController extends Controller
{

    public function index()
    {
        $services=Service::all();
        return view('admin.services.index',compact('services'));
    }

    public function create()
    {

        $Hotels = Hotel::all();
        if ($Hotels->count() == 0) {

            return redirect()->route('admin.hotel.create');

        }
        return view('admin.services.create')->with('Hotels',$Hotels);
    }



    public function store(Request $request)
    {
        $this->validate($request,[
        'type'=>'required',
        'description'=>'required',
        'image' => 'required|image'
        ]);

        $photo = $request->image;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('upload/service',$newphoto);


        Service::create([
            'hotel_id' => $request->hotel_id,
            'type'=>$request->type,
            'description'=>$request->description,
            'image' => 'upload/service/'.$newphoto,
        ]);
        return redirect()->route('service.index');

    }


    public function show(Service $service)
    {
        return view('admin.services.show',compact('service'));
    }


    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }


    public function update(Request $request,$id)
    {

        $request->validate([
            'type'=>'required',
            'description'=>'required',
           // 'image' => 'required|image'
        ]);

        $service=Service::find($id);

        if($request->has('image'))
        {
            $photo=$request->image;
            $newphoto=time().$photo->getClientOriginalName();
            $photo->move('upload/service/',$newphoto);
            $service->image='upload/service/'.$newphoto;
        }

        $service->type=$request->type;
        $service->description=$request->description;

        $service->save();

       // $service->update($request->all());

        return redirect()->route('service.index');


    }


    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index');
    }
}
