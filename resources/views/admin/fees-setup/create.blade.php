@extends('admin.master')
@if (isset($editData))
    @section('title', 'Edit Fees Setup')
@else
    @section('title', 'Add Fees Setup')
@endif

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
                    @if (isset($editData))
                        <div id="examples" class="mb-4">
                            <h2>Edit Fees Setup</h2>
                        </div>
                    @else
                        <div id="examples" class="mb-4">
                            <h2>Add Fees Setup</h2>
                        </div>
                    @endif
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            @if (!isset($editData))
                                <form action="{{ route('fees-setup.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                @else
                                    <form action="{{ route('fees-setup.update', [$editData->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <input name="_method" type="hidden" value="PUT">
                            @endif
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="session">Session: </label>
                                <select id="session" class="form-control" name="session">
                                    <option value="">Choose...</option>
                                    @if (isset($sessions))
                                        @foreach ($sessions as $session)
                                            @if (isset($editData))
                                                <option value="{{ $session->id }}"
                                                    {{ currentSelectedItem($session->id, $editData->session) }}>
                                                    {{ $session->name }}
                                                </option>
                                            @else
                                                <option value="{{ $session->id }}"
                                                    {{ currentSelectedItem($session->id, old('session')) }}>
                                                    {{ $session->name }}
                                                </option>
                                            @endif

                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('session'))
                                    <small class="text-danger">{{ $errors->first('session') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="year">Year: </label>
                                <select id="year" class="form-control" name="year">
                                    <option value="">Choose...</option>

                                    @if (isset($years))
                                        @foreach ($years as $year)
                                            @if (isset($editData))
                                                <option value="{{ $year->id }}"
                                                    {{ currentSelectedItem($year->id, $editData->year) }}>
                                                    {{ $year->name }}
                                                </option>

                                            @else
                                                <option value="{{ $year->id }}"
                                                    {{ currentSelectedItem($year->id, old('year')) }}>
                                                    {{ $year->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('year'))
                                    <small class="text-danger">{{ $errors->first('year') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="class">Class: </label>
                                <select id="class" class="form-control" name="class">
                                    <option value="">Choose...</option>
                                    @if (isset($classes))
                                        @foreach ($classes as $class)
                                            @if (isset($editData))
                                                <option value="{{ $class->id }}"
                                                    {{ currentSelectedItem($class->id, $editData->class) }}>
                                                    {{ $class->name }}
                                                </option>

                                            @else

                                                <option value="{{ $class->id }}"
                                                    {{ currentSelectedItem($class->id, old('class')) }}>
                                                    {{ $class->name }}
                                                </option>

                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('class'))
                                    <small class="text-danger">{{ $errors->first('class') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="group">Groups: </label>
                                <select id="group" class="form-control" name="group">
                                    <option value="">Choose...</option>
                                    @if (isset($groups))
                                        @foreach ($groups as $group)
                                            @if (isset($editData))
                                                <option value="{{ $group->id }}"
                                                    {{ currentSelectedItem($group->id, $editData->group) }}>
                                                    {{ $group->name }}
                                                </option>
                                            @else
                                                <option value="{{ $group->id }}"
                                                    {{ currentSelectedItem($group->id, old('group')) }}>
                                                    {{ $group->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('group'))
                                    <small class="text-danger">{{ $errors->first('class') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="section">Sections: </label>
                                <select id="section" class="form-control" name="section">
                                    <option value="">Choose...</option>
                                    @if (isset($sections))
                                        @foreach ($sections as $section)
                                            @if (isset($editData))
                                                <option value="{{ $section->id }}"
                                                    {{ currentSelectedItem($section->id, $editData->section) }}>
                                                    {{ $section->name }}
                                                </option>
                                            @else
                                                <option value="{{ $section->id }}"
                                                    {{ currentSelectedItem($section->id, old('section')) }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('section'))
                                    <small class="text-danger">{{ $errors->first('section') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="fees">Fees: </label>
                                <select id="fees" class="form-control" name="fees">
                                    <option value="">Choose...</option>
                                    @if (isset($fees))
                                        @foreach ($fees as $fee)
                                            @if (isset($editData))
                                                <option value="{{ $fee->id }}"
                                                    {{ currentSelectedItem($fee->id, $editData->fees) }}>
                                                    {{ $fee->name }}
                                                </option>
                                            @else
                                                <option value="{{ $fee->id }}"
                                                    {{ currentSelectedItem($fee->id, old('fees')) }}>
                                                    {{ $fee->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('fees'))
                                    <small class="text-danger">{{ $errors->first('fees') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="payment_type">Payment Type: </label>
                                <select id="payment_type" class="form-control" name="payment_type">
                                    <option value="">Choose...</option>
                                    @if (isset($paymentTypes))
                                        @foreach ($paymentTypes as $paymentType)
                                            @if (isset($editData))
                                                <option value="{{ $paymentType->id }}"
                                                    {{ currentSelectedItem($paymentType->id, $editData->payment_type) }}>
                                                    {{ $paymentType->name }}
                                                </option>
                                            @else
                                                <option value="{{ $paymentType->id }}"
                                                    {{ currentSelectedItem($paymentType->id, old('payment_type')) }}>
                                                    {{ $paymentType->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('payment_type'))
                                    <small class="text-danger">{{ $errors->first('payment_type') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="payment_amount">Paymeny Amount: </label>
                                <input type="text" min="0" step="1" class="form-control" id="payment_amount"
                                    name="payment_amount" placeholder="Enter a Payment Amount"
                                    value="@if (isset($editData)){{ $editData->payment_amount }}@else{{ old('payment_amount') }}@endif">
                                @if ($errors->has('payment_amount'))
                                    <small class="text-danger">{{ $errors->first('payment_amount') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-lg-6">
                                    <select class="form-control" onchange="filterTable(['class','session'])"
                                        id="filter_session">
                                        <option value="">Filter by session</option>
                                        @if (isset($sessions))
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" onchange="filterTable(['class','session'])"
                                        id="filter_class">
                                        <option value="">Filter by class</option>
                                        @if (isset($classes))
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                            @include('admin.fees-setup.inner_div')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
