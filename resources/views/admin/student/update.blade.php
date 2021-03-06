@extends('admin.master')
@section('title', 'Edit Student')
@section('main-content')
    @php
    function currentSelectedItem($value, $old_value)
    {
        return $value == $old_value ? 'selected' : '';
    }
    @endphp
    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>Edit Student</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('student.update',$editData->id) }}" method="POST" enctype="multipart/form-data">
                            
                                <input name="_method" type="hidden" value="PUT">
                                @csrf
                                <label>Basic Information:</label>
                             
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name: </label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" 
                                            placeholder="Enter your first name" value="@if(isset($editData)){{$editData->first_name}} @endif">
                                        @if ($errors->has('first_name'))
                                            <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name">Last Name: </label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Enter your last name" value="@if(isset($editData)){{$editData->last_name}} @endif">
                                        @if ($errors->has('last_name'))
                                            <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="gender">Gender: </label>
                                        <select id="gender" class="form-control" name="gender">
                                            <option value="">Choose...</option>
                                            <option value="1" {{ currentSelectedItem('1',$editData->gender) }}>Female
                                            </option>
                                            <option value="2" {{ currentSelectedItem('2',$editData->gender) }}>Male
                                            </option>
                                            <option value="3" {{ currentSelectedItem('3',$editData->gender) }}>Other
                                            </option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <small class="text-danger">{{ $errors->first('gender') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4 date">
                                        <label for="date_of_birth">Date of Birth: </label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                            value="@if(isset($editData)){{$editData->date_of_birth}}@endif">
                                        @if ($errors->has('date_of_birth'))
                                            <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sms_no">Sms No: </label>
                                        <input type="text" class="form-control" id="sms_no" name="sms_no"
                                            placeholder="Enter a valid phone number for sent sms"
                                            value="@if(isset($editData)){{$editData->sms_no}} @endif">
                                        @if ($errors->has('sms_no'))
                                            <small class="text-danger">{{ $errors->first('sms_no') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group pb-3">
                                    <label for="inputAddress">Present Address:</label>
                                    <input type="text" class="form-control" id="inputAddress" name="present_address"
                                        placeholder="Enter your present address" value="@if(isset($editData)){{$editData->present_address}} @endif">
                                    @if ($errors->has('present_address'))
                                        <small class="text-danger">{{ $errors->first('present_address') }}</small>
                                    @endif
                                </div>
                                <hr>
                                <label>Academic Information:</label>
                                <div class="form-row pt-3">
                                    <div class="form-group col-md-6">
                                        <label for="session">Session: </label>
                                        <select id="session" class="form-control" name="session">
                                            <option  value="">Choose...</option>
                                            @if (isset($sessions))
                                                @foreach ($sessions as $session)
                                                    <option value="{{ $session->id }}"
                                                        {{ currentSelectedItem($session->id, $editData->session) }}>
                                                        {{ $session->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('session'))
                                            <small class="text-danger">{{ $errors->first('session') }}</small>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="year">Year: </label>
                                        <select id="year" class="form-control" name="year">
                                            <option  value="">Choose...</option>
                                            @if (isset($years))
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}"
                                                        {{ currentSelectedItem($year->id, $editData->year) }}>
                                                        {{ $year->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('year'))
                                            <small class="text-danger">{{ $errors->first('year') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="class">Class: </label>
                                        <select id="class" class="form-control" name="class">
                                            <option  value="">Choose...</option>
                                            @if (isset($classes))
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ currentSelectedItem($class->id, $editData->class) }}>
                                                        {{ $class->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('class'))
                                            <small class="text-danger">{{ $errors->first('class') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="group">Groups: </label>
                                        <select id="group" class="form-control" name="group">
                                            <option  value="">Choose...</option>
                                            @if (isset($groups))
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}"
                                                        {{ currentSelectedItem($group->id, $editData->group) }}>
                                                        {{ $group->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('group'))
                                            <small class="text-danger">{{ $errors->first('class') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="section">Sections: </label>
                                        <select id="section" class="form-control" name="section">
                                            <option  value="">Choose...</option>
                                            @if (isset($sections))
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}"
                                                        {{ currentSelectedItem($section->id, $editData->section) }}>
                                                        {{ $section->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('section'))
                                            <small class="text-danger">{{ $errors->first('section') }}</small>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="roll_no">Roll No: </label>
                                        <input type="number" min="0" step="1" class="form-control" id="roll_no" name="roll_no"
                                            placeholder="Enter a valid roll no" value="@if(isset($editData)){{$editData->roll_no}}@endif">
                                        @if ($errors->has('roll_no'))
                                            <small class="text-danger">{{ $errors->first('roll_no') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
