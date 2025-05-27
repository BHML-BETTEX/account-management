<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcMainhead extends Model
{
    use HasFactory;
    protected $table = 'ac_mainhead';
    protected $primaryKey = 'mainhead_id'; // ✅ Specify custom primary key
    public $timestamps = false; // If you don't have created_at/updated_at

    function rel_to_ac_control()
    {
        return $this->belongsTo(ac_control::class, 'controlcode');
    }
}
