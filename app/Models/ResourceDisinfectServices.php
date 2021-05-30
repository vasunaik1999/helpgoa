<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceDisinfectServices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_disinfect_services';
    protected $fillable = ['provider', 'contact', 'service_location', 'note', 'verified', 'visibility'];
}
