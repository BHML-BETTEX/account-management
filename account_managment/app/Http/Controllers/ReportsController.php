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
        return view('admin.Reports.generalladger', [
            //dd($chart_of_acc),
            'chart_of_acc' => $chart_of_acc,
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
        return view('admin.Reports.balance_sheet');
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
