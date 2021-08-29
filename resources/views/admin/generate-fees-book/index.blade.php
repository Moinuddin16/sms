@extends('admin.master')
@section('title', 'Generate Fees Book')
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
                            <h2>Generate Fees Book</h2>
                        </div>
                </div>
       
                <form action="{{ route('generate-fees-book.store') }}" method="POST" enctype="multipart/form-data" id="frm-example">
                 @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <select class="form-control" onchange="filterGenerateFeeBookTable(['class','session','section','group'])" id="filter_session" >
                                            <option value="">Filter by session</option>
                                            @if (isset($sessions))
                                                @foreach ($sessions as $session)<option value="{{ $session->id }}">{{ $session->name }}</option> 
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" onchange="filterGenerateFeeBookTable(['class','session','section','group'])" id="filter_class">
                                            <option value="" >Filter by class</option>
                                            @if (isset($classes))
                                                @foreach ($classes as $class)   
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="filter_section" onchange="filterGenerateFeeBookTable(['class','session','section','group'])" class="form-control" >
                                            <option value="" >Filter by section</option>
                                            @if (isset($sections))
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="filter_group" class="form-control"  onchange="filterGenerateFeeBookTable(['class','session','section','group'])">
                                            <option value="" >Filter by group</option>
                                            @if (isset($groups))
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div> 
                                @include('admin.generate-fees-book.inner_div')
                                
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
