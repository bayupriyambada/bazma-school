<?php

namespace App\Models;

use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerModel extends Model
{
    use HasFactory;
    protected $table = 'careers';
    protected $guarded = [];
    public function scopeIsDesc($desc)
    {
        return $desc->orderByDesc('created_at');
    }
    public function scopewhereLike($value, $term)
    {
        return $value->where('name', 'like', '%' . $term . '%')
            ->orWhere('slug', 'like', '%' . $term . '%');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
