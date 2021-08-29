<div id="inner_div">
    <div class="row pt-4 pb-4">
        <div class="col-lg-6 ">
            <select class="form-control" id="filter_fees_type_id" name="payment_category"  required>
                <option value="">Payment Category</option>
                @if(isset($payment_categorys))
                    @foreach($payment_categorys as $payment_category)
                        <option data-fees_id="{{ $payment_category->fees }}" value="{{ $payment_category->payment_type }}">{{ $payment_category->payment_fees }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="col-lg-6 ">
            <select class="form-control" id="filter_payment_type_id" name="payment_installment" required>
                <option value="">Payment Installment</option>
            </select>
        </div>
    </div>
    <h4>
        Total Student:@if(isset($students))({{$students->count()}})@endif
    </h4>
    <table class="table table-hover " id="fees-setupDatatable">
        <thead>
            <tr>
                <th class="text-center"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
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
            @if (isset($students) && $students->count() > 0)
                @foreach ($students as $student)
                    <tr>
                        <td><input type="checkbox" name="id[]" value="{{ $student->id }}"></td>
                        <td class="text-center">{{ $student->student_id }}</td>
                        <td class="text-center">{{ $student->full_name }}</td>
                        <td class="text-center">{{ $student->roll_no }}</td>
                        <td class="text-center">{{ $student->student_class }}</td>
                        <td class="text-center">{{ $student->student_group }}</td>
                        <td  class="text-center">{{ $student->student_section }}</td>
                        <td class="text-center"><small class="total_amount"></small></td>
                @endforeach
            @endif
    </table>
    
    <script>
        // $(document).ready(function() {
        //     $('#fees-setupDatatable').DataTable({

        //         bSort: false,
        //     });
        // });
        $(document).ready(function (){
   var table = $('#fees-setupDatatable').DataTable({
   
      'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'className': 'dt-body-center',
      }],
      'order': [[1, 'asc']]
   });

   
   $('#example-select-all').on('click', function(){
     
      var rows = table.rows({ 'search': 'applied' }).nodes();
     
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   
   $('#fees-setupDatatable tbody').on('change', 'input[type="checkbox"]', function(){
 
      if(!this.checked){
         var el = $('#example-select-all').get(0);
       
         if(el && el.checked && ('indeterminate' in el)){
           
            el.indeterminate = true;
         }
      }
   });

  
   $('#frm-example').on('submit', function(e){
      var form = this;

    
      table.$('input[type="checkbox"]').each(function(){
      
         if(!$.contains(document, this)){
        
            if(this.checked){
           
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });
   });

});
    </script>
</div>

