<?php

namespace App\Models\Charity;

use DateTimeInterface;
use App\Traits\CharityID;
use App\Models\Benefactor;
use App\Models\Categories;
use Illuminate\Support\Carbon;
use App\Models\ProgramDonation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharityProgram extends Model
{
    use HasFactory, CharityID;

    protected $guarded = ['id'];

    protected $casts = [
        'goals' => 'array',
        'expenses' => 'array',
        'updates' => 'array',
        'has_withdraw_request' => 'boolean',
        'is_active' => 'boolean',
        'withdraw_requested_at' => 'datetime',
    ];

    protected $appends = ['created_at_formatted'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->toDayDateTimeString();
    }

    protected function updates(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $updates = collect(json_decode($value, true));
                
                return $updates->map(function ($update) {
                    if (array_key_exists("updated_at", $update)) {
                        return array_merge($update, [
                            'updated_at_formatted' => (new Carbon($update['updated_at']))->toDayDateTimeString()
                        ]);
                    } else {
                        return array_merge($update, [
                            'created_at_formatted' => (new Carbon($update['created_at']))->toDayDateTimeString()
                        ]);
                    }
                });
            },
        );
    }


    public function getGoalsAttribute($value)
    {
        $goals = collect(json_decode($value, true));

        return $goals->map(function ($goal) {
            return array_merge($goal, [
                'goal_formatted' => (new Carbon($goal['date']))->toFormattedDateString()
            ]);
        });
    }

    public function charity()
    {
        return $this->belongsTo(Charity::class);
    }

    public function benefactor()
    {
        return $this->belongsTo(Benefactor::class);
    }

    public function posts()
    {
        return $this->hasMany(CharityPosts::class);
    }


    public function donations()
    {
        return $this->belongsToMany(
                CharityProgram::class,
                'program_donations',
                'charity_program_id',
                'benefactor_id',
            )
            ->using(ProgramDonation::class)
            ->withPivot(
                'amount', 'transaction_id',
                'tip_price', 'message',
            );
    }

    public function supporters()
    {
        return $this->hasMany(ProgramDonation::class)->latest('donated_at');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return (Carbon::parse($this->created_at)->diffForHumans());
    }

    public function scopeFilterProgramBy($query, $name, $category)
    {
        //name is only in the query
        if(! is_null($name) && is_null($category))
        {
            return $this->filterProgramByName($query, $name);
        }

        //category is only in the query
        if ($category && is_null($name)) {
            return $this->filteProgramByCategory($query, $category);
        }

        return $query->whereIn(
            'charity_programs.charity_id',
           $this->benefactorFollowing()
        );
    }

    private function benefactorFollowing () {
        return CharityFollowers::query()
            ->select('charity_id')
            ->where('benefactor_id', Auth::id())
            ->get()
            ->pluck('charity_id')
            ->toArray();
    }

    private function filterProgramByName($query, $name)
    {
        return $query->whereIn(
            'charity_programs.charity_id',
            $this->benefactorFollowing()
        )->where('charity_programs.name', 'like', '%'.$name.'%');
    }

    private function filteProgramByCategory($query, $category)
    {
        $benefactorFollowing = $this->benefactorFollowing();


        $category = Categories::select('id')->whereName($category)->first();


        if (is_null($category)) {
            return $query->whereIn(
                'charity_programs.charity_id',
               $this->benefactorFollowing()
            );
        }

        $charityID = CharityCategories::query()
            ->whereIn('charity_id',  $benefactorFollowing)
            ->where(
                'category_id',
                $category->id
            )
            ->get(['charity_id'])
            ->pluck('charity_id');

        return  $query->whereIn(
            'charity_programs.charity_id',
            $charityID->toArray()
        );
    }
}
