<?php

/*****************
 * get Activation
 */

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;

define('ACTIVE_STATUS', ['1' => 'Active', '0' => 'De-Active']);

function activeStatus()
{
    return ACTIVE_STATUS;
}

function getLessonCount($data)
{
    $a = 0;
    foreach ($data as $item) {
        $a += $item->courseLessons->count();
    }

    return $a;
}

function getAvarageReview($slug)
{
    $data = Course::where('slug', $slug)->first();
    $reviews = $data->courseReviews;
    $sum = array_sum($reviews->pluck('rating')->toArray());
    $avarage = 0;
    if ($reviews->count() != 0) {
        $avarage = $sum / $reviews->count();
    }
    return $avarage;
}

function getSkillLevel($num)
{
    $data = "";
    if($num == 1){
        $data = "Basic";
    }elseif($num == 2){
        $data = "Intermediate";
    }else{
        $data = "Advance";
    }
    
    return $data;
}

function status($number)
{
    if ($number = 0) {
        $data = '<span class="badge badge-primary">Pandding</span>';
    } elseif ($number = 1) {
        $data = '<span class="badge badge-success">Complete</span>';
    } else {
        $data = '<span class="badge badge-danger">Cancle</span>';
    }

    return $data;
}

function getBirthYear($date)
{
    return '' . Carbon::parse($date)->diffInYears() . ' years';
}

function getGender($data)
{
    switch ($data) {
        case 1:
            return 'Male';
        case 2:
            return 'Female';
        default:
            return 'Other';
    }
}

function getBlood($data)
{
    switch ($data) {
        case 1:
            return 'A+';
        case 2:
            return 'B+';
        case 3:
            return 'O+';
        case 4:
            return 'AB+';
        case 5:
            return 'A-';
        case 6:
            return 'B-';
        case 7:
            return 'O-';
        case 8:
            return 'AB-';
        default:
            return 'Other';
    }
}

function getCreatedAT($date)
{
    $data = '';

    if ($date->diffInDays() >= 30) {
        $data = $date->format('d M, Y');
    } elseif ($date->diffInDays() >= 2) {
        $data = $date->diffForHumans();
    } else {
        $data = $date->diffForHumans();
    }

    return $data;
}

function is_active($data)
{
    $status = '';
    if ($data == 1) {
        $status = '<span class="badge badge-primary">Active</span>';
    } else {
        $status = '<span class="badge badge-danger">In Active</span>';
    }
    return $status;
}

// Check Permission for solve url permission
function checkPermission($data)
{
    $role = Role::findById(auth()->user()->role_id);

    if (!$role->hasPermissionTo($data)) {
        return true; // true == no access this permission
    }
}

// Check Permission for solve url permission
function checkPermissionBlade($data)
{
    $role = Role::findById(auth()->user()->role_id);

    if ($role->hasPermissionTo($data)) {
        return true; // true == has permission
    }
}
