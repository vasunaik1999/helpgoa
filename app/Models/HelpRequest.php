<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class HelpRequest extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = ['user_id', 'name', 'phone', 'address', 'taluka', 'city', 'pincode', 'needed_by', 'approached_by', 'status', 'urgency_status', 'items', 'special_instructions'];
}
