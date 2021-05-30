<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceMedicineSupplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_medicine_suppliers';
    protected $fillable = ['provider', 'contact', 'supplier_location', 'added_by', 'delivery_status', 'note', 'verified', 'visibility'];
}
