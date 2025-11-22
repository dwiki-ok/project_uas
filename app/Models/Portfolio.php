<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'nama_proyek',
        'deskripsi',
        'keahlian',
        'pdf_file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
