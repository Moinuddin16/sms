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


class GenerateFeesBookController extends Controller
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
       return view('admin.generate-fees-book.index',compact('classes','groups','sections','sessions'));
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
        $result = 0;
        if(count($request->id)>0){
            
            foreach($request->id as $id){
                $generate_fees_book = new SmsGenerateFeesBook();
                $generate_fees_book->student_id = $id;
                $generate_fees_book->fees_setup_id = $request->payment_category;
                $generate_fees_book->payment_type_id = $request->payment_installment;
                $generate_fees_book->save();
                $result++;
            }
        }
        if($result>0){
            return redirect()->route('generate-fees-book.index')->with(['alert-type' => 'success','message'=>'Fees Book Generated Successfully']);
        }else{
            return redirect()->route('generate-fees-book.index')->with(['alert-type' => 'error','message'=>'Something went wrong']);
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
    public function filterGenerateFessBook  (Request $request)
    {
        $data = json_decode($request->data);   
        $students = SmsStudent::Where(function ($query) use($data) {
         foreach($data as $key => $value){
                 if(!is_null($value[0]->getValue) && $value[0]->getValue != '')
                 {
                     $query->where($value[0]->element,$value[0]->getValue);
                 }
              
             }      
        })->get(); 
        $payment_categorys = SmsFeesSetup::Where(function ($query) use($data) {
            foreach($data as $key => $value){
                    if(!is_null($value[0]->getValue) && $value[0]->getValue != '')
                    {
                        $query->where($value[0]->element,$value[0]->getValue);
                    }
                 
                }      
           })->get(); 
        return view('admin.generate-fees-book.inner_div',compact('students','payment_categorys'));
      
    }

    public Function getPaymentCategory($id,$fees)
    {
        
            $payment_categorys = SmsFeesSetup::find($fees);
     
            $feesParent = SmsPaymentType::where('id',$id)->first(); 
            $feesChild = SmsPaymentType::where('parent_id',$feesParent->id)->get(); 
      
            if($feesParent->count() > 0)
            {
                return response()->json(['child'=>$feesChild,'amount'=>$payment_categorys->payment_amount],200);
            }
   
         return Response()->json('No data found',404);
    }
}
