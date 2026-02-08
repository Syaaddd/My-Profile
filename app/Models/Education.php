<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'degree',
        'description',
        'start_year',
        'end_year',
        'is_graduated',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_graduated' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Scope untuk yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Accessor untuk periode
    public function getPeriodAttribute()
    {
        $start = $this->start_year;
        $end = $this->end_year ?? ($this->is_graduated ? 'Lulus' : 'Sekarang');
        return "$start - $end";
    }
}