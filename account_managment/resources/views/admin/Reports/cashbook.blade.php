@extends('master')

@section('content')
<div class="panel_s">
    <div class="panel-body" style="background: #fff; border-radius: 8px; padding: 20px;">
        <h4 class="no-margin font-bold mb-4">Cash Book</h4>
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

        <div id="reportContainer" class="report-container"></div>
    </div>
</div>

<style>
    table.report-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
        font-size: 14px;
    }

    table.report-table th, table.report-table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    table.report-table thead {
        background-color: #e5f4f9;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    h3, h4 {
        margin: 0;
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
            <h4>Cash Book</h4>
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
