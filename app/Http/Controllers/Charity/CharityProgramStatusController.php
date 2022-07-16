<?php

namespace App\Http\Controllers\Charity;

use App\Http\Controllers\Controller;
use App\Models\Charity\CharityProgram;
use Illuminate\Http\Request;

class CharityProgramStatusController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $program = CharityProgram::findOrFail($id);

        $program->update([
            'is_active' => ($request->status == 'true') ? true : false
        ]);
    }
}
