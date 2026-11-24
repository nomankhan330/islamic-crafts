<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('items.product')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('order_number', 'like', "%{$s}%")
                  ->orWhere('customer_name', 'like', "%{$s}%")
                  ->orWhere('customer_phone', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%");
            });
        }

        $orders = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'confirmed' => Order::where('status', 'confirmed')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');

        return view('admin.orders.index', compact('orders', 'counts', 'totalRevenue'));
    }

    public function export()
    {
        $orders = Order::with('items')->latest()->get();
        $filename = 'islamic-crafts-orders-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Order #', 'Customer', 'Phone', 'City', 'Items', 'Total (Rs)', 'Status', 'Placed On']);
            foreach ($orders as $order) {
                fputcsv($handle, [
                    $order->order_number,
                    $order->customer_name,
                    $order->customer_phone,
                    $order->city,
                    $order->items->sum('quantity'),
                    $order->total_amount,
                    ucfirst($order->status),
                    $order->created_at ? $order->created_at->format('Y-m-d H:i') : '',
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function show(Order $order)
    {
        $order->load(['items.product.images']);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', "Order #{$order->order_number} status updated to " . ucfirst($request->status) . '.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order removed successfully.');
    }
}
