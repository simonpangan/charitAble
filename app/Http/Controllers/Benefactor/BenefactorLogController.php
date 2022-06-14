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
        //set default entries to 10
        $request->mergeIfMissing(['entries' => 10]);

        $logs = Log::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->whereYear('created_at', $search);
            })
            ->when($request->input('order'), function ($query, $search) use($request){
                $query->orderByTimestamp($request->only(['order', 'sort']));
            })
            ->unless($request->input('order'), function ($query, $search) {
                $query->latest();
            })
            ->visibleTo(Auth::user())  
            ->paginate(
                $request->input('entries'), 
                ['activity', 'created_at'], 'page'
            )
            ->withQueryString();

        return Inertia::render( 
            'Benefactor/Logs', [
                'logs' => $logs,
                'filters' =>  [
                    'search' => $request->input('search') ? $request->input('search') : null,
                    'entries' => $request->input('entries') ? $request->input('entries') : null,
                    'sort' => $request->input('sort') ? $request->input('sort') : 'asc',
                ]
            ]
        );
    }
}
