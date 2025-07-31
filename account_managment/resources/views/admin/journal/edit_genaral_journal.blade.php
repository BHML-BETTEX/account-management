@extends('master')

@section('content')
<!-- Include Select2 and Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


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
        background-color: white;
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

    .contain {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="contain">
    <div class="widget-content">
        <div class="panel panel-default mt-4">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>{{ isset($entry) ? 'Edit' : 'New' }} General Journal</h4>

                        @if(session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                        @elseif(session('error'))
                        <div style="color: red;">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ isset($entry) ? route('general_journal_update', $entry->id) : route('general_journal_store') }}">
                            @csrf
                            @if(isset($entry)) @method('PUT') @endif

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="dateoftransaction" class="form-control"
                                        value="{{ old('dateoftransaction', isset($entry) ? $entry->dateoftransaction : date('Y-m-d')) }}">
                                </div>
                                <div class="form-group">
                                    <label for="manualvoucherno">Manual Voucher No</label>
                                    <input type="text" name="manualvoucherno" class="form-control"
                                        value="{{ old('manualvoucherno', $entry->manualvoucherno ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="particulars">Particulars</label>
                                    <input type="text" name="particulars" class="form-control" required
                                        value="{{ old('particulars', $entry->particulars ?? '') }}">
                                </div>
                            </div>

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
                                    @php $rowCount = 0; @endphp
                                    @if(isset($entry) && $entry->details)
                                        @foreach($entry->details as $index => $detail)
                                            <tr>
                                                <td>
                                                    <select name="entries[{{ $index }}][accountscode]" class="form-control select2">
                                                        @foreach ($ac_cartofacc as $acc)
                                                        <option value="{{ $acc->accountscode }}" {{ $acc->accountscode == $detail->accountscode ? 'selected' : '' }}>
                                                            {{ $acc->accountsheadname }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" name="entries[{{ $index }}][naration]" class="form-control" value="{{ $detail->naration }}"></td>
                                                <td><input type="number" name="entries[{{ $index }}][debit]" class="form-control debit" value="{{ $detail->debit }}" step="0.01"></td>
                                                <td><input type="number" name="entries[{{ $index }}][credit]" class="form-control credit" value="{{ $detail->credit }}" step="0.01"></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger remove-row" title="Remove">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @php $rowCount++; @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <select name="entries[0][accountscode]" class="form-control select2">
                                                    @foreach ($ac_cartofacc as $acc)
                                                    <option value="{{ $acc->accountscode }}">{{ $acc->accountsheadname }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="entries[0][naration]" class="form-control"></td>
                                            <td><input type="number" name="entries[0][debit]" class="form-control debit" value="0" step="0.01"></td>
                                            <td><input type="number" name="entries[0][credit]" class="form-control credit" value="0" step="0.01"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-row" title="Remove">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php $rowCount = 1; @endphp
                                    @endif
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
                                <button type="submit" class="btn btn-success">{{ isset($entry) ? 'Update' : 'Save' }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')


<script>
    let rowCount = {{ $rowCount }};

   function calculateTotals() {
    let totalDebit = 0;
    let totalCredit = 0;

    document.querySelectorAll('#entries-body tr').forEach(row => {
        const debit = parseFloat(row.querySelector('.debit')?.value) || 0;
        const credit = parseFloat(row.querySelector('.credit')?.value) || 0;

        totalDebit += debit;
        totalCredit += credit;
    });

    document.getElementById('total-debit').value = totalDebit.toFixed(2);
    document.getElementById('total-credit').value = totalCredit.toFixed(2);
}

    function addListenersToRow(row) {
        // Recalculate totals live on user input
        row.querySelectorAll('.debit, .credit').forEach(input => {
            input.addEventListener('input', () => {
                calculateTotals();
            });
        });

        // Remove row and recalculate
        row.querySelector('.remove-row').addEventListener('click', () => {
            row.remove();
            calculateTotals();
        });

        // Initialize Select2 dropdown
        $(row).find('.select2').select2({
            placeholder: 'Select Account',
            allowClear: true,
            width: '100%'
        });
    }

    // Add new row dynamically
    document.getElementById('add-row').addEventListener('click', () => {
        const tbody = document.getElementById('entries-body');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <select name="entries[${rowCount}][accountscode]" class="form-control select2">
                    @foreach ($ac_cartofacc as $acc)
                        <option value="{{ $acc->accountscode }}">{{ $acc->accountsheadname }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="entries[${rowCount}][naration]" class="form-control"></td>
            <td><input type="number" name="entries[${rowCount}][debit]" class="form-control debit" value="0" step="0.01"></td>
            <td><input type="number" name="entries[${rowCount}][credit]" class="form-control credit" value="0" step="0.01"></td>
            <td>
                <button type="button" class="btn btn-danger remove-row" title="Remove">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;

        tbody.appendChild(newRow);
        addListenersToRow(newRow);
        rowCount++;
        calculateTotals(); // Recalculate on adding new row
    });

    // Initial setup
    window.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('#entries-body tr').forEach(row => {
            addListenersToRow(row);
        });

        calculateTotals();

        $('.select2').select2({
            placeholder: 'Select Account',
            allowClear: true,
            width: '100%'
        });
    });
</script>



@endpush

@endsection
