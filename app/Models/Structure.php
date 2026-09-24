<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Structure extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'structures';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'avatar',
        'name',
        'position',
        'category',
        'email_or_phone',
        'note',
        'order_priority',
    ];

    /**
     * Cast atribut ke tipe data spesifik.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order_priority' => 'integer',
        'deleted_at' => 'datetime',
    ];
}
