<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    /**
     * Track a new visit
     */
    public function trackVisit(Request $request)
    {
        //Log::info('Tracking visit...', ['ip' => $request->ip()]);

        $sessionId = $request->session()->getId();

        $todayVisitExists = Visit::where('session_id', $sessionId)
            ->whereDate('created_at', today())
            ->exists();

        if (!$todayVisitExists) {
            Visit::create([
                'session_id' => $sessionId,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'path' => $request->path(),
                'referrer' => $request->header('referer')
            ]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Get total unique visitor count
     */
    public function getTotalUniqueVisitors()
    {
        $count = Visit::distinct('session_id')->count();
        return response()->json(['total_unique_visitors' => $count]);
    }

    /**
     * Get today's unique visitors
     */
    public function getTodayUniqueVisitors()
    {
        $count = Visit::whereDate('created_at', today())
            ->distinct('session_id')
            ->count();

        return response()->json(['today_unique_visitors' => $count]);
    }

    /**
     * Get visitor statistics for a date range
     */
    public function getVisitorStats(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);

        $startDate = Carbon::parse($validated['start_date'])->startOfDay();
        $endDate = Carbon::parse($validated['end_date'])->endOfDay();

        // Get unique visitors per day
        $dailyStats = Visit::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(DISTINCT session_id) as unique_visitors'),
            DB::raw('COUNT(*) as total_visits')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Get top visited pages
        $topPages = Visit::select(
            'path',
            DB::raw('COUNT(DISTINCT session_id) as unique_visitors'),
            DB::raw('COUNT(*) as total_visits')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('path')
            ->orderByDesc('total_visits')
            ->limit(10)
            ->get();

        return response()->json([
            'daily_stats' => $dailyStats,
            'top_pages' => $topPages,
            'timeframe' => [
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d')
            ]
        ]);
    }

    /**
     * Get real-time visitor count (last 30 minutes)
     */
    public function getRealtimeVisitors()
    {
        $threshold = now()->subMinutes(30);

        $activeVisitors = Visit::where('created_at', '>=', $threshold)
            ->distinct('session_id')
            ->count();

        return response()->json([
            'active_visitors' => $activeVisitors,
            'timeframe' => 'Last 30 minutes'
        ]);
    }
}
