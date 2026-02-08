<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    // Method untuk get setting by key
    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        return match($setting->type) {
            'boolean' => (bool) $setting->value,
            'json' => json_decode($setting->value, true),
            default => $setting->value,
        };
    }

    // Method untuk set setting
    public static function set($key, $value, $type = 'string', $group = 'general')
    {
        $setting = self::where('key', $key)->first();
        
        $data = [
            'key' => $key,
            'type' => $type,
            'group' => $group,
        ];

        $data['value'] = match($type) {
            'boolean' => $value ? '1' : '0',
            'json' => json_encode($value),
            default => $value,
        };

        if ($setting) {
            $setting->update($data);
        } else {
            self::create($data);
        }
    }
}