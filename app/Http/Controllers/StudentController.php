<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTables;
use App\SmsClass;
use App\SmsGroup;
use App\SmsSection;
use App\SmsSession;
use App\SmsStudent;
use App\SmsYear;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,StudentDataTables $dataTable)
    {  

       if($request->ajax())
       {
            $query = SmsStudent::latest()->get();
            return Datatables::of($query)
                ->addColumn('full_name', function($query){
                        return $query->full_name;
                })
                ->addColumn('gender', function($query){
                        return $query->student_gender;
                })
                ->addColumn('section', function($query){
                        return $query->student_section;
                })
                ->addColumn('year', function($query){
                        return $query->student_year;
                })
                ->addColumn('class', function($query){
                        return $query->student_class;
                })
                ->addColumn('group', function($query){
                        return $query->student_group;
                })
                ->addColumn('session', function($query){
                        return $query->student_session;
                })
                 ->addColumn('action', function($query){
                        $btn = '
                        <a href="'.route('student.edit', $query->id).'" class="btn edit-btn btn-primary">Edit</a>
                        ';
                        return $btn;
                })
                ->addColumn('active_status', function($query) {
                    $checked = "";
                    $query->active_status == 1 ? $checked = "checked" : $checked = "";  
                    return '<input type="checkbox" onchange="changeStudentStatus('.$query->id.','.$query->active_status.')"'.$checked.'>';
                    
                })->rawColumns(['action', 'active_status'])
                        ->rawColumns(['action','active_status'])
                ->make(true);
       }  
    
        return view('admin.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = SmsClass::all(); 
        $groups = SmsGroup::all(); 
        $sections = SmsSection::all(); 
        $sessions = SmsSession::all();
        $years = SmsYear::all();
       return view('admin.student.create',compact('classes','groups','sections','sessions','years'));
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'present_address' => 'required',
            'sms_no' => 'required',
            'session' => 'required',
            'year' => 'required',
            'class' => 'required',
            'group' => 'required',
            'section' => 'required',
            'roll_no' => 'required|numeric'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
    
        $student = new SmsStudent();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->gender = (int)$request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $student->present_address = $request->present_address;
        $student->sms_no = $request->sms_no;
        $student->session = (int)($request->session);
        $student->year = (int)($request->year);
        $student->class = (int)$request->class;
        $student->group = (int)$request->group;
        $student->section = (int)$request->section;
        $student->roll_no = $request->roll_no;
        $result = $student->save();
 
       if($result){
           return redirect()->route('student.create')->with(['alert-type' => 'success','message'=>'Student Added Successfully']);
       }else{
           return redirect()->route('student.create')->with(['alert-type' => 'error','message'=>'Something went wrong']);
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

    public function changeStatus(Request $request){
        $student = SmsStudent::find($request->id);
        $student->active_status = !($request->status);
        $result = $student->save();
        if($result){
            return response()->json(['message'=>'Status Changed Successfully'],200);
        }else{
            return response()->json(['message'=>'Something went wrong'],404);
        }
    }

}
