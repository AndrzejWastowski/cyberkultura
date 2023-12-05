<?php
// app/Models/StatisticPage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatisticPage extends Model
{

    protected $table = 'statistics_pages';
    protected $fillable = ['date', 'link', 'counter'];
}
