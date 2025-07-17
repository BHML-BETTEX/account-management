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


    <h2 style="text-align:center;">Balance Sheet</h2>
    <p style="text-align:center;">As of {{ $report_date }}</p>

    <table>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr><td class="section-title" colspan="2">Assets</td></tr>

                    @foreach (($grouped['Assets'] ?? collect())->groupBy('controlname') as $control => $items)
                        <tr><td class="group-title" colspan="2">{{ $control }}</td></tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['mainheadname'] }}</td>
                                <td class="amount">{{ format_money($item['closing_bal']) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr class="border-top">
                        <td><strong>Total Assets</strong></td>
                        <td class="amount"><strong>{{ format_money($totals['Assets']['closing'] ?? 0) }}</strong></td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%; vertical-align: top;">
                <table>
                    <tr><td class="section-title" colspan="2">Liabilities</td></tr>
                    @foreach (($grouped['Liabilities'] ?? collect())->groupBy('controlname') as $control => $items)
                        <tr><td class="group-title" colspan="2">{{ $control }}</td></tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['mainheadname'] }}</td>
                                <td class="amount">{{ format_money($item['closing_bal']) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr class="border-top">
                        <td><strong>Total Liabilities</strong></td>
                        <td class="amount"><strong>{{ format_money($totals['Liabilities']['closing'] ?? 0) }}</strong></td>
                    </tr>

                    <tr><td class="section-title" colspan="2">Equity</td></tr>
                    @foreach (($grouped['Equity'] ?? collect())->groupBy('controlname') as $control => $items)
                        <tr><td class="group-title" colspan="2">{{ $control }}</td></tr>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['mainheadname'] }}</td>
                                <td class="amount">{{ format_money($item['closing_bal']) }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    <tr class="border-top">
                        <td><strong>Total Equity</strong></td>
                        <td class="amount"><strong>{{ format_money($totals['Equity']['closing'] ?? 0) }}</strong></td>
                    </tr>

                    <tr class="border-double">
                        <td><strong>Total Liabilities + Equity</strong></td>
                        <td class="amount"><strong>
                            {{ format_money(($totals['Liabilities']['closing'] ?? 0) + ($totals['Equity']['closing'] ?? 0)) }}
                        </strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



        {{-- <h2 style="text-align:center;">Balance Sheet</h2>
            <p style="text-align:center;">{{ $report_date ?? now()->toDateString() }}</p>

            <table>
                <tr>
                    <td style="width: 50%; vertical-align: top;">
                        <table>
                            <tr><td class="section-title" colspan="2">Assets</td></tr>
                            <tr><td class="group-title" colspan="2">Current Assets</td></tr>
                            <tr>
                                <td>Cash on Hand</td>
                                <td class="amount">{{ number_format($assets['cash_on_hand'], 2) }}</td>
                            </tr>
                            <tr>
                                <td>Cash at Bank</td>
                                <td class="amount">{{ number_format($assets['cash_at_bank'], 2) }}</td>
                            </tr>
                            <tr>
                                <td>Accounts Receivables</td>
                                <td class="amount">{{ number_format($assets['accounts_receivables'], 2) }}</td>
                            </tr>
                            <tr class="border-top">
                                <td><strong>Total Assets</strong></td>
                                <td class="amount"><strong>{{ number_format($total_assets, 2) }}</strong></td>
                            </tr>
                        </table>
                    </td>

                    <td style="width: 50%; vertical-align: top;">
                        <table>
                            <tr><td class="section-title" colspan="2">Liabilities</td></tr>
                            <tr><td class="group-title" colspan="2">Current Liabilities</td></tr>
                            <tr>
                                <td>Loans</td>
                                <td class="amount">{{ number_format($liabilities['loans'], 2) }}</td>
                            </tr>
                            <tr class="border-top">
                                <td><strong>Total Liabilities</strong></td>
                                <td class="amount"><strong>{{ number_format($total_liabilities, 2) }}</strong></td>
                            </tr>
                            <tr><td class="group-title" colspan="2">Equity</td></tr>
                            <tr>
                                <td>Net Loss</td>
                                <td class="amount">{{ format_money($equity['net_loss'], 2) }}</td>
                            </tr>
                            <tr class="border-top">
                                <td><strong>Total Equity</strong></td>
                                <td class="amount"><strong>{{ number_format($total_equity, 2) }}</strong></td>
                            </tr>
                            <tr class="border-double">
                                <td><strong>Total Liabilities + Equity</strong></td>
                                <td class="amount"><strong>{{ number_format($total_liabilities + $total_equity, 2) }}</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> --}}


        </div>
    </div>
</div>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .section-title {
            background-color: #ddd;
            font-weight: bold;
            padding: 6px;
        }
        .group-title {
            font-weight: bold;
            padding: 6px;
        }
        td, th {
            padding: 6px;
            vertical-align: top;
        }
        .amount {
            text-align: right;
        }
        .border-top {
            border-top: 1px solid #000;
        }
        .border-double {
            border-top: 3px double #000;
        }
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
