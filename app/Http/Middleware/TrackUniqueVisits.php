<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class TrackVisitsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($this->shouldTrack($request)) {
            $this->trackVisit($request);
        }

        return $next($request);
    }

    protected function shouldTrack(Request $request)
    {
        // Don't track these paths
        $excludedPaths = ['admin', 'login', 'register'];
        
        return !$request->is($excludedPaths) && 
               !$request->ajax() && 
               $request->method() === 'GET';
    }

    protected function trackVisit(Request $request)
    {
        $sessionId = $request->session()->getId();
        
        Visit::firstOrCreate(
            [
                'session_id' => $sessionId,
                'created_at' => today()
            ],
            [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'path' => $request->path(),
                'referrer' => $request->header('referer')
            ]
        );
    }
}