<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceAmbulances extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_ambulances';
    protected $fillable = ['provider','ambulance_type','service_location','contact','note','verified','visibility'];
}
