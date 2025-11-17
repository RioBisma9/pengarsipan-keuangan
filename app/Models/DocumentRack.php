<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRack extends Model
{
    use HasFactory;

    protected $fillable = [
        'rack_name',
        'kode_rack',
        'keterangan',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
