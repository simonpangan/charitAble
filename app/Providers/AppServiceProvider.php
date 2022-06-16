<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        //Model encryption

        $key = $this->databaseEncryptionKey();
        $cipher = config('app.cipher');
        Model::encryptUsing(new Encrypter($key, $cipher));
    }

    protected function databaseEncryptionKey(): ?string
    {
        $key = config('database.encryption_key');
        return base64_decode(Str::after($key, 'base64:'));
    }
}
