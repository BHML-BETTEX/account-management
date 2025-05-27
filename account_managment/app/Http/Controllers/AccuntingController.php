<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ac_type;
use App\Models\ac_control;
use App\Models\AcCategory;
use App\Models\AcMainhead;
use App\Models\AcCartofacc;
use App\Models\AcTransactionDetail;
use App\Models\AcTransactionMain;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccuntingController extends Controller
{

    function acc_type()
    {
        $account_types = ac_type::all();
        return view('admin.acc_type', [
            'account_types' => $account_types,
        ]);
    }

    function acc_type_edit($id)
    {
        $edit_type = ac_type::findOrFail($id);
        $account_types = ac_type::all(); // ⚠️ THIS IS REQUIRED
        return view('admin.acc_type', [
            'edit_type' => $edit_type,
            'account_types' => $account_types,
        ]);
    }

    function acc_type_update(Request $request)
    {
        ac_type::find($request->id)->update([
            'typename' => $request->typename,
        ]);
        return back();
    }

    function acc_type_store(Request $request)
    {
        ac_type::insert([
            'typename' => $request->typename,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }
    function acc_type_delete($id)
    {
        ac_type::find($id)->delete();
        return back();
    }

    function acc_control()
    {
        $account_type = ac_type::all();
        $account_control = ac_control::all();
        return view('admin.acc_control', [
            'account_type' => $account_type,
            'account_control' => $account_control,
        ]);
    }

    function acc_control_store(Request $request)
    {
        ac_control::insert([
            'controlname' => $request->controlname,
            'typecode' => $request->typecode,
        ]);
        return back();
    }

    function acc_control_delete($controlcode)
    {
        ac_control::find($controlcode)->delete();
        return back();
    }

    function main_head()
    {
        $account_control = ac_control::all();
        $main_head = AcMainhead::all();
        return view('admin.main_head', [
            'account_control' => $account_control,
            'main_head' => $main_head,
        ]);
    }

    function main_head_store(Request $request)
    {
        AcMainhead::insert([
            'mainheadcode' => $request->mainheadcode,
            'mainheadname' => $request->mainheadname,
            'controlcode' => $request->controlcode,
        ]);
        return back();
    }

    function main_head_delete($id)
    {
        AcMainhead::find($id)->delete();
        return back();
    }

    //account category
    function acc_category()
    {
        $account_category = AcCategory::all();
        return view('admin.acc_category', [
            'account_category' => $account_category,
        ]);
    }

    function acc_category_store(Request $request)
    {
        AcCategory::insert([
            'short_name' => $request->short_name,
            'long_name' => $request->long_name,
        ]);
        return back();
    }

    function acc_category_delete($id)
    {
        AcCategory::find($id)->delete();
        return back();
    }

    function acc_category_edit($id)
    {
        $edit_type = AcCategory::findOrFail($id);
        $account_category = AcCategory::all();
        return view('admin.acc_category', [
            'edit_type' => $edit_type,
            'account_category' => $account_category,
        ]);
    }

    function acc_category_update(Request $request)
    {
        $request->validate([
            'short_name' => 'required|string|max:50',
            'long_name' => 'required|string|max:100',
        ]);

        AcCategory::findOrFail($request->id)->update([
            'short_name' => $request->short_name,
            'long_name' => $request->long_name,
        ]);
        return back();
    }

    //chart of account
    function chart_of_account(Request $request)
    {
        $search = $request->input('search', '');

        if ($search != '') {
            $ac_cartofacc = AcCartofacc::where('accountsheadname', 'LIKE', "%$search%")->paginate(13);
        } else {
            $ac_cartofacc = AcCartofacc::paginate(13);
        }

        $main_head = AcMainhead::all();
        $ac_category = AcCategory::all();

        return view('admin.chartofacc.chart_of_account', [
            'main_head' => $main_head,
            'ac_category' => $ac_category,
            'ac_cartofacc' => $ac_cartofacc,
            'search'=> $search,
        ]);
    }

    function chart_of_account_store(Request $request)
    {
        AcCartofacc::insert([
            'accountscode' => $request->accountscode,
            'companyid' => $request->companyid,
            'mainhead_id' => $request->mainhead_id,
            'mainheadcode' => $request->mainheadcode,
            'accountsheadname' => $request->accountsheadname,
            'category' => $request->category,
            'debit' => $request->debit,
            'credit' => $request->credit,
            'balance' => $request->balance,
            'obsolete' => $request->obsolete,
            'opening_balance_debit' => $request->opening_balance_debit,
            'opening_balance_credit' => $request->opening_balance_credit,
            'opening_date' => $request->opening_date,
        ]);

        return back();
    }
    public function chart_of_account_update(Request $request)
    {
        DB::table('ac_chartofacc')
            ->where('coa_id', $request->coa_id)
            ->update([
                'mainhead_id' => $request->mainhead_id,
                'accountsheadname' => $request->accountsheadname,
                'category' => $request->category,
            ]);

        return back()->with('success', 'Account updated successfully.');
    }

    //general_journal
    function general_journal()
    {
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.journal.general_journal', [
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    function add_general_journal()
    {
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.journal.add_general_journal', [
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    public function general_journal_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $main = AcTransactionMain::create([
                'dateoftransaction' => $request->input('dateoftransaction'),
                'voucherno' => $request->input('voucherno'),
                'particulars' => $request->input('particulars'),
            ]);

            foreach ($request->input('entries') as $entry) {
                // Check if this entry is not empty (example criteria)
                if (
                    !empty($entry['accountscode']) &&
                    (!empty($entry['debit']) || !empty($entry['credit'])) &&
                    ($entry['debit'] != 0 || $entry['credit'] != 0)
                ) {
                    AcTransactionDetail::create([
                        'voucherno' => $main->voucherno,
                        'accountscode' => $entry['accountscode'],
                        'naration' => $entry['naration'] ?? '',
                        'debit' => $entry['debit'] ?? 0,
                        'credit' => $entry['credit'] ?? 0,
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Journal Entry saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
        }
    }

    function adjustment_journal()
    {
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.adjustmentjornul.adjustment_journal', [
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    function unposted_journal()
    {
        return view('admin.unpostedjournal.unposted_journal');
    }

    function others_payment()
    {
        $acoounts_head = AcMainhead::all();
        $ac_chart_of_acc = AcCartofacc::all();
        return view('admin.otherspayment.others_payment', [
            'acoounts_head' => $acoounts_head,
            'ac_chart_of_acc' => $ac_chart_of_acc,
        ]);
    }

    function credit_note()
    {
        return view('admin.CreditNote.credit_note');
    }
}
