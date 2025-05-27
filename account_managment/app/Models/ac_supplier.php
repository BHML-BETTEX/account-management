<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ac_supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email_address','contact_no'];

}
