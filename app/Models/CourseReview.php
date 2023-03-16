<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use HasFactory;

    protected $table = 'course_reviews';

    protected $fillable = ['comment', 'rating','course_id', 'user_id'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function course(){
        return $this->belongsTo(Course::class);
    }

    protected function user(){
        return $this->belongsTo(User::class);
    }
  

}

