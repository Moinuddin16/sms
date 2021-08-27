@extends('admin.master')
@section('title', 'List Of Student')
@section('main-content')

    <div class="container-fluid px-6 py-4">

        <div class="py-6">
            <!-- table -->
            <div class="row mb-6">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="examples" class="mb-4">
                        <h2>List of Student</h2>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover " id="datatable">
                                <thead>
                                    <tr>
                                        <th>Student Id</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Session</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Group</th>
                                        <th>Section</th>
                                        <th>Sms No</th>
                                        <th width="100px">Active status</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.css"/>
  
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('student.index') }}",
             buttons: [  {
                extend: 'pdfHtml5',
                messageTop: 'PDF created by PDFMake with Buttons for DataTables.'
             },'csv' ],
            dom: 'Bflrtip',
            exportOptions : {
                modifier : {
                    // DataTables core
                    order : 'index', // 'current', 'applied',
                    //'index', 'original'
                    page : 'all', // 'all', 'current'
                    search : 'none' // 'none', 'applied', 'removed'
                },
                columns: [ 9,10 ]
            }
            ,
            columns: [
                {data: 'student_id', name: 'student_id'},
                {data: 'full_name', name: 'full_name'},
                {data: 'gender', name: 'gender'},
                {data: 'session', name: 'session'},
                {data: 'year', name: 'year'},
                {data: 'class', name: 'class'},
                {data: 'group', name: 'group'},
                {data: 'section', name: 'section'},
                {data: 'sms_no', name: 'sms_no'},
                {data: 'active_status', name: 'active_status'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
</script>
@endsection
