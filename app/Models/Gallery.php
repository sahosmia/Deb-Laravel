<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = "galleries";

    protected $fillable = [
        "image", "title", "added_by", "is_active",
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    protected function user(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }


}
