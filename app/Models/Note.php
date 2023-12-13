<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    public function getStatusLabelAttribute()
    {
        return $this->attributes['status'] == 1 ? 'Active' : 'Non-active';
    }
}
