<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Post extends Model
{
    use HasFactory;
    use Sortable;
    
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
    
    public $sortable = [
        'recommend',
        'noisy',
        'time',
        'updated_at',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
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
