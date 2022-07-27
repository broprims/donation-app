<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $table = "history_donate";

    protected $fillable = [
        'event_id',
        'donatur',
        'tanggal',
        'jam',
        'jumlah',
    ];
}
