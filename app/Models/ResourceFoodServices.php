<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceFoodServices extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_food_services';
    protected $fillable = ['provider','contact','food_type','meal_type','service_area','delivery_to','note', 'verified', 'visibility'];
}
