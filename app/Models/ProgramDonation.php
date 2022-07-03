<?php

namespace App\Models;

use App\Models\Benefactor;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ProgramDonation extends Pivot
{
	public $timestamps = false;

    public $table = 'program_donations';

    protected $appends = ['donated_at_formatted'];

	public function getDonatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->donated_at)->toDayDateTimeString());
    }

    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class);
    }
}
