<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $nama_proyek
 * @property string|null $deskripsi
 * @property string|null $keahlian
 * @property string|null $pdf_file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereKeahlian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereNamaProyek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio wherePdfFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Portfolio whereUserId($value)
 * @mixin \Eloquent
 */
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
