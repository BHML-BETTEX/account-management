<?php

namespace App\Http\Controllers;

use App\Models\AcCartofacc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ReportsController extends Controller
{
    function generalladger()
    {
        $chart_of_acc = AcCartofacc::all();
        $objects = DB::select("select * from vw_ledgerfinal");

        $entries = array_map(function ($item) {
            return (array) $item;
        }, $objects);

        $entries1 = collect([
        ['date' => '01-01-2023', 'voucher_no' => '3202300001', 'description' => 'Opening Cash', 'debit' => 13298, 'credit' => 0],
        ['date' => '01-01-2023', 'voucher_no' => '3202300001', 'description' => 'Loan From BHML', 'debit' => 200000, 'credit' => 0],
        ['date' => '02-01-2023', 'voucher_no' => '1202300001', 'description' => 'Daily Bazar Expense', 'debit' => 0, 'credit' => 5390],
        ['date' => '02-01-2023', 'voucher_no' => '1202300002', 'description' => 'Courier Bill', 'debit' => 0, 'credit' => 5500],
        ['date' => '02-01-2023', 'voucher_no' => '1202300003', 'description' => 'Material Purchase', 'debit' => 0, 'credit' => 55300],
        ['date' => '02-01-2023', 'voucher_no' => '1202300004', 'description' => 'Sample Purchase', 'debit' => 0, 'credit' => 65],
        // ... Add all records as needed
    ]);

    $accountId='1000000';
    $startDate='2025-07-01';
    $endDate='2025-07-31';

        $accountId = '1000000';
        $startDate = '2025-07-01';
        $endDate = '2025-07-31';

        $employee_salarys = [];

        $rawData = DB::select('CALL sp_ac_ledger_tformat(?, ?, ?)', [
            $accountId,
            $startDate,
            $endDate,
        ]);

        $data = collect($rawData);

        return view('admin.reports.generalladger', [
            //dd($chart_of_acc),
            'chart_of_acc' => $chart_of_acc,'entries' => $entries,'data' => $data,'employee_salarys' => $employee_salarys,
            'startDate' => $startDate,'endDate' => $endDate,'ip_month' => 7,'ip_year' => 2025,'accountId' => $accountId

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

    function trialbalance(Request $request)
    {
        $date = $request->input('report_date');

        if (!$date) {
            $date = DB::table('ac_transactionmain')->orderByDesc('created_at')->value('created_at');
        }

        $formattedDate = \Carbon\Carbon::parse($date)->toDateString();

        $results = DB::select("CALL sp_print_trialbalance(?)", [$formattedDate]);

        $grouped = collect($results)->groupBy('op_mainheadcode');

        return view('admin.reports.trialbalance', [
            'grouped' => $grouped,
            'report_date' => $formattedDate,
        ]);
    }

    public function profit_loss(Request $request)
    {
        $date = '2025-07-24';

        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("CALL sp_incomestatement(?)");
        $stmt->execute([$date]);

        $trialBalance = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $stmt->nextRowset();
        $incomeStatement = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $results = $incomeStatement;

        $grouped = collect($results)->groupBy('op_ctrlcode');
        $netLoss = collect($results)->sum('op_bal');

        return view('admin.reports.profit_loss', [
            'grouped' => $grouped,
            'report_date' => $date,
            'net_loss' => $netLoss,
        ]);
    }

    function balance_sheet()
    {
        $date = '2025-07-24';

        $pdo = DB::getPdo();

        $stmt = $pdo->prepare("CALL sp_balancesheet(?)");
        $stmt->execute([$date]);

        $pdo = \Illuminate\Support\Facades\DB::getPdo();

        $stmt->nextRowset();
        $trialBalance1 = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $stmt->nextRowset();
        $incomeStatement = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $stmt->nextRowset();
        $balanceSheet = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $results = $balanceSheet;

        $grouped = collect($results)->groupBy('typename');

        $totals = $grouped->map(function ($items) {
            return [
                'opening' => $items->sum('opening_bal'),
                'bal'     => $items->sum('bal'),
                'closing' => $items->sum('closing_bal'),
            ];
        });

        return view('admin.Reports.balance_sheet', [
            'grouped' => $grouped,
            'totals' => $totals,
            'report_date' => $date,
        ]);
    }

    public function downloadPdf()
    {
        $data = ['title' => 'Balance Sheet'];
        $pdf = Pdf::loadView('admin.Reports.balance_sheet', $data);
        return $pdf->download('balance_sheet.pdf');
    }

    public function voucher_list(Request $request)
    {
        $from = $request->input('from_date');
        $to = $request->input('to_date');

        $data = DB::select("CALL sp_voucher_list()");

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
