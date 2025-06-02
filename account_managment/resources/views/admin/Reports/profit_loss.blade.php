@extends('master')
@section('content')
<div class="panel_s">
    <div class="panel-body">
        <h4 class="no-margin font-bold">General Ladger</h4>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <form id="balanceForm">
                            <div class="form-group" app-field-wrapper="from_date">
                                <label class="control-label" for="mainhead_id">Account Head</label>
                                
                            </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" app-field-wrapper="from_date">
                            <label for="form-label">From Date</label>
                            <input type="date" id="to_date" name="to_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" app-field-wrapper="from_date">
                            <label for="from-label">To Date</label>
                            <input type="date" id="from_date" name="from_date" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-submit mtop25">Filter</button>
                    </form>

                    <div id="reportContainer" class="report-container" style="margin-top: 2rem;"></div>
                </div>
            </div><hr />
            <div class="col-md-6">
                <div class="btn-group pull-right mtop25">
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-print"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#" onclick="printDiv(); return false;">
                                Export to PDF </a>
                        </li>
                        <li>
                            <a href="#" onclick="printExcel(); return false;">
                                Export to Excel </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('balanceForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        const fromDate = document.getElementById('from_date').value;
        const toDate = document.getElementById('to_date').value;
        if (!fromDate || !toDate) {
            alert("Please select both dates.");
            return;
        }

        // Dummy balance sheet data (replace with dynamic AJAX/fetch if needed)
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
        <h3 class="text-center">i2Technologies Limited</h3>
        <h4 class="text-center">Balance Sheet</h4>
        <p class="text-center">${fromDate} - ${toDate}</p>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr><th>Account Head</th>
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
            </tr>
        `;
        }

        reportHTML += `
            </tbody>
        </table>
    `;

        document.getElementById('reportContainer').innerHTML = reportHTML;
    });
</script>

</body>

</html>
@endsection