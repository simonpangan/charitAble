<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols();
        });

        Request::macro('userRole', function () {
            return $this->user()->role_id;
        });

        Factory::macro('lazyRaw', function ($attributes = [], ?Model $parent = null) {
            if ($this->count === null) {
                return $this->state($attributes)->getExpandedAttributes($parent);
            }

            return LazyCollection::make(function () use ($parent, $attributes) {
                for ($i = 1; $i <= $this->count; $i++) {
                    yield $this->state($attributes)->getExpandedAttributes($parent);
                }
            });
        });
    }
}
