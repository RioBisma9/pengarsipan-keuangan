<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabinet_id',
        'category_name',
        'description',
        'url_icon',
        'path_icon',
    ];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class, 'cabinet_id');
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    // public function years()
    // {
    //     return $this->morphMany(Year::class, 'yearable');
    // }

    public function racks()
    {
        return DocumentRack::whereIn(
            'year_id',
            $this->years()->pluck('id')
        );
    }

    public function folders()
    {
        return DocumentFolder::whereIn(
            'document_rack_id',
            $this->racks()->pluck('id')
        );
    }

    public function files()
    {
        return ArchiveFile::whereIn(
            'document_folder_id',
            $this->folders()->pluck('id')
        )->get();
    }
}
