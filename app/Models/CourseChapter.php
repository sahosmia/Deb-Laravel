<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseChapter extends Model
{
    use HasFactory;

    protected $table = 'course_chapters';

    protected $fillable = ['title', 'course_id', 'position'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function courses(){
        return $this->belongsTo(Course::class);
    }

    protected function courseLessons(){
        return $this->hasMany(CourseLesson::class);
    }

}
