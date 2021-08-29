<?php

namespace App\Http\Controllers;
use App\SmsClass;
use App\SmsFee;
use App\SmsFeesSetup;
use App\SmsGroup;
use App\SmsPaymentType;
use App\SmsSection;
use App\SmsSession;
use App\SmsYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class FeesSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentTypes = SmsPaymentType::where('parent_id',0)->get();
        $classes = SmsClass::all(); 
        $groups = SmsGroup::all(); 
        $sections = SmsSection::all(); 
        $sessions = SmsSession::all();
        $years = SmsYear::all();
        $fees = SmsFee::where('active_status',1)->get();
        $feesSetups = SmsFeesSetup::all();
 
       return view('admin.fees-setup.create',compact('classes','groups','sections','sessions','years','paymentTypes','fees','feesSetups'));
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
            'session' => 'required',
            'year' => 'required',
            'class' => 'required',
            'group' => 'required',
            'section' => 'required',
            'fees' => 'required',
            'payment_type' => 'required',
            'payment_amount' => 'required|numeric'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    
        $feesSetup = new SmsFeesSetup();
        $feesSetup->session = (int)($request->session);
        $feesSetup->year = (int)($request->year);
        $feesSetup->class = (int)$request->class;
        $feesSetup->group = (int)$request->group;
        $feesSetup->section = (int)$request->section;
        $feesSetup->fees = (int)$request->fees;
        $feesSetup->payment_type = (int)$request->payment_type;
        $feesSetup->payment_amount = $request->payment_amount;
        $result = $feesSetup->save();
 
       if($result){
           return redirect()->route('fees-setup.create')->with(['alert-type' => 'success','message'=>'Fees setup Added Successfully']);
       }else{
           return redirect()->route('fees-setup.create')->with(['alert-type' => 'error','message'=>'Something went wrong']);
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
        $editData = SmsFeesSetup::find($id);
        $paymentTypes = SmsPaymentType::where('parent_id',0)->get();
        $classes = SmsClass::all(); 
        $groups = SmsGroup::all(); 
        $sections = SmsSection::all(); 
        $sessions = SmsSession::all();
        $years = SmsYear::all();
        $fees = SmsFee::where('active_status',1)->get();
        $feesSetups = SmsFeesSetup::all();
        if($editData->is_editable == 0){ 
            return redirect('admin/fees-setup/create')->with(['alert-type' => 'error','message'=>'This fees setup is already in use']);
        }
        return view('admin.fees-setup.create',compact('classes','groups','sections','sessions','years','paymentTypes','fees','feesSetups','editData'));
        
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
       
        $validator =  \Validator::make($request->all(),[
            'session' => 'required',
            'year' => 'required',
            'class' => 'required',
            'group' => 'required',
            'section' => 'required',
            'fees' => 'required',
            'payment_type' => 'required',
            'payment_amount' => 'required|numeric'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    
        $feesSetup = SmsFeesSetup::find($id);
        $feesSetup->session = (int)($request->session);
        $feesSetup->year = (int)($request->year);
        $feesSetup->class = (int)$request->class;
        $feesSetup->group = (int)$request->group;
        $feesSetup->section = (int)$request->section;
        $feesSetup->fees = (int)$request->fees;
        $feesSetup->payment_type = (int)$request->payment_type;
        $feesSetup->payment_amount = $request->payment_amount;
        $result = $feesSetup->save();
 
       if($result){
           return redirect()->route('fees-setup.create')->with(['alert-type' => 'success','message'=>'Fees setup Updated Successfully']);
       }else{
           return redirect()->route('fees-setup.create')->with(['alert-type' => 'error','message'=>'Something went wrong']);
       }
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

    public function filterFessSetup(Request $request){
       $data = json_decode($request->data);   
       $feesSetups = SmsFeesSetup::Where(function ($query) use($data) {
        foreach($data as $key => $value){
                if(!is_null($value[0]->getValue) && $value[0]->getValue != '')
                {
                    $query->where(DB::raw($value[0]->element),$value[0]->getValue);
                }
             
            }      
       })->get(); 
       return view('admin.fees-setup.inner_div',compact('feesSetups'));
        
    }
}
