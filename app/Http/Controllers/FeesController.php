<?php

namespace App\Http\Controllers;

use App\SmsFee;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = SmsFee::latest()->get();
        return view('admin.fees.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  \Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    
        $fee = new SmsFee();
        $fee->name = $request->name;
        $result = $fee->save();
 
       if($result){
           return redirect()->route('fees.index')->with(['alert-type' => 'success','message'=>'Fee Added Successfully']);
       }else{
           return redirect()->route('fees.index')->with(['alert-type' => 'error','message'=>'Something went wrong']);
       }
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
        $fees = SmsFee::latest()->get();
        $editData = SmsFee::find($id);
        return view('admin.fees.index',compact('fees','editData'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request){
        $fee = SmsFee::find($request->id);
        $fee->active_status = !($request->status);
        $result = $fee->save();
        if($result){
            return response()->json(['message'=>'Status Changed Successfully'],200);
        }else{
            return response()->json(['message'=>'Something went wrong'],404);
        }
    }
}
