<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcTransactionDetail extends Model
{
    protected $table = 'ac_transactiondetail';
    protected $fillable = ['voucherno', 'accountscode', 'naration', 'debit', 'credit'];

    public function main()
    {
        return $this->belongsTo(AcTransactionMain::class, 'voucherno', 'voucherno');
    }
}
