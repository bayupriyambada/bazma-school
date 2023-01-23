<?php

namespace App\Models;

use App\Models\LessonModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherModel extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];

    public function scopeIsDesc($desc)
    {
        return $desc->orderByDesc('created_at');
    }
    public function scopewhereLike($value, $term)
    {
        return $value->where('name', 'like', '%' . $term . '%');
    }

    public function lesson()
    {
        return $this->belongsTo(LessonModel::class, 'lesson_uuid', 'uuid');
    }
}
