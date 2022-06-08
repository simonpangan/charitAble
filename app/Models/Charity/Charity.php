<?php

namespace App\Models\Charity;

use App\Models\Charity\CharityOfficers;
use Database\Factories\CharityFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected static function newFactory()
    {
        return CharityFactory::new();
    }

    //Relationships
    public function officers()
    {
        return $this->hasMany(CharityOfficers::class);
    }
    public function documents()
    {
        return $this->hasMany(CharityDocuments::class);
    }
}
