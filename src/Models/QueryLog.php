<?php


use Illuminate\Database\Eloquent\Model;

class QueryLog extends Model
{
    protected $table = 'query_logs';

    // Поля, які можна заповнювати масово
    protected $fillable = ['query', 'bindings', 'time'];
}