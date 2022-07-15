<?php

namespace App\Http\Controllers;

use App\Models\CharityProgramChangeHistory;
use App\Http\Requests\StoreCharityProgramChangeHistoryRequest;
use App\Http\Requests\UpdateCharityProgramChangeHistoryRequest;

class CharityProgramChangeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCharityProgramChangeHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharityProgramChangeHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CharityProgramChangeHistory  $charityProgramChangeHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CharityProgramChangeHistory $charityProgramChangeHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CharityProgramChangeHistory  $charityProgramChangeHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CharityProgramChangeHistory $charityProgramChangeHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCharityProgramChangeHistoryRequest  $request
     * @param  \App\Models\CharityProgramChangeHistory  $charityProgramChangeHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCharityProgramChangeHistoryRequest $request, CharityProgramChangeHistory $charityProgramChangeHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CharityProgramChangeHistory  $charityProgramChangeHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CharityProgramChangeHistory $charityProgramChangeHistory)
    {
        //
    }
}
