<div id="inner_div">
    <h4>
        Total Fees-setup:({{ $feesSetups->count() }})
    </h4>
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
                            <a href="{{ route('fees-setup.edit', $feesSetup->id) }}"
                                class="btn edit-btn btn-primary">Edit</a>
                        </td>
                @endforeach
            @endif
    </table>
</div>