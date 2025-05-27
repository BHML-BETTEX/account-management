<?php

namespace App\Http\Controllers;

use App\Models\AcCartofacc;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    function generalladger(){
        $chart_of_acc = AcCartofacc::all();
        return view('admin.Reports.generalladger',[
            'chart_of_acc' => $chart_of_acc,
        ]);
    }

    function cashbook(){
        return view('admin.Reports.cashbook');
    }

    function bankbook(){
        return view('admin.Reports.bankbook');
    }

    function trialbalance(){
        return view('admin.Reports.trialbalance');
    }

    function profit_loss(){
        return view('admin.Reports.profit_loss');
    }

    function balance_sheet(){
        return view('admin.Reports.balance_sheet');
    }
}
