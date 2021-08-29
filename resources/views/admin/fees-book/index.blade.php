@extends('admin.master')
@section('title', 'Fees Book')
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
                            <h2>Fees Book</h2>
                        </div>
            
                </div>
       
             
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <select class="form-control" onchange="filterFeeBookTable('session',['class','session','section','group','fees_type_id','payment_type_id'])" id="filter_session" >
                                            <option value="">Filter by session</option>
                                            @if (isset($sessions))
                                                @foreach ($sessions as $session)<option value="{{ $session->id }}">{{ $session->name }}</option> 
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" onchange="filterFeeBookTable('class',['class','session','section','group','fees_type_id','payment_type_id'])" id="filter_class">
                                            <option value="" >Filter by class</option>
                                            @if (isset($classes))
                                                @foreach ($classes as $class)   
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="filter_section" onchange="filterFeeBookTable('section',['class','session','section','group','fees_type_id','payment_type_id'])" class="form-control" >
                                            <option value="" >Filter by section</option>
                                            @if (isset($sections))
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select id="filter_group" class="form-control"  onchange="filterFeeBookTable('group',['class','session','section','group','fees_type_id','payment_type_id'])">
                                            <option value="" >Filter by group</option>
                                            @if (isset($groups))
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div> 

                                    
                                        <div class="col-lg-6 pb-4 pt-4">
                                            <select class="form-control" id="filter_fees_type_id" name="payment_category" onchange="filterFeeBookTable('fees_type_id',['class','session','section','group','fees_type_id','payment_type_id'])">
                                                <option value="">Payment Category</option>
                                              
                                            </select>
                                        </div>
                                        <div class="col-lg-6 pb-4 pt-4">
                                            <select class="form-control" id="filter_payment_type_id" name="payment_installment" onchange="filterFeeBookTable('payment_type_id',['class','session','section','group','fees_type_id','payment_type_id'])">
                                                <option value="">Payment Installment</option>
                                            </select>
                                        </div>
                                 
                                        
                                    
                                @include('admin.fees-book.inner_div')
                                
                               
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
    </div>

@endsection
