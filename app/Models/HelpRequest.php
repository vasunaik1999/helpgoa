<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = ['user_id', 'name', 'phone', 'address', 'pincode', 'needed_by', 'approaches', 'status', 'urgency_status', 'items'];
}
