<?php

namespace App\Http\Controllers;

use App\DriverRating;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return view('admin.viewReviews');
        } else {
            return view('login');
        }
    }
    public function getAllReviews(){
        return Review::orderBy('updated_at','desc')->get();
    }
    public function rateDriver($request){
        $review=new Review();
        $review->driver_id=$request->driver_id;
        $review->user_id=$request->user_id;
        $review->rating=$request->rating;
        $review->review_desc=$request->review_desc;
        $review->save();
        return array('success' => true);
    }
    public function getDriverRatings($driver_id){
        return DB::select('select rating,count(*) as count from reviews where driver_id= :id group by rating',['id'=>$driver_id]);
//        return DB::select('select rating,count(*) from reviews where driver_id=2 group by rating');

    }
}
