<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomOrderRequest;
use App\Models\LookbookItem;
use App\Models\Occasion;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');
        $totalOrders = Order::count();

        $stats = [
            'total_revenue' => $totalRevenue,
            'avg_order_value' => $totalOrders > 0 ? round($totalRevenue / $totalOrders) : 0,
            'total_orders' => $totalOrders,
            'pending_orders' => Order::where('status', 'pending')->count(),
            'total_products' => Product::count(),
            'featured_products' => Product::where('is_featured', true)->count(),
            'total_categories' => Category::count(),
            'pending_inquiries' => CustomOrderRequest::whereIn('status', ['new', 'pending'])->count(),
            'total_inquiries' => CustomOrderRequest::count(),
            'total_subscribers' => Subscriber::count(),
            'total_reviews' => Review::count(),
            'pending_reviews' => Review::where('is_approved', false)->count(),
            'total_occasions' => Occasion::count(),
            'total_lookbook' => LookbookItem::count(),
        ];

        $orderStatusCounts = [
            'pending' => Order::where('status', 'pending')->count(),
            'confirmed' => Order::where('status', 'confirmed')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        $recentOrders = Order::latest()->take(6)->get();
        $recentCustomOrders = CustomOrderRequest::latest()->take(4)->get();
        $featuredProducts = Product::with(['images', 'category'])->where('is_featured', true)->take(4)->get();

        return view('admin.dashboard', compact('stats', 'orderStatusCounts', 'recentOrders', 'recentCustomOrders', 'featuredProducts'));
    }
}
