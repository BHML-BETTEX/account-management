<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcCartofacc extends Model
{
    use HasFactory;
    protected $table = 'ac_chartofacc';
    protected $fillable = ['mainhead_id', 'accountsheadname', 'category'];
    public $timestamps = false; // If you don't have created_at/updated_at


    
    function rel_to_AcCategory()
    {
        return $this->belongsTo(AcCategory::class, 'category');
    }

    function rel_to_AcMainhead()
    {
        return $this->belongsTo(AcMainhead::class, 'mainhead_id');
    }
    
}
