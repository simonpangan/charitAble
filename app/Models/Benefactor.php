<?php

namespace App\Models;

use App\Models\Charity\Charity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefactor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    protected function preferences(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(",", $value),
            set: fn ($value) => implode(",", $value),
        );
    }

    public static function auth()
    {
        return Benefactor::find(Auth::id());   
    }

    public function followingCharities()        
    {
        return $this->belongsToMany(Charity::class, 'charity_followers');
    }

    public function scopeWhereSearch($query, $search)
    {
        if (is_null($search))
        {
            return;
        }

        dd( $search);
        foreach (explode(' ', $search) as $term) {
            $query->where(function ($query) use ($term) {
                $query->where('first_name', 'ilike', '%'.$term.'%')
                ->orWhere('last_name', 'ilike', '%'.$term.'%')
                ->orWhereHas('company', function ($query) use ($term) {
                    $query->where('name', 'ilike', '%'.$term.'%');
                });
            });
        }
    }
}
