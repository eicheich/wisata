<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'rate',
        'location',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

//    image path
    public function getThumbnailAttribute($value)
    {
        return asset('storage/' . $value);
    }


}
