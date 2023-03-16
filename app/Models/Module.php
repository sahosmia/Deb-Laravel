<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Module extends Model
{


    protected $table = "modules";

    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];


    public function permissions(){
        return $this->hasMany(Permission::class);
    }


}
