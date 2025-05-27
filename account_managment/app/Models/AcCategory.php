<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcCategory extends Model
{
    use HasFactory;
    protected $table = 'ac_account_category';
    protected $fillable  = ['short_name', 'long_name'];

}
