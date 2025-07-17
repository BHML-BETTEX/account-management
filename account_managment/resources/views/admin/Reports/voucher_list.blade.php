@extends('master')
@section('content')
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin font-bold">Voucher List</h4>
        <hr/>

        {{-- Filter Form --}}
        <form method="GET" action="{{ url()->current() }}" class="form-inline mb-3">
            <div class="form-group mr-3">
                <label for="from_date" class="mr-2">From</label>
                <input type="date" name="from_date" id="from_date" class="form-control"
                    value="{{ request('from_date') }}">
            </div>
            <div class="form-group mr-3">
                <label for="to_date" class="mr-2">To</label>
                <input type="date" name="to_date" id="to_date" class="form-control"
                    value="{{ request('to_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        @if(isset($data) && count($data) > 0)
            <h3 class="text-center font-bold">i2Technologies Limited</h3>
            <h4 class="text-center">Voucher List</h4>

            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>Voucher No</th>
                        <th>Manual Voucher No</th>
                        <th>Voucher Type</th>
                        <th>Transaction Code</th>
                        <th>Date of Transaction</th>
                        <th>Voucher File Name</th>
                        <th>Account Head Name</th>
                        <th>Narration</th>
                        <th>Cheque No</th>
                        <th>Date of Issue</th>
                        <th class="text-right">Debit (৳)</th>
                        <th>Dept ID</th>
                        <th>Dept Code</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Supplier ID</th>
                        <th>Supplier Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->voucherno }}</td>
                        <td>{{ $row->manualvoucherno }}</td>
                        <td>{{ $row->vouchertype }}</td>
                        <td>{{ $row->trcode }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->dateoftransaction)->format('Y-m-d') }}</td>
                        <td>{{ $row->voucher_file_name }}</td>
                        <td>{{ $row->accountsheadname }}</td>
                        <td>{{ $row->naration }}</td>
                        <td>{{ $row->cheqno }}</td>
                        <td>{{ $row->dateofissue ? \Carbon\Carbon::parse($row->dateofissue)->format('Y-m-d H:i') : '' }}</td>
                        <td class="text-right">{{ number_format($row->debit, 2) }}</td>
                        <td>{{ $row->dept_id }}</td>
                        <td>{{ $row->dept_code }}</td>
                        <td>{{ $row->emp_id }}</td>
                        <td>{{ $row->ename }}</td>
                        <td>{{ $row->supplier_id }}</td>
                        <td>{{ $row->supplier_name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-muted">No vouchers found.</p>
        @endif
    </div>
</div>
@endsection
