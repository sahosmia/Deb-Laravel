<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCart extends Model
{
    use HasFactory;

    protected $table = 'course_carts';

    protected $fillable = ['course_id', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function course(){
        return $this->belongsTo(Course::class);
    }

    protected function user(){
        return $this->belongsTo(User::class);
    }
    

}
