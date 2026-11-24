<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('q', ''));

        $query = Subscriber::latest();
        if ($search !== '') {
            $query->where('email', 'like', '%' . $search . '%');
        }

        $subscribers = $query->paginate(20)->withQueryString();
        $allEmails = Subscriber::latest()->pluck('email')->implode(', ');

        $stats = [
            'total' => Subscriber::count(),
            'this_month' => Subscriber::where('created_at', '>=', now()->startOfMonth())->count(),
            'latest' => Subscriber::latest()->first(),
        ];

        return view('admin.subscribers.index', compact('subscribers', 'stats', 'search', 'allEmails'));
    }

    public function export()
    {
        $subscribers = Subscriber::latest()->get();
        $filename = 'islamic-crafts-subscribers-' . now()->format('Y-m-d') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($subscribers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Email Address', 'Subscribed On']);
            foreach ($subscribers as $sub) {
                fputcsv($handle, [
                    $sub->id,
                    $sub->email,
                    $sub->created_at ? $sub->created_at->format('Y-m-d H:i:s') : '',
                ]);
            }
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return back()->with('success', 'Subscriber removed from VIP list.');
    }
}
