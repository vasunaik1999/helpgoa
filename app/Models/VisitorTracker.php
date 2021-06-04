<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorTracker extends Model
{
    use HasFactory;

    protected $table = 'visitor_trackers';
    protected $fillable = ['visitors', 'unique_visitors'];
}