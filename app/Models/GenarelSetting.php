<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenarelSetting extends Model
{
    use HasFactory;

    protected $table = "genarel_settings";

    protected $fillable = [
        "logo",
        "phone",
        "whatsapp",
        "email",
        "facebook",
        "facebook_group",
        "linkedin",
        "youtube",
        "messanger_code",
        "banner_title",
        "banner_description",
        "banner_btn_text",
        "banner_btn_link",
        "banner_background_image",
        "banner_is_active",
        "about_heading_title",
        "about_heading_description",
        "about_first_passage_title",
        "about_first_passage_description",
        "about_second_passage_title",
        "about_second_passage_description",
        "about_home_image",
        "about_is_active",
        "notice_heading_title",
        "notice_heading_description",
        "notice_is_active",
        "team_heading_title",
        "team_heading_description",
        "team_is_active",
        "testimonial_heading_title",
        "testimonial_heading_description",
        "testimonial_is_active",
        "blog_heading_title",
        "blog_heading_description",
        "blog_is_active",
        "why_choose_heading_title",
        "why_choose_heading_description",
        "why_choose_home_image",
        "why_choose_is_active",
        "question_heading_title",
        "question_heading_description",
        "question_home_image",
        "question_is_active",
        "modal_image",
        "modal_first_btn_text",
        "modal_first_btn_link",
        "modal_second_btn_text",
        "modal_second_btn_link",
    ];

    protected $hidden = [
        "created_at","updated_at"
    ];

}
