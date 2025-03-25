<?php

namespace YourVendor\QueryLogger\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use YourVendor\QueryLogger\Models\QueryLog;

class LogQuery
{
    public function handle(QueryExecuted $event)
    {
        // Зберігаємо SQL-запит в базу даних
        QueryLog::create([
            'query' => $event->sql,
            'bindings' => json_encode($event->bindings), // Параметри запиту
            'time' => $event->time, // Час виконання
        ]);
    }
}
