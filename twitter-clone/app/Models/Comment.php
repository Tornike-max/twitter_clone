<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'idea_id', 'content', 'user_id',
    ];

    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
