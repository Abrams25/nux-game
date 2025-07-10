<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LuckyAttempt extends Model
{
    protected $fillable = [
        'user_link_id',
        'random_number',
        'result',
        'win_amount'
    ];
}
