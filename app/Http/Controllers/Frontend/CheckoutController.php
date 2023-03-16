<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseCart;
use App\Models\CoursePurchases;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $carts = CourseCart::where('user_id', auth()->id())->get();

        foreach($carts as $cart){
            CoursePurchases::create([
                'user_id' => $cart->user_id,
                'course_id' => $cart->course_id,
            ]);
            CourseCart::findOrFail($cart->id)->delete();
        }
        return $carts;
    }

    public function store($course_id)
    {
        $exitsData = CourseCart::where('user_id', auth()->id())->where('course_id', 'LIKE', $course_id, )->count();

        if ($exitsData < 1) {
            CourseCart::create([
                'course_id' => $course_id,
                'user_id' => auth()->id(),
            ]);
        }
        return redirect()->route('front.cart.index');
    }

    public function delete($id)
    {
        $data = CourseCart::find($id);
        $data->delete();

        return back();
    }
}
