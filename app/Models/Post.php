<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts'; // Model tự tạo để liên kết với bản trong database
    protected $fillable = ['title', 'content', 'user_id', 'thumbnail'];

    function FeaturedImages()
    {
        return $this->hasOne('App\Models\FeaturedImages');
    }

    function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
