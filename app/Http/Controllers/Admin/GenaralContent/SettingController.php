<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Blog\BlogUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\AboutSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\BannerSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\BlogSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\ContactSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\LogoSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\NoticeSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\QuestionSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\TeamSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\TestimonialSettingUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\WhyChooseSettingUpdateRequest;
use App\Models\Blog;
use App\Models\GenarelSetting;
use Illuminate\Support\Facades\Session;
use Image;

class SettingController extends Controller
{

    public function index()
    {
        if (checkPermission('display-setting') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.settings.index');
    }



    public function contactUpdate(ContactSettingUpdateRequest $request)
    {
         if (checkPermission('contact-setting') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("phone", "whatsapp", "facebook", "facebook_group", "linkedin", "youtube", "messanger_code");
        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function logoUpdate(LogoSettingUpdateRequest $request){

         if (checkPermission('logo-setting') == true) {
            return redirect()->route('noAccess');
        }
        if($request->hasFile("logo")){
            $currentImage = GenarelSetting::find(1)->logo;
            unlink(public_path('upload/setting/logo/'.$currentImage));

            $image = Image::make($request->file('logo'));
            $imageName = 'logo.'.$request->file('logo')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/logo/');
            $image->save($destinationPath.$imageName);
        }

        try{
            GenarelSetting::find(1)->update([
                "logo" => $imageName,
            ]);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function bannerUpdate(BannerSettingUpdateRequest $request){

         if (checkPermission('banner-setting') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("banner_title", "banner_description", "banner_btn_text", "banner_btn_link", "banner_is_active",);

        if($request->hasFile("banner_background_image")){
            $currentImage = GenarelSetting::find(1)->banner_background_image;

            if ($currentImage != null && file_exists(public_path() . '/upload/setting/banner/' . $currentImage)) {
                unlink(public_path('upload/setting/banner/' . $currentImage));
            }

            $image = Image::make($request->file('banner_background_image'));
            $imageName = 'banner_background_image.'.$request->file('banner_background_image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/banner/');
            $image->resize(1300,700);
            $image->save($destinationPath.$imageName);
            $inputs['banner_background_image'] = $imageName;
        }

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function aboutUpdate(AboutSettingUpdateRequest $request){

         if (checkPermission('about-setting') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("about_heading_title", "about_heading_description", "about_first_passage_title", "about_first_passage_description", "about_second_passage_title", "about_second_passage_description", "about_is_active",);

        if($request->hasFile("about_home_image")){
            $currentImage = GenarelSetting::find(1)->about_home_image;
            unlink(public_path('upload/setting/image/'.$currentImage));

            $image = Image::make($request->file('about_home_image'));
            $imageName = 'about_home_image.'.$request->file('about_home_image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/image/');
            $image->save($destinationPath.$imageName);
            $inputs['about_home_image'] = $imageName;
        }

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function noticeUpdate(NoticeSettingUpdateRequest $request){
         if (checkPermission('notice-setting') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("notice_heading_title", "notice_heading_description", "notice_is_active", );

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function testimonialUpdate(TestimonialSettingUpdateRequest $request){

         if (checkPermission('testimonial-setting') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("testimonial_heading_title", "testimonial_heading_description", "testimonial_is_active",);

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function teamUpdate(TeamSettingUpdateRequest $request){

         if (checkPermission('team-setting') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("team_heading_title", "team_heading_description", "team_is_active", );

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }

    public function blogUpdate(BlogSettingUpdateRequest $request){

         if (checkPermission('blog-setting') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("blog_heading_title", "blog_heading_description", "blog_is_active", );

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function questionUpdate(QuestionSettingUpdateRequest $request){

         if (checkPermission('question-setting') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("question_heading_title", "question_heading_description", "question_is_active", );

        if($request->hasFile("question_home_image")){
            $currentImage = GenarelSetting::find(1)->question_home_image;
            // unlink(public_path('upload/setting/image/'.$currentImage));

            $image = Image::make($request->file('question_home_image'));
            $imageName = 'question_home_image.'.$request->file('question_home_image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/image/');
            $image->resize(400, 400);
            $image->save($destinationPath.$imageName);
            $inputs['question_home_image'] = $imageName;
        }

        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function why_chooseUpdate(WhyChooseSettingUpdateRequest $request){

         if (checkPermission('why-choose-setting') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("why_choose_heading_title", "why_choose_heading_description", "why_choose_is_active", );

        if($request->hasFile("why_choose_home_image")){
            $currentImage = GenarelSetting::find(1)->question_home_image;
            // unlink(public_path('upload/setting/image/'.$currentImage));

            $image = Image::make($request->file('why_choose_home_image'));
            $imageName = 'why_choose_home_image.'.$request->file('why_choose_home_image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/image/');
            $image->resize(400, 400);
            $image->save($destinationPath.$imageName);
            $inputs['why_choose_home_image'] = $imageName;
        }


        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function modalUpdate(LogoSettingUpdateRequest $request){

         if (checkPermission('modal-setting') == true) {
            return redirect()->route('noAccess');
        }
        if($request->hasFile("logo")){
            $currentImage = GenarelSetting::find(1)->logo;
            unlink(public_path('upload/setting/logo/'.$currentImage));

            $image = Image::make($request->file('logo'));
            $imageName = 'logo.'.$request->file('logo')->getClientOriginalExtension();
            $destinationPath = public_path('upload/setting/logo/');
            $image->save($destinationPath.$imageName);
        }

        try{
            GenarelSetting::find(1)->update([
                "logo" => $imageName,
            ]);
            Session::flash('success',"Record Update successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


}
