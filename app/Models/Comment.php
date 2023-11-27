<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_content',
        'user_id',
        'topic_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
