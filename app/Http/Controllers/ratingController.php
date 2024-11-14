<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ratingModel;
use App\Models\Product;
use App\Models\User;

class ratingController extends Controller
{
    //
    public function store(Request $request,$id)
    {
        // Validate the request
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string'
        ]);

        try {
            $rating = new ratingModel();
            $rating->id_product = $id;
            $rating->id_user = auth()->id();
            $rating->rating = $request->rating;
            $rating->review = $request->review;
            $rating->save();

            return redirect()->back()->with('success_rating', 'Đánh giá đã được gửi thành công');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error_rating', 'Có lỗi xảy ra khi gửi đánh giá: ' . $e->getMessage());
        }
    }
    public function getRating($id){
        $product = Product::find($id);
        $ratings = ratingModel::with('user')
            ->where('id_product', $id)
            ->get();  
        return view('client.detail', compact('product', 'ratings')); 
    }
    public function deleteRating($id)
    {
        $rating = ratingModel::find($id);
        $rating->delete();
        return redirect()->back()->with('success', 'Đã xóa đánh giá thành công');
    }

    public function titleRating($id)
    {
        $product = Product::findOrFail($id);
        $ratings = ratingModel::where('id_product', $id)->get();
        
        // Calculate average rating
        $averageRating = $ratings->isEmpty() ? 0 : $ratings->avg('rating');
        
        // Get total number of ratings 
        $totalRatings = $ratings->count();
        
        // Get count of ratings for each star level (1-5)
        // còn lỗi quay về ch đúng
        $ratingCounts = $ratings->isEmpty() ? [] : $ratings->groupBy('rating')
            ->map->count()
            ->toArray();

        return view('client.detail', compact('product', 'ratings', 'averageRating', 'totalRatings', 'ratingCounts'));
       
    }
}
