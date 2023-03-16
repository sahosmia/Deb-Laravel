<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = "user_informations";

    protected $fillable = [
        'user_id',
        'gender',
        'blood',
        'profession',
        'phone',
        'whatsapp',
        'facebook',
        'linkedin',
        'date_of_birth',
        'address',
        'drive',
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];



    public function user(){
        return $this->belongsTo(User::class,);
    }
}
