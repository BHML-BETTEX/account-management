<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ac_type;
use App\Models\ac_control;
use App\Models\ac_supplier;
use App\Models\AcCategory;
use App\Models\AcMainhead;
use App\Models\AcCartofacc;
use App\Models\AcTransactionDetail;
use App\Models\AcTransactionMain;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AccuntingController extends Controller
{
    //===================Account Type==================
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

    //===================Account Controll==================
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

    //===================Account Mainhead==================
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

    //===================Account Category==================
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

    //===================Chart Of Account==================
    function chart_of_account(Request $request)
    {
        $search = $request->input('search', '');

        if ($search != '') {
            $ac_cartofacc = AcCartofacc::where('accountsheadname', 'LIKE', "%$search%")->paginate(13);
        } else {
            $ac_cartofacc = AcCartofacc::paginate(100);
        }
        $data = DB::table('vw_chartofaccounts')->get();

        // Grouping the results for the hierarchical Blade display
        $grouped = $data->groupBy('typename')->map(function ($controls) {
            return $controls->groupBy('controlname')->map(function ($mainheads) {
                return $mainheads->groupBy('mainheadname');
            });
        });
        $main_head = AcMainhead::all();
        $ac_category = AcCategory::all();
        return view('admin.chartofacc.chart_of_account', [

            'main_head' => $main_head,
            'ac_category' => $ac_category,
            'ac_cartofacc' => $ac_cartofacc,
            'search' => $search,
            'grouped' => $grouped,
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
            ->where('id', $request->id)
            ->update([
                'mainhead_id' => $request->mainhead_id,
                'accountsheadname' => $request->accountsheadname,
                'category' => $request->category,
            ]);

        return back()->with('success', 'Account updated successfully.');
    }

    function chart_of_account_report()
    {
        // Call the stored procedure
        $result = DB::select('CALL vw_chartofaccounts()');

        // Return the view with the result
        return view('admin.chartofacc.chart_of_account_report', [
            dd($result),
            'result' => $result,
        ]);
    }


    //===================General Journal==================
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
                'manualvoucherno' => $request->input('manualvoucherno'),
                'trcode' => $request->input('trcode'),
                'vouchertype' => $request->input('trcode'),
                'particulars' => $request->input('particulars'),
                'created_at' => Carbon::now(),
            ]);
            // Ensure you get the auto-generated voucherno from DB
            $main->refresh();
            $main->selfid = $main->id;
            $main->save();
            foreach ($request->input('entries') as $entry) {
                // Check if this entry is not empty (example criteria)
                if (
                    !empty($entry['accountscode']) &&
                    (!empty($entry['debit']) || !empty($entry['credit'])) &&
                    ($entry['debit'] != 0 || $entry['credit'] != 0)
                ) {
                    AcTransactionDetail::create([
                        'trandetailid' => $main->id, // Assuming this is the correct foreign key
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

    function general_journal_list()
    {
        $maintransition = AcTransactionMain::all();
        $detailtransition = AcTransactionDetail::all();
        return view('admin.journal.general_journal_list', [
            'maintransition' => $maintransition,
            'detailtransition' => $detailtransition,
        ]);
    }


    function journalDetails($id)
    {
        $maintransition = AcTransactionMain::with('details')->findOrFail($id);
        return response()->json($maintransition);
    }

    function show($id)
    {
        $entry = AcTransactionMain::with('details')->findOrFail($id);
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.journal.edit_genaral_journal', [
            'entry' => $entry,
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'dateoftransaction' => 'required|date',
            'manualvoucherno' => 'nullable|string|max:100',
            'particulars' => 'required|string|max:255',
            'entries' => 'required|array|min:1',
            'entries.*.accountscode' => 'required|string',
            'entries.*.naration' => 'nullable|string',
            'entries.*.debit' => 'required|numeric|min:0',
            'entries.*.credit' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Update main journal entry
            $main = AcTransactionMain::findOrFail($id);
            $main->dateoftransaction = $request->dateoftransaction;
            $main->manualvoucherno = $request->manualvoucherno;
            $main->particulars = $request->particulars;
            $main->save();

            // Delete old details
            $main->details()->delete();

            // Insert updated detail entries
            foreach ($request->entries as $entry) {
                $main->details()->create([
                    'accountscode' => $entry['accountscode'],
                    'naration' => $entry['naration'] ?? '',
                    'debit' => $entry['debit'],
                    'credit' => $entry['credit'],
                ]);
            }

            DB::commit();

            return redirect()
                ->route('unposted_journal')
                ->with('success', 'Journal entry updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error updating journal entry: ' . $e->getMessage());
        }
    }

    //===================Adjustment Journal==================
    function adjustment_journal()
    {
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.adjustmentjornul.adjustment_journal', [
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    public function adjustment_journal_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $amount = $request->input('amount');
            $naration = 'Adjustment: ' . $request->input('particulars');

            $main = AcTransactionMain::create([
                'dateoftransaction' => $request->input('dateoftransaction'),
                'trcode' => 3,
                'vouchertype' => 3,
                'particulars' => $request->input('particulars'),
                'created_at' => Carbon::now(),
            ]);

            $main->refresh();
            $main->selfid = $main->id;
            $main->save();

            // Debit Entry
            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => $request->input('entries.0.accountscode'),
                'naration' => $naration,
                'debit' => $amount,
                'credit' => 0,
            ]);

            // Credit Entry
            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => $request->input('entries.1.accountscode'),
                'naration' => $naration,
                'debit' => 0,
                'credit' => $amount,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Adjustment Journal Entry saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
        }
    }


    //===================Unposted Journal==================
    function unposted_journal()
    {
        $data = DB::table('ac_transactionmain')->where('posted', 0)->get();
        return view('admin.unpostedjournal.unposted_journal', [
            'data' => $data,
        ]);
    }

    public function updatePostedStatus(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|integer|exists:ac_transactionmain,id',
                'posted' => 'required|boolean',
            ]);

            $updated = DB::table('ac_transactionmain')->where('id', $request->id)->update([
                'posted' => $request->posted,
            ]);

            if ($updated) {
                return response()->json(['success' => true]);
            } else {
                // Could mean record already had the same posted value
                return response()->json(['success' => false, 'message' => 'No rows updated']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    //===================Others Payment==================
    function others_payment()
    {
        $acoounts_head = AcMainhead::all();
        $ac_cartofacc = AcCartofacc::all();
        return view('admin.otherspayment.others_payment', [
            'acoounts_head' => $acoounts_head,
            'ac_cartofacc' => $ac_cartofacc,
        ]);
    }

    public function others_payment_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $amount = $request->input('amount');
            $cheque = $request->input('cheqno');
            $paymode = $request->input('paymode');
            $memo = $request->input('particulars');

            // Create main transaction record
            $main = AcTransactionMain::create([
                'dateoftransaction' => $request->input('dateoftransaction'),
                'trcode' => 1,
                'vouchertype' => 1,
                'particulars' => $memo,
                'created_at' => Carbon::now(),
            ]);

            $main->refresh();
            $main->selfid = $main->id;
            $main->save();


            $cashAccountName = $request->input('cash_account_name', 'Cash Account');
            $bankAccountName = $request->input('bank_account_name', 'Bank Account');

            if ($paymode === 'Cash') {
                $naration = $memo . ' Paid from: ' . $cashAccountName;
            } elseif ($paymode === 'Cheque') {
                $naration = $memo . ' Paid from: ' . $bankAccountName;
            } else {
                $naration = $memo;
            }

            // Debit Entry
            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => $request->input('entries.0.accountscode'),
                'naration' => $naration,
                'debit' => $amount,
                'credit' => 0,
                'cheqno' => 123,
            ]);


            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => 1000100,
                'naration' => $naration,
                'debit' => 0,
                'credit' => $amount,
                'cheqno' => 123,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Payment entry saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
        }
    }

    // transaation main 1 record
    //transetion detail 2 record

    function credit_note()
    {
        $supplier_info = ac_supplier::all();
        return view('admin.CreditNote.credit_note', [
            'supplier_info' => $supplier_info,
        ]);
    }

    public function credit_note_store(Request $request)
    {
        DB::beginTransaction();

        try {
            $main = AcTransactionMain::create([
                'dateoftransaction' => $request->input('dateoftransaction'),
                'trcode' => 3,
                'vouchertype' => 3,
                'particulars' => $request->input('particulars'),
                'partytype' => 1,
                'partycode' => $request->input('partycode'),
                'created_at' => now(),
            ]);

            $main->refresh();
            $main->selfid = $main->id;
            $main->save();

            $amount = abs(floatval($request->input('amount')));
            $accountscode = $request->input('accountscode');
            $narration = "hi";

            // Debit row
            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => 2020000,
                'naration' => $narration,
                'debit' => $amount,
                'credit' => 0,
            ]);

            // Credit row
            AcTransactionDetail::create([
                'voucherno' => $main->voucherno,
                'accountscode' => 1000100,
                'naration' => $narration,
                'debit' => 0,
                'credit' => $amount,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Credit Note Entry saved successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
        }
    }
}
