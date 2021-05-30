<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceIsolationCenter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_isolation_centers';
    protected $fillable = ['name', 'contact', 'location', 'address', 'type', 'isPaid', 'added_by', 'note', 'verified', 'visibility'];
}
