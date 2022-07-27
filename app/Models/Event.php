<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "all_event";

    protected $fillable = [
        'event',
        'tahun',
        'donate_target',
        'donate_total',
        'ket',
        'status',
        'tgl_event',
    ];
}
