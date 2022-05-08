<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function index()
    {
        $features = Feature::all()->where('Accept',1);
        return view('admin.features.index')->with('features', $features);
    }


    public function create()
    {
        $features = Feature::all()->where('Accept',0);

        return view('admin.features.create')->with('features', $features);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'feature' => 'required',
        ]);

       $id=$request->feature;
        $featuree=Feature::where('id',$id)->first();

        if ($featuree->Accept == 0)
            $featuree->Accept = 1;
         $featuree->save();
        return redirect()->back();
    }



    public function destroy(Feature $feature)
    {
        $feature->Accept = 0;
        $feature->save();
        return redirect()->back();
    }
}
