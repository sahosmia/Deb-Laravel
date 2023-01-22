<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenarelSetting extends Model
{
    use HasFactory;

    protected $table = "genarel_settings";

    protected $fillable = [
        "logo", "phone", "whatsapp", "email", "facebook", "facebook_group", "linkedin", "youtube"
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

}
