<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'year',
    ];

    // public function yearable()
    // {
    //     return $this->morphTo();
    // }

    public function racks()
    {
        return $this->hasMany(DocumentRack::class, 'year_id');
    }
}
