<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
    ];

    protected $guarded = ['description', 'image'];

    public function scopeFilter($query, array $filters)
    {
        // dd($query, $filters);
        if ($filters['search'] ?? false) {
            return $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    }
}
