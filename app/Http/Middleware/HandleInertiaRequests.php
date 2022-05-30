<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $sharedProps = [
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
        ];

        if ($request->getPathInfo() === "/email/verify") {
            $sharedProps = Arr::add(
                $sharedProps, 'flash.resent', fn () => $request->session()->get('resent')
            );
        }

        if ($request->getPathInfo() === "/password/reset") {
            $sharedProps = Arr::add(
                $sharedProps, 'flash.status', fn () => $request->session()->get('status')
            );
        }

        return array_merge(parent::share($request), $sharedProps);
    }
}
