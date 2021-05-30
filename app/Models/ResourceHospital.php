<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceHospital extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'resource_hospitals';
    protected $fillable = ['name', 'type', 'bed_type', 'location', 'contact', 'address', 'nodal_officer_name', 'nodal_officer_phone', 'location_url', 'added_by', 'note', 'verified', 'visibility'];
}
