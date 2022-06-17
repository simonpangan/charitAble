<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\Log;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BenefactorLogController extends Controller
{
    public function __invoke(Request $request)
    {
        $logs = Log::query()
            ->visibleTo(Auth::user())  
            ->when($request->input('from') && $request->input('to'), 
                    function ($query, $from) use ($request) {
                $query->whereBetween('created_at', 
                    [$request->input('from'), $request->input('to')]
                );
            })
            ->when($request->input('from') && ($request->input('to') == null), 
                    function ($query, $from) use ($request) {

                $request->merge(['to' => now()]);
                $query->whereBetween('created_at', [$from, now()]);
            })
            ->when($request->input('order'), function ($query, $search) use($request){
                $query->orderByTimestamp($request->only(['order', 'sort']));
            })
            ->unless($request->input('order'), function ($query, $search) {
                $query->latest();
            })
            ->paginate(
                $request->input('entries') ? $request->input('entries') : '10', 
                ['activity', 'created_at'], 'page'
            )
            ->withQueryString();

        return Inertia::render( 
            'Benefactor/Logs', [
                'logs' => $logs,
                'filters' =>  [
                    'search' => $request->input('search') ? $request->input('search') : null,
                    'from' => $request->input('from') ? $request->input('from') : null,
                    'to' => $request->input('to') ? $request->input('to') : null,
                    'entries' => $request->input('entries') ? $request->input('entries') : '10',
                    'sort' => $request->input('sort') ? $request->input('sort') : 'asc',
                ]
            ]
        );
    }
}
