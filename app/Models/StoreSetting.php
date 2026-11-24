<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class StoreSetting extends Model
{
    protected $fillable = ['key', 'value'];

    protected static ?array $cache = null;

    public static function allAsMap(): array
    {
        if (static::$cache !== null) {
            return static::$cache;
        }

        try {
            if (!Schema::hasTable('store_settings')) {
                return [];
            }
            static::$cache = static::pluck('value', 'key')->toArray();
        } catch (\Throwable $e) {
            return [];
        }

        return static::$cache;
    }

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $map = static::allAsMap();
        return array_key_exists($key, $map) && $map[$key] !== null && $map[$key] !== ''
            ? $map[$key]
            : $default;
    }

    public static function setValue(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        static::$cache = null;
    }
}
