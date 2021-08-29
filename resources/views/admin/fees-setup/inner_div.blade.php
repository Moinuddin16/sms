<div id="inner_div">
    <h4>
        Total Fees-setup:({{ $feesSetups->count() }})
    </h4>
    <div class="table-responsive">
    <table class="table table-hover " id="fees-setupDatatable">
        <thead>
            <tr>
                <th width="20%">Year</th>
                <th width="20%">Class</th>
                <th width="20%">Group</th>
                <th width="20%">Payment Name</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($feesSetups) && $feesSetups->count() > 0)
                @foreach ($feesSetups as $feesSetup)
                    <tr>
                        <td>{{ $feesSetup->payment_year }}</td>
                        <td>{{ $feesSetup->payment_class }}</td>
                        <td>{{ $feesSetup->payment_group }}</td>
                        <td>{{ $feesSetup->payment_type_name }}</td>
                        <td class="text-center">
                            <a href="{{ route('fees-setup.edit', $feesSetup->id) }}">
                                <button class="btn edit-btn btn-primary" @if($feesSetup->is_editable == 0) disabled="true" @endif>Edit</button>
                            </a>
                        </td>
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