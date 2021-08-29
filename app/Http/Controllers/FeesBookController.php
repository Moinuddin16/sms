<?php

namespace App\Http\Controllers;

use App\SmsClass;
use App\SmsFeesSetup;
use App\SmsGenerateFeesBook;
use App\SmsGroup;
use App\SmsPaymentType;
use App\SmsSection;
use App\SmsSession;
use App\SmsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeesBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = SmsClass::all(); 
        $groups = SmsGroup::all(); 
        $sections = SmsSection::all(); 
        $sessions = SmsSession::all();
        $payment_categorys = SmsFeesSetup::all();
       return view('admin.fees-book.index',compact('classes','groups','sections','sessions','payment_categorys'));
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
        //
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
        //
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
    public function filterFessBook  (Request $request)
    {
        $data = json_decode($request->data);   
        $ignore = json_decode($request->ignore);
        $fees_type_id = $request->fees_type_id;
        $payment_type_id = $request->payment_type_id;
     
        $getStudents = SmsStudent::Where(function ($query) use($data,$ignore) {
         foreach($data as $key => $value){
                 if(!is_null($value[0]->getValue) && $value[0]->getValue != '')
                 {
                    if(!in_array($value[0]->element,$ignore)){
                        $query->where($value[0]->element,$value[0]->getValue);
                    }
             
                 }
              
             }      
        })->get();

        $studentId = [];
        
        foreach($getStudents as $student){
            $studentId[] = $student->id;
        }

        $generateeesBook = SmsGenerateFeesBook::whereIn('student_id',$studentId)->where('fees_setup_id',$fees_type_id)->where('payment_type_id',$payment_type_id)->with('students','feesSetup')->get();
   
        // if(count($generateeesBook) > 0){
            return view('admin.fees-book.inner_div',compact('generateeesBook'));
        // }
        // return response()->json(['error'=>'No data found'],500);
      
    }

    public function getPaymentType(Request $request)
    {
        $data = json_decode($request->data);   
        $ignore = json_decode($request->ignore);
        $payment_categorys = SmsFeesSetup::Where(function ($query) use($data,$ignore) {
            foreach($data as $key => $value){
                    if(!is_null($value[0]->getValue) && $value[0]->getValue != '')
                    {
                        if(!in_array($value[0]->element,$ignore)){
                            $query->where($value[0]->element,$value[0]->getValue);
                        }
                    }
                 
                }      
           })->with('feesData')->get(); 
   
        return response()->json($payment_categorys,200);
          

    }

    public function printFeesBook($id)
    {
        return view('admin.print.print-fees-book');
    }
}
