<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcTransactionMain extends Model
{
    
     protected $table = 'ac_transactionmain';
    protected $fillable = ['trcode','dateoftransaction', 'voucherno', 'particulars', 'vouchertype'];

    public function details()
    {
        return $this->hasMany(AcTransactionDetail::class, 'voucherno', 'voucherno');
    }
}
