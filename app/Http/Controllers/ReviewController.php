<?php

namespace App\Http\Controllers;

use App\FinishedOrder;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function getReviews()
    {
        $reviews = DB::select('select * from users join (select "taxiDriverId",sum(rating) as rating from finished_orders group By("taxiDriverId")) ratings on (users.id = ratings."taxiDriverId");');
        return view('admin.reviews', ['reviews' => $reviews]);
    }
}
