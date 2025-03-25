<?php

namespace QueryLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class QueryLoggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        DB::listen(function ($query) {
            $sql = $query->sql;
            $bindings = json_encode($query->bindings);
            $time = $query->time;
            $userId = Auth::id() ?? 'guest';

            $logEntry = "[User: {$userId}] {$sql} | Bindings: {$bindings} | Time: {$time}ms";

            Log::channel('query')->info($logEntry);
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/query-logger.php', 'query-logger');
    }
}
