<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $today = Carbon::today();

        $alreadyVisited = Visitor::where('ip', $ip)->where('date', $today)->exists();

        if (!$alreadyVisited) {
            Visitor::create([
                'ip' => $ip,
                'date' => $today,
            ]);
        }

        return $next($request);
    }
}
