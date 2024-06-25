<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'opening_hours',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // addressで昇順に並べたあと、limitで件数制限をかける
        //return $this->orderBy('address', 'ASC')->paginate($limit_count);
       
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    

}