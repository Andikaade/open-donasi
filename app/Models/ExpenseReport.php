<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'spent_at' => 'date',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
