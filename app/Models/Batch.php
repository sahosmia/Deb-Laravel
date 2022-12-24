<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = "batches";

    protected $fillable = [
        "title", "status"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

    

}
