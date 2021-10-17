<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function audio(Request $request, $id)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);
        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->song_type = $request->song_type;
        $review->user_id = session('user_id');
        $review->song_id = $id;
        $review->published_date = date('F d, Y');
        $review->save();
        return back();
    }
    public function video(Request $request, $id)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required'
        ]);
        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->song_type = $request->song_type;
        $review->user_id = session('user_id');
        $review->song_id = $id;
        $review->published_date = date('F d, Y');
        $review->save();
        return back();
    }
}
