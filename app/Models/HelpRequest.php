<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpRequest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'requests';

    protected $casts = [
        'items' => 'array',
        'approached_by' => 'array',
    ];
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'taluka', 'city', 'pincode', 'needed_by', 'approached_by', 'status', 'urgency_status', 'items', 'special_instructions'];
    protected $dates = ['deleted_at'];
}
