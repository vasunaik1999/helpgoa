<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResourceCovidTesting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'resource_covid_testings';
    protected $fillable = ['name', 'contact', 'location', 'type', 'time', 'working_days', 'collection', 'note', 'verified', 'visibility'];
}
