<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class CampaignUpdate extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
