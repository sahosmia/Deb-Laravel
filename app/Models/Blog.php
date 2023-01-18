<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        "title", "slug", "short_description", "description", "added_by", "is_active", "image"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    protected function user(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class)->whereNull('parent_id');
    }

    public function comments_count()
    {
        return $this->hasMany(BlogComment::class);
    }


}
