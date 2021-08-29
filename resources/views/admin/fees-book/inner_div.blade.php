<div id="inner_div">
   
    <h4>
        Total Student:(@if(isset($generateeesBook)){{$generateeesBook->count()}}@else{{"0"}}@endif)
    </h4>
    <div class="table-responsive">
    <table class="table table-hover " id="fees-setupDatatable">
        <thead>
            <tr>
            
                <th width="15%" class="text-center">Student Id</th>
                <th width="15%" class="text-center">Name</th>
                <th width="15%"  class="text-center">Roll No</th>
                <th width="12%"  class="text-center">Class</th>
                <th width="12%"  class="text-center">Group</th>
                <th width="12%"  class="text-center">Section</th>
                <th class="text-center">Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($generateeesBook) && $generateeesBook->count() > 0)
                @foreach ($generateeesBook as $item)
              
                    <tr>
                       
                        <td class="text-center">{{ $item->students[0]->student_id }}</td>
                        <td class="text-center">{{ $item->students[0]->full_name }}</td>
                        <td class="text-center">{{ $item->students[0]->roll_no }}</td>
                        <td class="text-center">{{ $item->students[0]->student_class }}</td>
                        <td class="text-center">{{ $item->students[0]->student_group }}</td>
                        <td  class="text-center">{{ $item->students[0]->student_section }}</td>
                        <td class="text-center">{{Config::get('app.curreny')}} <small>{{$item->feesSetup->payment_amount}}</small></td>
                @endforeach
            @endif
    </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#fees-setupDatatable').DataTable({

                bSort: false,
            });
        });
      
    </script>
</div>

