<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;

    protected $table = 'course_lessons';

    protected $fillable = ['title', 'course_chapter_id', 'file_type', 'file_name', 'position'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function courseChapter(){
        return $this->belongsTo(CourseChapter::class)->orderBy('position');
    }

}
