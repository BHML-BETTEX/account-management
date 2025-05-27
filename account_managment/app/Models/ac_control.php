<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_control extends Model
{
    protected $table = 'ac_control';

    use HasFactory;
    protected $fillable  = ['controlname'];
    public $timestamps = false;

    function rel_to_ac_type()
    {
        return $this->belongsTo(ac_type::class, 'typecode');
    }
}
