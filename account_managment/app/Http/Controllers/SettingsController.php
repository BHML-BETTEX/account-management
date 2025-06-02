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
        $existing_posting = PostingControl::first();
        return view('admin.settings.posting_control', [
            'posting_control' => $posting_control,
            'existing_posting' => $existing_posting,
        ]);
    }

    function add_posting_control()
    {
        $account_control = AcCartofacc::all();
        $existing_posting = PostingControl::first();
        return view('admin.settings.add_posting_control', [
            'existing_posting' => $existing_posting,
            'account_control' => $account_control,
        ]);
    }

    function posting_control_store(Request $request)
    {
        // Assume there's only one row we want to update, identified by a fixed ID or condition
    $existing = PostingControl::first(); // or use where clause if needed

    if ($existing) {
        // Update existing row
        $existing->update([
            'saleshead' => $request->saleshead,
            'salesdiscounthead'=> $request->salesdiscounthead,
            'salesreturnhead'=> $request->salesreturnhead,
            'salescommissionhead'=>$request->salescommissionhead,
            'salescommission_expense'=>$request->salescommission_expense,
            'cost_of_sales'=>$request->cost_of_sales,
            'fginventoryhead'=>$request->fginventoryhead,
            'cashaccounthead'=>$request->cashaccounthead,
            'defaultbranch'=>$request->defaultbranch,
            'accountsreceivablehead'=>$request->accountsreceivablehead,
            'accountspayablehead'=>$request->accountspayablehead,
            'advance_from_customer'=>$request->advance_from_customer,
            'advance_to_vendor'=>$request->advance_to_vendor,
            'pp_claim_debit_head'=>$request->pp_claim_debit_head,
            'pp_claim_credit_head'=>$request->pp_claim_credit_head,
            'credit_note_debit_head'=>$request->credit_note_debit_head,
            'credit_note_credit_head'=>$request->credit_note_credit_head,

        ]);
    } else {
        // Insert new row
        PostingControl::create([
            'saleshead' => $request->saleshead,
            'salesdiscounthead'=> $request->salesdiscounthead,
            'salesreturnhead'=> $request->salesreturnhead,
            'salescommissionhead'=>$request->salescommissionhead,
            'salescommission_expense'=>$request->salescommission_expense,
            'cost_of_sales'=>$request->cost_of_sales,
            'fginventoryhead'=>$request->fginventoryhead,
            'cashaccounthead'=>$request->cashaccounthead,
            'defaultbranch'=>$request->defaultbranch,
            'accountsreceivablehead'=>$request->accountsreceivablehead,
            'accountspayablehead'=>$request->accountspayablehead,
            'advance_from_customer'=>$request->advance_from_customer,
            'advance_to_vendor'=>$request->advance_to_vendor,
            'pp_claim_debit_head'=>$request->pp_claim_debit_head,
            'pp_claim_credit_head'=>$request->pp_claim_credit_head,
            'credit_note_debit_head'=>$request->credit_note_debit_head,
            'credit_note_credit_head'=>$request->credit_note_credit_head,

        ]);
    }

    return back()->with('success', 'Sales head updated successfully!');
    }
}
