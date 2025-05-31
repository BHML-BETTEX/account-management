@extends('master')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h4 {
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    .form-row {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .form-group {
        flex: 1;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
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

    .form-actions button {
        padding: 8px 16px;
        margin-right: 10px;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
    }
</style>

<div class="contain">
    <div class="row">
        <!-- Table Section (8 columns) -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">General Journal</h4>
                </div>
                <div class="panel-body">
                    @if(session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                    @elseif(session('error'))
                    <div style="color: red;">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{route('general_journal_store')}}">
                        @csrf

                        <!-- Date, Voucher No, Particulars -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="dateoftransaction" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label for="voucherno">Voucher No</label>
                                <input type="text" name="voucherno" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="particulars">Particulars</label>
                                <input type="text" name="particulars" class="form-control" required>
                            </div>
                        </div>

                        <!-- Journal Entries Table -->
                        <table>
                            <thead style="background-color: #e5f4f9">
                                <tr>
                                    <th>Account Head</th>
                                    <th>Description</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 5; $i++)
                                    <tr>
                                    <td>
                                        <select name="entries[{{ $i }}][accountscode]" class="form-control">
                                            @foreach ($ac_cartofacc as $ac_cartofaccs)
                                            <option value="{{$ac_cartofaccs->accountscode}}">{{$ac_cartofaccs->accountsheadname}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="entries[{{ $i }}][naration]" class="form-control"></td>
                                    <td><input type="number" name="entries[{{ $i }}][debit]" class="form-control debit" value="0" step="0.01"></td>
                                    <td><input type="number" name="entries[{{ $i }}][credit]" class="form-control credit" value="0" step="0.01"></td>
                                    </tr>
                                    @endfor
                            </tbody>

                            <!-- Totals Row -->
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total:</strong></td>
                                    <td><input type="text" id="total-debit" class="form-control" readonly></td>
                                    <td><input type="text" id="total-credit" class="form-control" readonly></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Save Button -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function calculateTotals() {
        let totalDebit = 0;
        let totalCredit = 0;

        document.querySelectorAll('.debit').forEach(input => {
            totalDebit += parseFloat(input.value) || 0;
        });

        document.querySelectorAll('.credit').forEach(input => {
            totalCredit += parseFloat(input.value) || 0;
        });

        document.getElementById('total-debit').value = totalDebit.toFixed(2);
        document.getElementById('total-credit').value = totalCredit.toFixed(2);
    }

    // Attach input event listeners
    document.querySelectorAll('.debit, .credit').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });

    // Trigger initial calculation
    window.addEventListener('DOMContentLoaded', calculateTotals);
</script>



@endsection