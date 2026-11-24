<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('product')->latest()->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleApprove(Review $review)
    {
        $review->update(['is_approved' => !$review->is_approved]);
        $status = $review->is_approved ? 'approved' : 'hidden';
        return back()->with('success', "Review is now {$status}.");
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully.');
    }
}
