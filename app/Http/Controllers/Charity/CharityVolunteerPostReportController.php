<?php

namespace App\Http\Controllers\Charity;

use PDF;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Charity\CharityVolunteerPost;

class CharityVolunteerPostReportController extends Controller
{
    public function redirectToGeneratedReport(int $id)
    {
       return redirect()->to(URL::temporarySignedRoute(
        'charity.volunteer.download', now()->addHour(2), ['id' => $id]
       ));
    }

    public function generate(int $id)
    {
        $user = Auth::user();
        
        $post = CharityVolunteerPost::query()
            ->with(
                'interests:id,first_name,last_name', 
                'interests.user:id,email'
            )
            ->latest()
            ->findOrFail($id);

        abort_if($post->charity_id != $user->id, 403);

        $data = [
            'post' => $post,
        ]; 

        $pdf = PDF::loadView('reports/charity/volunteer-post', $data);

        $user->update(['last_generate_report' => now()]);

        $user->createLog('You have generated volunteer posting report');

        return $pdf->download('report.pdf');
    }
}
