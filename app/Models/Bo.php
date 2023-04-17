<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'link'
    ];

    public function scopeFilter($query, array $filters) 
    {
        if(isset($filters['search'])) {
            return $query->where('nama', 'like', '%' . $filters['search'] .  '%')
                        ->orWhere('nama', 'like', '%' . $filters['search'] .  '%')
            ;
        }
    }
}
