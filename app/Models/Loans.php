<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $table = 'main_loans';

    // protected $casts = [
    //     'start_date' => 'array'
    // ];

    use HasFactory;
}
