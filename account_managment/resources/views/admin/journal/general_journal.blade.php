@extends('master')

@section('content')
<style>
    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .form-group {
        flex: 1;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    select,
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 6px;
        box-sizing: border-box;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 8px;
        border: 1px solid #ccc;
        text-align: left;
    }

    .form-actions {
        margin-top: 20px;
    }

    .btn {
        padding: 6px 12px;
        margin-right: 10px;
        cursor: pointer;
    }
</style>

<div class="contain">
    <div class="widget-content">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>General Journal</h4>
                        @if(session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                        @elseif(session('error'))
                        <div style="color: red;">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('general_journal_store') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="dateoftransaction" class="form-control" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="manualvoucherno">Manual Voucher No</label>
                                    <input type="text" name="manualvoucherno" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="particulars">Particulars</label>
                                    <input type="text" name="particulars" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="particulars" title="" >Voucher Type</label>
                                    <select name="trcode" class="form-control">
                                        <option value="1">Debit Voucher (Paying out cash or bank.)</option>
                                        <option value="2">Credit Voucher (Receiving money into cash or bank.)</option>
                                        <option value="3">Adjustment Voucher (Not involving cash or bank directly)</option>
                                    </select>                                
                                </div>

                            </div>

                            <!-- Journal Entries Table -->
                            <table id="journal-entries-table">
                                <thead style="background-color: #e5f4f9">
                                    <tr>
                                        <th>Account Head</th>
                                        <th>Description</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="entries-body">
                                    <!-- Initial row -->
                                    <tr>
                                        <td>
                                            <select name="entries[0][accountscode]" class="form-control">
                                                @foreach ($ac_cartofacc as $ac_cartofaccs)
                                                <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="entries[0][naration]" class="form-control"></td>
                                        <td><input type="number" name="entries[0][debit]" class="form-control debit" value="0" step="0.01"></td>
                                        <td><input type="number" name="entries[0][credit]" class="form-control credit" value="0" step="0.01"></td>
                                        <td><button type="button" class="btn btn-danger remove-row">-</button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-right"><strong>Total:</strong></td>
                                        <td><input type="text" id="total-debit" class="form-control" readonly></td>
                                        <td><input type="text" id="total-credit" class="form-control" readonly></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="form-actions">
                                <button type="button" id="add-row" class="btn btn-primary">Add Row</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




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

    document.getElementById('add-row').addEventListener('click', () => {
        const tableBody = document.getElementById('entries-body');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="entries[${rowCount}][accountscode]" class="form-control">
                    @foreach ($ac_cartofacc as $ac_cartofaccs)
                        <option value="{{ $ac_cartofaccs->accountscode }}">{{ $ac_cartofaccs->accountsheadname }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="entries[${rowCount}][naration]" class="form-control"></td>
            <td><input type="number" name="entries[${rowCount}][debit]" class="form-control debit" value="0" step="0.01"></td>
            <td><input type="number" name="entries[${rowCount}][credit]" class="form-control credit" value="0" step="0.01"></td>
            <td><button type="button" class="btn btn-danger remove-row">-</button></td>
        `;
        tableBody.appendChild(newRow);
        rowCount++;
        addListenersToNewInputs(newRow);
        calculateTotals();
    });

    function addListenersToNewInputs(row) {
        row.querySelectorAll('.debit, .credit').forEach(input => {
            input.addEventListener('input', calculateTotals);
        });

        row.querySelector('.remove-row').addEventListener('click', () => {
            row.remove();
            calculateTotals();
        });
    }

    // Initial setup for first row
    document.querySelectorAll('.debit, .credit').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });
    document.querySelector('.remove-row').addEventListener('click', function() {
        this.closest('tr').remove();
        calculateTotals();
    });

    window.addEventListener('DOMContentLoaded', calculateTotals);
</script>
@endsection