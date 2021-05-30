<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceCaretakingServices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_caretaking_services';
    protected $fillable = ['service_provider','contact','service_genders','serviced_areas','note','verified','visibility'];
}
