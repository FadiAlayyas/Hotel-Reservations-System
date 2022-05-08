<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use DataTime;
class CountVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

       // $ip = hash('sha512', $request->ip());
        $client_info=Visitor::where('ip', $ip);
        if ($client_info->count() < 1)
        {
            Visitor::create([
                'date' => today(),
                'ip' => $ip,
            ]);
        }
      
        return $next($request);
    }
}
