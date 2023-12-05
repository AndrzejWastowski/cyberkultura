<?php
// app/Models/Statistic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = ['date', 'visit', 'reload'];
}
