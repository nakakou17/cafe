<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'cafe_id',
        'recommend',
        'price',
        'noisy',
        'time',
        'body',
        'created_at',
        'updated_at',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // 作成日を昇順に並び替える
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    public function cafe()
    {
        // Cafeモデルとの関連付け
        return $this->belongsTo(Cafe::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
