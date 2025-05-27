<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingControl extends Model
{
    protected $table = 'ac_postingcontrol';
    use HasFactory;

    function rel_to_AcCartofacc()
    {
        return $this->belongsTo(AcCartofacc::class, 'saleshead');
    }
}
