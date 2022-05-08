<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
class Administration
{

    public function handle($request, Closure $next, $guard = null)
    {
        $Role=Admin::where('id',Auth::guard('admin')->id())->first();
        if($Role->Role!='Boss')
        {
            return redirect(route('Error'));
        }

        $response = $next($request);
        return $response;
    }
}
