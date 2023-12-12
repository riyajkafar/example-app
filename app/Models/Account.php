<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account_holder_name',
        'account_number',
        'address',
        'nic_number',
        // Add '_token' to the fillable attributes
        '_token',
    ];
}
