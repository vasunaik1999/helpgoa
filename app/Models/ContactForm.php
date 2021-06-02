<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contact_forms';
    protected $fillable = ['name', 'phone', 'message', 'category', 'submitted_by', 'status'];
}
