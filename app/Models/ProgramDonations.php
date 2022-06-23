<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ProgramDonations extends Pivot
{
	public $timestamps = false;

    protected $appends = ['donated_at_formatted'];

	public function getDonatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->donated_at)->toDayDateTimeString());
    }
}
