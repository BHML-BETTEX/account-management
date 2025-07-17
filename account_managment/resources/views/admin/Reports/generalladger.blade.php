@extends('master')
@section('content')

<div class="panel_s">
    <div class="panel-body" style="background: #fff; border-radius: 8px; padding: 20px;">
        <h4 class="no-margin font-bold mb-4">General Ledger</h4>
        <hr/>

        <div class="row">
            <div class="col-md-6">
                <form id="ledgerForm" class="row d-flex flex-wrap gap-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="mainhead_id">Account Head</label>
                            <select id="mainhead_id" name="mainhead_id" class="selectpicker form-control" data-width="100%" required>
                                <option value="">-- Select --</option>
                                @foreach ($chart_of_acc as $ac_chart)
                                    <option value="{{ $ac_chart->id }}">{{ $ac_chart->accountsheadname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from_date">From Date</label>
                            <input type="date" id="from_date" name="from_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="to_date">To Date</label>
                            <input type="date" id="to_date" name="to_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-info">Filter</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 text-right">
                <div class="btn-group mtop25">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-print"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#" onclick="printDiv(); return false;">Export to PDF</a></li>
                        <li><a href="#" onclick="printExcel(); return false;">Export to Excel</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="reportContainer" class="report-container mt-4"></div>
    </div>
</div>

<style>
    table.report-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
        font-size: 14px;
    }

    table.report-table th,
    table.report-table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    .text-right {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }
</style>

<script>
    document.getElementById('ledgerForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const accountId = document.getElementById('mainhead_id').value;
        const fromDate = document.getElementById('from_date').value;
        const toDate = document.getElementById('to_date').value;

        if (!accountId || !fromDate || !toDate) {
            alert("Please fill all fields.");
            return;
        }

        // Static sample data – replace this block with real fetch/AJAX logic if needed
        const reportData = [
            { date: '2025-07-01', description: 'Opening Balance', debit: 1000.00, credit: 0.00 },
            { date: '2025-07-03', description: 'Invoice Payment', debit: 0.00, credit: 500.00 },
            { date: '2025-07-10', description: 'Bank Deposit', debit: 200.00, credit: 0.00 },
        ];

        let totalDebit = 0;
        let totalCredit = 0;

        let reportHTML = `
        <div class="text-center">
            <h3>i2Technologies Limited</h3>
            <h4>General Ledger</h4>
            <p>${fromDate} - ${toDate}</p>
        </div>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th class="text-right">Debit (৳)</th>
                    <th class="text-right">Credit (৳)</th>
                </tr>
            </thead>
            <tbody>`;

        reportData.forEach(item => {
            reportHTML += `
            <tr>
                <td>${item.date}</td>
                <td>${item.description}</td>
                <td class="text-right">৳${item.debit.toFixed(2)}</td>
                <td class="text-right">৳${item.credit.toFixed(2)}</td>
            </tr>`;
            totalDebit += item.debit;
            totalCredit += item.credit;
        });

        reportHTML += `
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td class="text-right"><strong>৳${totalDebit.toFixed(2)}</strong></td>
                <td class="text-right"><strong>৳${totalCredit.toFixed(2)}</strong></td>
            </tr>
            </tbody>
        </table>`;

        document.getElementById('reportContainer').innerHTML = reportHTML;
    });
</script>
@endsection
