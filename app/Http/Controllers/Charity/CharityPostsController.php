<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Charity\CharityPosts;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Charity\CharityPostStoreRequest;

class CharityPostsController
{
    public function index(): Response
    {
        return Inertia::render('Charity/Post/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Post/Create');
    }

    public function store(CharityPostStoreRequest $request, ): RedirectResponse
    {
        CharityPosts::create($request->validated());

        return to_route('charity.posts.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityPosts::query()
            ->findOrFail($id)
            ->delete();
        
        return to_route('charity.posts.index');
    }
}
