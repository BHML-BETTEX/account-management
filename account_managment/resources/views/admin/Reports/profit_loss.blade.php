@extends('master')
@section('content')
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin font-bold">Profit & Loss Statement</h4>
        <hr/>

        <form method="GET" action="{{ url()->current() }}" class="form-inline mb-3">
            <div class="form-group mr-3">
                <label for="from_date" class="mr-2">From Date</label>
                <input type="date" id="from_date" name="from_date" class="form-control" value="{{ old('from_date', $fromDate ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-info">Filter</button>
        </form>

        @if(isset($result) && count($result) > 0)
            <h3 class="text-center font-bold">i2Technologies Limited</h3>
            <h4 class="text-center">Profit & Loss Statement</h4>
            <p class="text-center">{{ $fromDate }}</p>

            <table class="table table-bordered table-striped" style="width: 100%; margin-top: 1rem;">
                <thead>
                    <tr>
                        <th>Type Name</th>
                        <th>Control Name</th>
                        <th>Main Head Name</th>
                        <th>Account Head</th>
                        <th class="text-right">Balance (৳)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $row)
                    <tr>
                        <td>{{ $row->op_typname }}</td>
                        <td>{{ $row->op_ctrlname }}</td>
                        <td>{{ $row->op_mhname }}</td>
                        <td>{{ $row->op_accname }}</td>
                        <td class="text-right">{{ number_format($row->op_bal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted">No data found for the selected date.</p>
        @endif
    </div>
</div>
@endsection
