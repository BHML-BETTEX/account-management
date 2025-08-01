@extends('master')

@section('content')
<div class="panel_s">
    <div class="panel-body" style="background: #fff; border-radius: 8px; padding: 20px;">
        <h4 class="no-margin font-bold mb-4">Trail Balance</h4>
        <hr />
        <div class="row mb-4 align-items-end">
            <form id="balanceForm" class="form-inline col-md-6 d-flex flex-wrap gap-3">
                <div class="form-group mr-3">
                    <label for="from_date" class="form-label">Start day</label>
                    <input type="date" id="from_date" name="from_date" class="form-control" required>
                </div>
                <div class="form-group mr-3">
                    <label for="to_date" class="form-label">End date</label>
                    <input type="date" id="to_date" name="to_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-info">FILTER</button>
            </form>

            <div class="col-md-6 text-right">
                <div class="btn-group">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-print"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#" onclick="printDiv(); return false;">Export to PDF</a></li>
                        <li><a href="#" onclick="printExcel(); return false;">Export to Excel</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="reportContainer" class="report-container">

            <h2 style="text-align:center;">Trial Balance</h2>
            <p style="text-align:center;">As of {{ $report_date }}</p>

            <table>
                <thead>
                    <tr>
                        <th>Accounts Description</th>
                        <th class="text-right">Debit Amount</th>
                        <th class="text-right">Credit Amount</th>
                        <th class="text-right">Balance Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $grand_debit = 0;
                        $grand_credit = 0;
                        $grand_balance = 0;
                    @endphp

                    @foreach ($grouped as $mainheadcode => $items)
                        @php
                            $main = $items->first();
                            $sub_total_debit = 0;
                            $sub_total_credit = 0;
                            $sub_total_balance = 0;
                        @endphp

                        <tr class="mainhead">
                            <td colspan="4">{{ $main->op_mainheadcode }} {{ $main->op_mainheadname }}</td>
                        </tr>

                        @foreach ($items as $item)
                            @php
                                //$balance = ($item->op_debit ?? 0) - ($item->op_credit ?? 0);
                                $balance = $item->op_balance;
                                $sub_total_debit += $item->op_debit ?? 0;
                                $sub_total_credit += $item->op_credit ?? 0;
                                $sub_total_balance += $balance;
                            @endphp
                            <tr>
                                <td>{{ $item->op_accountscode }} {{ $item->op_accountsheadname }}</td>
                                <td class="text-right">{{ format_money($item->op_debit ?? 0, 2) }}</td>
                                <td class="text-right">{{ format_money($item->op_credit ?? 0, 2) }}</td>
                                <td class="text-right">{{ format_money($item->op_balance, 2) }}</td>
                            </tr>
                        @endforeach

                        <tr class="bold">
                            <td>Main Head Total:</td>
                            <td class="text-right">{{ format_money($sub_total_debit, 2) }}</td>
                            <td class="text-right">{{ format_money($sub_total_credit, 2) }}</td>
                            <td class="text-right">{{ format_money($sub_total_balance, 2) }}</td>
                        </tr>

                        @php
                            $grand_debit += $sub_total_debit;
                            $grand_credit += $sub_total_credit;
                            $grand_balance += $sub_total_balance;
                        @endphp
                    @endforeach

                    <tr class="grand-total">
                        <td>Grand Total:</td>
                        <td class="text-right">{{ format_money($grand_debit, 2) }}</td>
                        <td class="text-right">{{ format_money($grand_credit, 2) }}</td>
                        <td class="text-right">{{ format_money($grand_balance, 2) }}</td>
                    </tr>
                </tbody>
            </table>



        </div>
    </div>
</div>

<style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 5px; text-align: left; border-bottom: 1px solid #ccc; }
        th { background-color: #f4f4f4; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }
        .mainhead { background-color: #e9ecef; font-weight: bold; }
        .grand-total { border-top: 2px solid #000; font-weight: bold; }

</style>

<script>
    document.getElementById('balanceForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const fromDate = document.getElementById('from_date').value;
        const toDate = document.getElementById('to_date').value;

        if (!fromDate || !toDate) {
            alert("Please select both dates.");
            return;
        }

        const reportData = {
            'Accounts Receivable (A/R)': 0.00,
            'Cash and cash equivalents': 0.00,
            'Petty Cash Received': 0.00,
            'Allowance for bad debts': 0.00,
            'Inventory': 0.00,
            'Inventory Asset': 0.00,
            'Prepaid Expenses': 0.00
        };

        let reportHTML = `
        <div class="text-center">
            <h3>i2Technologies Limited</h3>
            <h4>Trail Balance</h4>
            <p>${fromDate} - ${toDate}</p>
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Account Head</th>
                    <th class="text-right">Total (৳)</th>
                </tr>
            </thead>
            <tbody>
        `;

        for (const [key, value] of Object.entries(reportData)) {
            reportHTML += `
            <tr>
                <td>${key}</td>
                <td class="text-right">৳${value.toFixed(2)}</td>
            </tr>`;
        }

        reportHTML += `
            </tbody>
        </table>`;

        document.getElementById('reportContainer').innerHTML = reportHTML;
    });
</script>
@endsection
