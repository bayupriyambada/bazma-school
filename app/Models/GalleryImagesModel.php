<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImagesModel extends Model
{
    use HasFactory;
   
    protected $table = 'gallery_images';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];

    public function scopeIsDesc($desc)
    {
        return $desc->orderByDesc('created_at');
    }
}
