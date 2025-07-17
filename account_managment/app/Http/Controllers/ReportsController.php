<?php

namespace App\Http\Controllers;

use App\Models\AcCartofacc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    function generalladger()
    {
        $chart_of_acc = AcCartofacc::all();
        $entries = collect([
        ['date' => '01-01-2023', 'voucher_no' => '3202300001', 'description' => 'Opening Cash', 'debit' => 13298, 'credit' => 0],
        ['date' => '01-01-2023', 'voucher_no' => '3202300001', 'description' => 'Loan From BHML', 'debit' => 200000, 'credit' => 0],
        ['date' => '02-01-2023', 'voucher_no' => '1202300001', 'description' => 'Daily Bazar Expense', 'debit' => 0, 'credit' => 5390],
        ['date' => '02-01-2023', 'voucher_no' => '1202300002', 'description' => 'Courier Bill', 'debit' => 0, 'credit' => 5500],
        ['date' => '02-01-2023', 'voucher_no' => '1202300003', 'description' => 'Material Purchase', 'debit' => 0, 'credit' => 55300],
        ['date' => '02-01-2023', 'voucher_no' => '1202300004', 'description' => 'Sample Purchase', 'debit' => 0, 'credit' => 65],
        // ... Add all records as needed
    ]);
        return view('admin.reports.generalladger', [
            //dd($chart_of_acc),
            'chart_of_acc' => $chart_of_acc,'entries' => $entries
        ]);
    }

    function cashbook()
    {
        return view('admin.Reports.cashbook');
    }

    function bankbook()
    {
        return view('admin.Reports.bankbook');
    }

    function trialbalance()
    {
        return view('admin.Reports.trialbalance');
    }

    public function profit_loss(Request $request)
    {
        $fromDate = $request->input('from_date'); // from form input

        if (!$fromDate) {
            // handle missing date (redirect or default date)
            $fromDate = date('Y-m-d'); // for example, today
        }

        // Call stored procedure, pass date param
        $result = DB::select("CALL sp_incomestatement(?)", [$fromDate]);

        // Pass the result set to view
        return view('admin.Reports.profit_loss', [
            'result' => $result,
            'fromDate' => $fromDate,
        ]);
    }

    function balance_sheet()
    {
        // Example data from database or calculations
            $assets = [
                'cash_on_hand' => 94193,
                'cash_at_bank' => 2950,
                'accounts_receivables' => 20000,
            ];

            $liabilities = [
                'loans' => 213298,
            ];

            $equity = [
                'net_loss' => 102055,
            ];

            $total_assets = array_sum($assets);
            $total_liabilities = array_sum($liabilities);
            $total_equity = array_sum($equity);

            return view('admin.Reports.balance_sheet', compact(
                'assets',
                'liabilities',
                'equity',
                'total_assets',
                'total_liabilities',
                'total_equity'
            ));

    }

    public function voucher_list(Request $request)
{
    $from = $request->input('from_date');
    $to = $request->input('to_date');

    $data = DB::select("CALL sp_voucher_list()");

    // Laravel-side filtering
    if ($from && $to) {
        $data = collect($data)->filter(function ($item) use ($from, $to) {
            return $item->dateoftransaction >= $from && $item->dateoftransaction <= $to;
        });
    }

    return view('admin.Reports.voucher_list', [
        'data' => $data,
    ]);
}

}
