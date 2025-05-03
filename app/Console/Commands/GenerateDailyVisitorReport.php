<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Visit;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyVisitorReport;

class GenerateDailyVisitorReport extends Command
{
    protected $signature = 'visitors:daily-report';
    protected $description = 'Generate daily visitor statistics report';

    public function handle()
    {
        $yesterday = now()->subDay();
        
        $stats = [
            'date' => $yesterday->format('Y-m-d'),
            'unique_visitors' => Visit::whereDate('created_at', $yesterday)
                                    ->distinct('session_id')
                                    ->count(),
            'total_visits' => Visit::whereDate('created_at', $yesterday)
                                 ->count(),
            'top_pages' => Visit::select('path', 
            \Illuminate\Support\Facades\DB::raw('COUNT(*) as visits'),
            \Illuminate\Support\Facades\DB::raw('COUNT(DISTINCT session_id) as unique_visitors'))
                                ->whereDate('created_at', $yesterday)
                                ->groupBy('path')
                                ->orderByDesc('visits')
                                ->limit(5)
                                ->get(),
            'referrers' => Visit::select('referrer',
            \Illuminate\Support\Facades\DB::raw('COUNT(*) as visits'))
                                ->whereDate('created_at', $yesterday)
                                ->whereNotNull('referrer')
                                ->groupBy('referrer')
                                ->orderByDesc('visits')
                                ->limit(5)
                                ->get()
        ];
        
        // // Send to admin users
        // $admins = User::where('is_admin', true)->get();
        
        // foreach ($admins as $admin) {
        //     Mail::to($admin->email)
        //         ->send(new DailyVisitorReport($stats));
        // }
        
        // $this->info('Daily visitor report sent to '.$admins->count().' admins.');
    }
}