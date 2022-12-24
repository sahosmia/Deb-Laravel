<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'whatsup',
        'facebook_link',
        'linkedin_link',
        'date_of_birth',
        'address',
        'batch_id',
        'status'
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];


    public function batch(){
        return $this->hasOne(Batch::class, 'id', 'batch_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
