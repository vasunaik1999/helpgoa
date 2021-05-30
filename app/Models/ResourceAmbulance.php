<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceAmbulance extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_ambulances';
    protected $fillable = ['provider', 'ambulance_type', 'service_location', 'added_by', 'contact', 'note', 'verified', 'visibility'];
}
