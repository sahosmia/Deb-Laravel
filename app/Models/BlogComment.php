<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = "blog_comments";

    protected $fillable = [
        "body", "user_id", "blog_id", "parent_id",
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    protected function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }


}
