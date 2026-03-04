<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Filament\Notifications\Notification;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // السماح بصفحة تسجيل الدخول بدون تحقق
        if ($request->is('admin/login') || $request->routeIs('filament.admin.auth.login')) {
            return $next($request);
        }

        // التحقق من تسجيل الدخول
        if (!Auth::check()) {
            Notification::make()
                ->title('You must log in first.')
                ->danger()
                ->send();

            return redirect()->route('filament.admin.auth.login');
        }

        // التحقق من الدور
        if (!in_array(Auth::user()->role, ['admin', 'superadmin'])) {
            Auth::logout();

            Notification::make()
                ->title('You are not authorized to enter.')
                ->body('You must be an admin or super admin.')
                ->danger()
                ->send();

            return redirect()->route('filament.admin.auth.login');
        }

        return $next($request);
    }
}
