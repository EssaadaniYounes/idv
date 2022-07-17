<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable=[
        'folder_id',
        'fee_agreed_1',
        'fee_add_1',
        'fee_result_1',
        'fee_agreed_2',
        'fee_add_2',
        'fee_result_2',
        'fee_agreed_3',
        'fee_add_3',
        'fee_result_3',
        'advance_fee',
        'rest_fee',
        'fee',
        'record_id',
        'record',
        'experience',
        'transport',
        'help',
        'execution',
        'outlay',
        'translate',
        'extra_outlay',
        'other',
        'sum',
        'preemption',
        'rest_',
        'payment_date',
        'expenses',
        'notes',
        'fee_experiences'
    ];
}
