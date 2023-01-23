<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryModel extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];

    public function scopeIsDesc($desc)
    {
        return $desc->orderByDesc('created_at');
    }
}
