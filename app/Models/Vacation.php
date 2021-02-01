<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Usr_date_out'  ,
        'Usr_date_in',
        'body',
        'Usr_time_out',
        'Usr_time_in',
        'status',
        'description',
        'encourage'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
