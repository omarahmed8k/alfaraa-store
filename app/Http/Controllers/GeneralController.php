<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;


class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $general=General::all();
        return view('admin.general',compact('general'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.generaladd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',

        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $newImageName=time() . '-' . $request->name . '.' .
            $request->image->extension();

            $request->image->move(public_path('images'),$newImageName );
            $input['image'] = "$newImageName";
        }else{
            unset($input['image']);
        }

        $general=General::create($input);
        return redirect()->route('creategeneral')->with('success','تمت الأضافة ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $general = General::findOrFail($id);
        return view('admin.generaledit', [
            'general' => $general,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $general = General::findOrFail($id);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $newImageName=time() . '-' . $request->name . '.' .
            $request->image->extension();

            $request->image->move(public_path('images'),$newImageName );
            $input['image'] = "$newImageName";
            @unlink(public_path('images').'/'.$general->image);
        }else{
            unset($input['image']);
        }
        
        if ($image = $request->file('slider')) {
            $newImageName=time() . '-' . $request->name . '.' .
            $request->slider->extension();

            $request->slider->move(public_path('images'),$newImageName );
            $input['slider'] = "$newImageName";
            @unlink(public_path('images').'/'.$general->slider);
        }else{
            unset($input['slider']);
        }
        
        $general->update($input);

        return redirect()->route('veiwgeneral')->with('success','تم التعديل ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $general=General::find($id);
        @unlink(public_path('images').'/'.$general->image);
        $general->destroy($id);
        return redirect()->route('veiwgeneral')->with('success','تم الحذف ');
    }
}
