<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceOxygenSuppliers extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_oxygen_suppliers';
    protected $fillable = ['provider', 'contact', 'supply_type', 'service_location', 'delivery_status', 'supplier_address', 'note', 'verified', 'visibility'];
}
