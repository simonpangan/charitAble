<?php

namespace App\Http\Controllers\Charity;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use App\Models\Charity\CharityProgram;
use App\Http\Requests\Charity\CharityProgramRequest;

class CharityProgramController
{
    public function index(): Response
    {
        return Inertia::render('');
    }

    public function create(): Response
    {
        return Inertia::render('Charity/Program/Create');
    }

    public function store(CharityProgramRequest $request): RedirectResponse
    {
        CharityProgram::create($request->validated());

        return to_route('');
    }

    public function show(int $id): Response
    {
        return Inertia::render(
            '',  
            CharityProgram::findOrFail($id)->toArray()
        );
    }

    public function edit(int $id): Response
    {
        return Inertia::render(
            '',  
            CharityProgram::findOrFail($id)->toArray()
        );
    }

    public function update(CharityProgramRequest $request, int $id): RedirectResponse
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->update($request->validated());

        return to_route('');
    }

    public function destroy(int $id): RedirectResponse
    {
        CharityProgram::query()
            ->findOrFail($id)
            ->delete();

        return to_route('index');
    }
}
