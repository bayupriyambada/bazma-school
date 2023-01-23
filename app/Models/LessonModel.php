<?php

namespace App\Models;

use App\Models\TeacherModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessonModel extends Model
{
    use HasFactory;
    protected $table = 'lessons';
    public $incrementing = false;
    protected $primaryKey = 'uuid';
    public $keyType = 'string';
    protected $guarded = [];

    public function scopeIsDesc($desc)
    {
        return $desc->orderByDesc('created_at');
    }

    public function teacher()
    {
        return $this->hasMany(TeacherModel::class, 'uuid', 'lesson_uuid');
    }
}
