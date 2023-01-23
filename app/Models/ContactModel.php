<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = 'contact';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];
}
