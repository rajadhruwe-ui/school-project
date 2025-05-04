<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Visit;

class TrackVisits
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $path = $request->path();
        $referer = $request->headers->get('referer');
        $sessionId = session()->getId();

        // Save to `visitors` if new IP
        if (!Visitor::where('ip', $ip)->exists()) {
            Visitor::create(['ip' => $ip]);
        }

        // Save to `visits` every time
        Visit::create([
            'session_id' => $sessionId,
            'ip_address' => $ip,
            'user_agent' => $userAgent,
            'path' => $path,
            'referer' => $referer,
        ]);

        return $next($request);
    }
}
