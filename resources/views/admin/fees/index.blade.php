@extends('admin.master')
@if (isset($editData))
    @section('title', 'Edit Fees')
@else
    @section('title', 'Add Fees')
@endif

@section('main-content')
    <style>
        .edit-btn {
            padding: 5px;
        }

    </style>
    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div id="examples" class="mb-4">
                        @if (isset($editData))
                            <h2>Edit Fees</h2>
                        @else
                            <h2>Add Fees</h2>
                        @endif

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            @if (!isset($editData))
                                <form action="{{ route('fees.store') }}" method="POST" enctype="multipart/form-data">

                                @else
                                    <form action="{{ route('fees.update', [$editData->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        <input name="_method" type="hidden" value="PUT">
                            @endif
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Fee Name: </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter a fees name" value="@if (isset($editData)){{ $editData->name }} @else{{ old('name') }} @endif">
                                    @if ($errors->has('name'))
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>

                            </div>
                            @if (isset($editData))
                                <button type="submit" class="btn btn-primary">Edit</button>

                            @else
                                <button type="submit" class="btn btn-primary">Add</button>

                            @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">

                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Total Fees:({{ $fees->count() }})
                            </h4>
                            <div class="table-responsive">
                            <table class="table table-hover " id="feesDatatable">
                                <thead>
                                    <tr>
                                        <th>Fees Name</th>
                                        <th>Active Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $fee)
                                        <tr>
                                            <td>{{ $fee->name }}</td>
                                            <td width="30%">
                                                <input type="checkbox"
                                                    onchange="changeFeesStatus({{ $fee->id }},{{ $fee->active_status }})"
                                                    @if ($fee->active_status == 1) checked @endif>
                                            </td>
                                            <td width="30%" class="text-center">
                                                <a href="{{ route('fees.edit', $fee->id) }}"
                                                    class="btn edit-btn btn-primary">Edit</a>
                                            </td>
                                    @endforeach
                            </table>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#feesDatatable').DataTable({

                bSort: false,
            });
        });
    </script>

@endsection
