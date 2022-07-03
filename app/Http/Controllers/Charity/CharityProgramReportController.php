<?php

namespace App\Http\Controllers\Charity;

use PDF;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityProgram;

class CharityProgramReportController extends Controller
{
    public function redirect(int $id)
    {
       return redirect()->to(URL::temporarySignedRoute(
        'charity.program.download', now()->addHour(2), ['id' => $id]
       ));
    }

    public function generate(int $id)
    {
        $user = Auth::user();

        $program = CharityProgram::query()
            ->with(
                'supporters:id,charity_program_id,benefactor_id,amount,donated_at', 
                'supporters.benefactor:id,first_name,last_name'
            )
            ->findOrFail($id);

        abort_if($program->charity_id != $user->id, 403);

        $data = [
            'program' => $program,
        ]; 

        $pdf = PDF::loadView('reports/charity/program', $data);

        $user->update(['last_generate_report' => now()]);
        
        $user->createLog('You have generated program report');

        return $pdf->download('report.pdf');
    }
}
