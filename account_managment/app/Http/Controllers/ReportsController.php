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

    function profit_loss(Request $request)
    {
        $fromDate = $request->input('from_date');
        $result = DB::select("CALL sp_incomestatement(?)", [$fromDate]);
        return view('admin.Reports.profit_loss', [
            'result' => $result,
            'fromDate' => $fromDate,
        ]);
    }

    function balance_sheet()
    {
        return view('admin.Reports.balance_sheet');
    }
}
