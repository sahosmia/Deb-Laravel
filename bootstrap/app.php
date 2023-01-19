<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

use Carbon\Carbon;
use Spatie\Permission\Models\Role;

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;

function status($number){
    if($number = 0){
        $data = '<span class="badge badge-primary">Pandding</span>';
    }elseif($number = 1){
        $data = '<span class="badge badge-success">Complete</span>';
    }else{
        $data = '<span class="badge badge-danger">Cancle</span>';
    }

    return $data;
}



function getBirthYear($date){
    return "".Carbon::parse($date)->diffInYears(). " years";
}

function getGender($data){
    switch ($data) {
        case 1:
            return "Male";
        case 2:
            return "Female";
        default:
            return "Other";
    }
}

function getBlood($data){
    switch ($data) {
        case 1:
            return "A+";
        case 2:
            return "B+";
        case 3:
            return "O+";
        case 4:
            return "AB+";
        case 5:
            return "A-";
        case 6:
            return "B-";
        case 7:
            return "O-";
        case 8:
            return "AB-";
        default:
            return "Other";
    }
}


function getCreatedAT($date){
    $data = "";

    if ($date->diffInDays() >= 30){
        $data = $date->format('d M, Y');
    }
    elseif ($date->diffInDays() >= 2){
        $data = $date->diffForHumans();
    }
    else{
        $data = $date->diffForHumans();
    }

    return $data;
}

function is_active($data){
    $status = "";
    if($data == 1){
        $status = '<span class="badge badge-primary">Active</span>';
    }
    else{
        $status = '<span class="badge badge-danger">In Active</span>';
    }
    return $status;
}


// Check Permission for solve url permission
function checkPermission($data){
    $role = Role::findById(auth()->user()->role_id);

    if(!$role->hasPermissionTo($data)){
        return true; // true == no access this permission
    }
}

// Check Permission for solve url permission
function checkPermissionBlade($data){
    $role = Role::findById(auth()->user()->role_id);

    if($role->hasPermissionTo($data)){
        return true; // true == has permission
    }
}

