<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
    ];
}
