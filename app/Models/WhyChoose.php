<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChoose extends Model
{
    use HasFactory;

    protected $table = "why_chooses";

    protected $fillable = [
        "title", "designation", "icon", "added_by", "is_active",
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    protected function user(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }


}
