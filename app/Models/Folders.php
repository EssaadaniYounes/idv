<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
    protected $table = "files";
    use HasFactory;
    protected $fillable = [
        'private_id',
        'date_open_file',
        'client_id',
        'client_ref',
        'opponent_name',
        'issue_type_id',
        'assurance_number',
        'pv_number',
        'accident_date',
        'insured_name',
        'expert_name',
        'court_id',
        'court_ref',
        'session_date',
        'room_number',
        'close_date',
        'status',
        'notes',
        'sub_files',
        'experiences'
    ];
}
