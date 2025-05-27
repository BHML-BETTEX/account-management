<?php

namespace App\Http\Controllers;

use App\Models\AcCartofacc;
use App\Models\PostingControl;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function posting_control()
    {
        $posting_control = PostingControl::all();
        return view('admin.settings.posting_control', [
            'posting_control' => $posting_control,
        ]);
    }

    function add_posting_control()
    {
        $account_control = AcCartofacc::all();
        return view('admin.settings.add_posting_control', [
            'account_control' => $account_control,
        ]);
    }

    function posting_control_store(Request $request)
    {
        PostingControl::insert([
            'saleshead' => $request->saleshead,
            'salesreturnhead' => $request->salesreturnhead,
            'salesdiscounthead' => $request->salesdiscounthead,
            'salescommissionhead' => $request->salescommissionhead,
            'salescommission_expense' => $request->salescommission_expense,
            'rmpurchasehead' => $request->rmpurchasehead,
            'rmpurchasereturnhead' => $request->rmpurchasereturnhead,
            'rmpurchasediscounthead' => $request->rmpurchasediscounthead,
            'rminventoryhead' => $request->rminventoryhead,
            'fgpurchasehead' => $request->fgpurchasehead,
            'fgpurchasereturnhead' => $request->fgpurchasereturnhead,
            'fgpurchasediscounthead' => $request->fgpurchasediscounthead,
            'fginventoryhead' => $request->fginventoryhead,
            'accountsreceivablehead' => $request->accountsreceivablehead,
            'accountspayablehead' => $request->accountspayablehead,
            'cashaccounthead' => $request->cashaccounthead,
            'bankaccounthead' => $request->bankaccounthead,
            'workinprocessinventoryhead' => $request->workinprocessinventoryhead,
            'servicemainhead' => $request->servicemainhead,
            'defaultbranch' => $request->defaultbranch,
            'cost_of_sales' => $request->cost_of_sales,
            'advance_to_vendor' => $request->advance_to_vendor,
            'advance_from_customer' => $request->advance_from_customer,
            'pp_claim_debit_head' => $request->pp_claim_debit_head,
            'pp_claim_credit_head' => $request->pp_claim_credit_head,
            'credit_note_debit_head' => $request->credit_note_debit_head,
            'credit_note_credit_head' => $request->credit_note_credit_head,
        ]);
        return back();
    }
}
