<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\Log;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Request;

class BenefactorLogController extends Controller
{
    public function __invoke()
    {
        //set default entries to 10
        Request::mergeIfMissing(['entries' => 10]);

        $logs = Log::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->whereYear('created_at', $search);
            })
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(
                Request::input('entries'), 
                ['activity', 'created_at'], 'page'
            )
            ->withQueryString();

        return Inertia::render( 
            'Benefactor/Logs', [
                'logs' => $logs,
                'filters' =>  Request::only(['search', 'entries']),
            ]
        );
    }
}
