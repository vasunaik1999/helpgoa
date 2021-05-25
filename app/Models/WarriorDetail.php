<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarriorDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'volunteer_details';

    protected $casts = [
        'serviceAreas' => 'array',
        'supplyTypes' => 'array',
    ];
    protected $fillable = ['user_id', 'aadhaar_num', 'serviceAreas', 'supplyTypes', 'organization', 'status'];
}
