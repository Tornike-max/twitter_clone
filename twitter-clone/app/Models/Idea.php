<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'user_id',
        'content',
    ];

    protected $with = ['user:id,name,image,is_admin', 'comment'];

    protected $withCount = ['likes'];

    use HasFactory;

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like');
    }

    public function scopeSearch($query, $search = '')
    {
        return $query->where('content', 'like', '%' . $search . '%');
    }
}
