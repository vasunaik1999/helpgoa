<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceDoctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_doctors';
    protected $fillable = ['name','consultation_type','availability','contact','location','note','verified','visibility'];
}
