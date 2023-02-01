<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSchoolModel extends Model
{
    use HasFactory;
    protected $table = 'about_school';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];
}
