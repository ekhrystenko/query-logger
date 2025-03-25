## Налаштування логування у файл

Щоб логи запитів записувалися в окремий файл, додайте цей лог-канал у `config/logging.php`:
```php
'channels' => [
    'query' => [
        'driver' => 'single',
        'path' => storage_path('logs/query.log'),
        'level' => 'info',
    ],
]
