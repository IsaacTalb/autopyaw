<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Product;
use App\Models\Faq;
use App\Models\FacebookPage;
use App\Models\Chat;
use App\Models\Usage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Show the main dashboard for the logged‑in business.
     */
    public function __invoke()
    {
        $user = Auth::user();
        $business = $user->business ?? null;

        $stats = [];
        if ($business) {
            $stats['products'] = $business->products()->count();
            $stats['faqs'] = $business->faqs()->count();
            $stats['pages'] = $business->pages()->count();
            $stats['chats'] = $business->chats()->count();
            // usage for current month
            $now = now();
            $monthStart = $now->copy()->startOfMonth();
            $monthEnd = $now->copy()->endOfMonth();
            $usage = $business->usage()
                ->whereBetween('period_start', [$monthStart, $monthEnd])
                ->get();
            $stats['usage_conversations'] = $usage->where('type', 'conversation')->sum('count');
            $stats['usage_embeddings'] = $usage->where('type', 'embedding')->sum('count');
            // placeholder plan limits (you will replace with real plan data later)
            $stats['plan_conversations'] = $business->subscription_plan === 'free' ? 100 : 5000;
            $stats['plan_embeddings'] = $business->subscription_plan === 'free' ? 50 : 2000;
        }

        return View::make('dashboard', ['user' => $user, 'stats' => $stats]);
    }
}
