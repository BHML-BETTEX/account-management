<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_type extends Model
{
    use HasFactory;

    // 👇 Add this line to override default table name
    protected $table = 'ac_type';

    protected $fillable = ['typecode', 'typename'];
}