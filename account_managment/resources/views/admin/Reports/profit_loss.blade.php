@extends('master')

@section('content')
<div class="panel_s">
    <div class="panel-body" style="background: #fff; border-radius: 8px; padding: 20px;">
        <h4 class="no-margin font-bold mb-4">Balance Sheet</h4>
        <a href="#" class="text-primary" style="font-size: 14px;">← Back to report list</a>
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


<h2 style="text-align:center;">Profit and Loss Statement</h2>
    <p style="text-align:center;">as on: {{ \Carbon\Carbon::parse($report_date)->format('d-M-Y') }}</p>
    <hr>

    <p class="section-title"></p>

    @php
        $grand_total = 0;
    @endphp
    @foreach ($grouped as $ctrlcode=> $grouped_main)
        @php
            $ctrlcode_main = $grouped_main->first();
             $grouped_main = collect($grouped_main)->groupBy('op_mhcode');
        @endphp
            <p class="bold">{{ $ctrlcode_main['op_ctrlcode'] }}{{ $ctrlcode_main['op_ctrlname'] }}</p>

        @foreach ($grouped_main as $mainheadcode => $items)

        @php
            $main = $items->first();
        @endphp
            <p class="bold">{{ $main['op_mhcode'] }}{{ $main['op_mhname'] }}</p>
            <table>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['op_accscode'] }} {{ $item['op_accsname'] }}</td>
                        <td class="text-right">{{ number_format($item['op_bal'], 2) }}</td>
                    </tr>
                @endforeach
            </table>
            @php
                $main_total = $items->sum('op_bal');
                $grand_total += $main_total;
            @endphp
        @endforeach
    @endforeach

    <table style="margin-top: 20px;">
        <tr>
            <td class="text-right bold" style="width: 80%;">Total:</td>
            <td class="text-right bold">{{ number_format($grand_total, 2) }}</td>
        </tr>
        <tr class="net-total">
            <td class="text-right">Net Loss:</td>
            <td class="text-right">{{ number_format($net_loss, 2) }}</td>
        </tr>
    </table>






        </div>
    </div>
</div>

        <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 5px; text-align: left; }
        .bold { font-weight: bold; }
        .text-right { text-align: right; }
        .section-title { font-weight: bold; border-top: 1px solid #000; padding-top: 5px; margin-top: 10px; }
        .net-total { font-weight: bold; border-top: 2px solid #000; border-bottom: 2px double #000; }
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
            <h4>Balance Sheet</h4>
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
