<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('role', 'member')->count(),
            'total_workspaces' => Workspace::count(),
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'total_revenue' => Booking::where('status', '!=', 'cancelled')->sum('total_price'),
            'monthly_revenue' => Booking::where('status', '!=', 'cancelled')
                ->whereMonth('created_at', now()->month)
                ->sum('total_price'),
        ];

        // Recent bookings
        $recentBookings = Booking::with(['user', 'workspace'])
            ->latest()
            ->take(10)
            ->get();

        // Booking stats by month (last 6 months)
        // Use SQLite-compatible date formatting
        $monthlyBookings = Booking::select(
            DB::raw("strftime('%Y-%m', created_at) as month"),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(total_price) as revenue')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Workspace utilization
        $workspaceStats = Workspace::withCount('bookings')
            ->orderBy('bookings_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'monthlyBookings', 'workspaceStats'));
    }
}
