<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['title', 'slug', 'image', 'price', 'description', 'will_learn', 'requirement', 'skill_level', 'is_active', 'instructor_id'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function user()
    {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    protected function instructor()
    {
        return $this->hasOne(User::class, 'id', 'instructor_id');
    }

    protected function course_chapter(){
        return $this->hasMany(CourseChapter::class)->orderBy('position');
    }
    protected function first_chapter(){
        return $this->hasOne(CourseChapter::class)->first();
    }

    protected function coursePurchases(){
        return $this->hasMany(CoursePurchases::class);
    }

    protected function courseReviews(){
        return $this->hasMany(CourseReview::class);
    }


}
