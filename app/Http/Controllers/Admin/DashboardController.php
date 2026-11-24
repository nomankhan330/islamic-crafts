<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_revenue' => Order::where('status', '!=', 'cancelled')->sum('total_amount'),
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_products' => Product::count(),
            'pending_inquiries' => CustomOrderRequest::where('status', 'new')->count(),
            'total_subscribers' => Subscriber::count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
        ];

        $recentOrders = Order::latest()->take(6)->get();
        $recentCustomOrders = CustomOrderRequest::latest()->take(5)->get();
        $featuredProducts = Product::with(['images', 'category'])->where('is_featured', true)->take(4)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentCustomOrders', 'featuredProducts'));
    }
}
