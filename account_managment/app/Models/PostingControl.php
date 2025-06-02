<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingControl extends Model
{
    protected $table = 'ac_postingcontrol';
    protected $fillable = ['saleshead','salesdiscounthead','salesreturnhead', 'salescommissionhead','salescommission_expense','rmpurchasehead', 'rmpurchasereturnhead', 'rmpurchasediscounthead', 'rminventoryhead','fgpurchasehead', 'fgpurchasereturnhead', 'fgpurchasediscounthead', 'fginventoryhead', 'accountsreceivablehead', 'accountspayablehead', 'cashaccounthead', 'bankaccounthead', 'workinprocessinventoryhead', 'servicemainhead', 'defaultbranch', 'cost_of_sales', 'advance_to_vendor', 'advance_from_customer', 'pp_claim_debit_head', 'pp_claim_credit_head', 'credit_note_debit_head', 'credit_note_credit_head'];

    use HasFactory;

    function rel_to_AcCartofacc()
    {
        return $this->belongsTo(AcCartofacc::class, 'saleshead');
    }
}
