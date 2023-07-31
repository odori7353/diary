<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    
    public function getByLimit(int $limit_count = 3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return view('posts.index')->with(['posts' => $post->getByLimit()]);
    }
        
    public function getPaginateByLimit(int $limit_count = 3)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    
        protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
