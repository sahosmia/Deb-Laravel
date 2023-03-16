<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCart;
use App\Models\CourseReview;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!auth()->user()) {
            return view('frontend.cart.index')->with('error', 'Please Login First');
        }

        $carts = CourseCart::where('user_id', auth()->id())->get();
        return view('frontend.cart.index', [
            'carts' => $carts,
        ]);
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
