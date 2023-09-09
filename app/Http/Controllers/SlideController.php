<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides=Slide::all();
        return view('admin.slide',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slideadd');
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
  
        $slides=Slide::create($input);
  
        return redirect()->route('veiwslide')->with('success','تمت الأضافة ');
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
        $slide = Slide::findOrFail($id);
        return view('admin.slideedit',['slide'=>$slide]);
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
        $slide = Slide::findOrFail($id);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $newImageName=time() . '-' . $request->name . '.' . $request->image->extension();

            $request->image->move(public_path('images'),$newImageName );
            $input['image'] = "$newImageName";
            @unlink(public_path('images').'/'.$general->image);
        }else{
            unset($input['image']);
        }

        $slide->update($input);

        return redirect()->route('veiwslide')->with('success','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slides=Slide::find($id);
         @unlink(public_path('images').'/'.$slides->image);
        $slides->destroy($id);
        return redirect()->route('veiwslide')->with('success','تم الحذف ');
    }
}
