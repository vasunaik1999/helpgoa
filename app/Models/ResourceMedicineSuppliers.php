<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceMedicineSuppliers extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_oxygen_suppliers';
    protected $fillable = ['provider','contact','supplier_location','delivery_status','note','verified','visibility'];
}
