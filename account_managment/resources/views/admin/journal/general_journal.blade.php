@extends('master')

@section('content')

@push('styles')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<style>
    label {
        font-weight: bold;
    }

    .btn {
        padding: 6px 12px;
    }

    .table td,
    .table th {
        vertical-align: middle !important;
    }

    .select2-container--default .select2-selection--single {
        height: 38px;
        padding: 5px 10px;
    }
</style>

<div class="container-fluid">
    <div class="panel panel-default mt-4">
        <div class="panel-heading">
                    <h4 class="panel-title" style="display: inline-block; margin-right: 15px; vertical-align: middle;">Data Table</h4>
                </div>
        <div class="panel-body">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('general_journal_store') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <label for="date">Date</label>
                        <input type="date" name="dateoftransaction" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <label for="manualvoucherno">Manual Voucher No</label>
                        <input type="text" name="manualvoucherno" class="form-control">
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <label for="particulars">Particulars</label>
                        <input type="text" name="particulars" class="form-control" required>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <label for="trcode">Voucher Type</label>
                        <select name="trcode" class="form-control">
                            <option value="1">Debit Voucher</option>
                            <option value="2">Credit Voucher</option>
                            <option value="3">Adjustment Voucher</option>
                        </select>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="journal-entries-table">
                        <thead class="table-light">
                            <tr class="" style="background-color: #CCFCD6;">
                                <th><b>Account Head</b></th>
                                <th><b>Description</b></th>
                                <th><b>Debit</b></th>
                                <th><b>Credit</b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody id="entries-body">
                            <tr>
                                <td>
                                    <select name="entries[0][accountscode]" class="form-control select2">
                                        <option value="">Select Accounts</option>
                                        @foreach ($ac_cartofacc as $ac_cartofaccs)
                                        <option value="{{ $ac_cartofaccs->accountscode }}">
                                            {{ $ac_cartofaccs->accountsheadname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="entries[0][naration]" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="entries[0][debit]" class="form-control debit" value="0" step="0.01">
                                </td>
                                <td>
                                    <input type="number" name="entries[0][credit]" class="form-control credit" value="0" step="0.01">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-row">-</button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-end"><strong>Total:</strong></td>
                                <td><input type="text" id="total-debit" class="form-control" readonly></td>
                                <td><input type="text" id="total-credit" class="form-control" readonly></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="form-actions mt-3">
                    <button type="button" id="add-row" class="btn btn-primary">Add Row</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')


<script>
    let rowCount = 1;

    function calculateTotals() {
        let totalDebit = 0,
            totalCredit = 0;
        document.querySelectorAll('.debit').forEach(input => {
            totalDebit += parseFloat(input.value) || 0;
        });
        document.querySelectorAll('.credit').forEach(input => {
            totalCredit += parseFloat(input.value) || 0;
        });
        document.getElementById('total-debit').value = totalDebit.toFixed(2);
        document.getElementById('total-credit').value = totalCredit.toFixed(2);
    }

    function addListenersToRow(row) {
        row.querySelectorAll('.debit, .credit').forEach(input => {
            input.addEventListener('input', calculateTotals);
        });
        row.querySelector('.remove-row').addEventListener('click', () => {
            row.remove();
            calculateTotals();
        });
    }

    $('#add-row').on('click', function() {
        const rowHtml = `
            <tr>
                <td>
                    <select name="entries[${rowCount}][accountscode]" class="form-control select2">
                        <option value="">Select Accounts</option>
                        @foreach ($ac_cartofacc as $ac_cartofaccs)
                            <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" name="entries[${rowCount}][naration]" class="form-control"></td>
                <td><input type="number" name="entries[${rowCount}][debit]" class="form-control debit" value="0" step="0.01"></td>
                <td><input type="number" name="entries[${rowCount}][credit]" class="form-control credit" value="0" step="0.01"></td>
                <td><button type="button" class="btn btn-danger remove-row">-</button></td>
            </tr>`;
        $('#entries-body').append(rowHtml);
        $('.select2').select2({
            placeholder: 'Select Account',
            allowClear: true,
            width: '100%'
        });
        addListenersToRow($('#entries-body tr').last()[0]);
        rowCount++;
        calculateTotals();
    });

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Select Account',
            allowClear: true,
            width: '100%'
        });
        document.querySelectorAll('#entries-body tr').forEach(row => {
            addListenersToRow(row);
        });
        calculateTotals();
    });
</script>
@endpush

@endsection