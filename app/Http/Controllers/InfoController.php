<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info=Info::all();
        return view('admin.info',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infoadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
       
        $info=Info::create([
            'whatsapp'=>$request->input('whatsapp'),
            'facebook'=>$request->input('facebook'),
            'instagram'=>$request->input('instagram'),
            'snapchat'=>$request->input('snapchat'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            // 'image'=>$newImageName
        ]);



         return redirect()->route('veiwinfo')->with('success','تمت الأضافة ');







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
        $info = Info::findOrFail($id);
        return view('admin.infoedit', [
            'info' => $info,
           
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

        $info = Info::findOrFail($id);
        $input = $request->all();
        $info->update($input);
  

        return redirect()->route('veiwinfo')->with('success','تم التعديل ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info=Info::find($id);
        $info->destroy($id);
        return redirect()->route('veiwinfo')->with('success','تم الحذف ');
    }
}
