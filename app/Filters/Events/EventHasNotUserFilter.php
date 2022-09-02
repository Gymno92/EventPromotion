<?php


namespace App\Filters\Events;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EventHasNotUserFilter
{
    public function handle($query, Closure $next) {
        $query->whereDoesntHave('users', function (Builder $userQuery) {
            $userQuery->where('user_id', '=', Auth::id());
        });
        return $next($query);
    }
}
