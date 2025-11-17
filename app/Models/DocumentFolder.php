<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFolder extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_rack_id',
        'folder_name',
        'kode_folder',
        'deskripsi',
    ];

    public function rak()
    {
        return $this->belongsTo(DocumentRack::class, 'document_rack_id');
    }
}
