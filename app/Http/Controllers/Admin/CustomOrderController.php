<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomOrderRequest;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = CustomOrderRequest::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $requests = $query->paginate(15)->withQueryString();

        return view('admin.custom-orders.index', compact('requests'));
    }

    public function show(CustomOrderRequest $customOrder)
    {
        return view('admin.custom-orders.show', compact('customOrder'));
    }

    public function updateStatus(Request $request, CustomOrderRequest $customOrder)
    {
        $request->validate([
            'status' => 'required|in:new,replied,completed',
        ]);

        $customOrder->update(['status' => $request->status]);

        return back()->with('success', 'Inquiry status updated to ' . ucfirst($request->status) . '.');
    }

    public function destroy(CustomOrderRequest $customOrder)
    {
        $customOrder->delete();
        return redirect()->route('admin.custom-orders.index')->with('success', 'Custom order request deleted.');
    }
}
