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
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'taluka', 'items', 'city', 'pincode', 'needed_by', 'approached_by', 'status', 'special_instructions'];
}
