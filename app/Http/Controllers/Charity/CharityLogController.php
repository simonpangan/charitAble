<?php

namespace App\Http\Controllers\Charity;

use App\Models\Log;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CharityLogController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validateFields($request);

        return Inertia::render( 
            'Charity/Logs', [
                'logs' => $this->getLogs($request),
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

    private function validateFields(Request $request)
    {
        if (! ($request->has('from') || $request->has('to'))) {
            return;
        }

        $validator = Validator::make(
            $request->all(), $this->rules($request), 
            [
                'to.after_or_equal' => 'The to field must start before the "from" field',
                'to.before' => 'The to must be a date before the current time.',
                'from.before' => 'The from must be a date before the current time.',
                'from.before_or_equal' => 'The from must be a date before "to" field.',
            ]
        );

        if ($validator->fails()) {
            throw ValidationException::withMessages(
                $validator->messages()->toArray()
            );
        }
    }

    private function rules(Request $request): array
    {
        /*
            We will use the time where the user is created because 
            that's the time where there are able to access the application. 
        */ 
        // $emailVerifiedAt = Auth::user()->toArray();
        $userCreatedAt = Auth::user()->created_at->format('F jS Y\\, h:i:s A');
        
        $to = $request->input('to') ? "before_or_equal:{$request->input('to')}": 'before:now';

        return [
            'from' => ['required', 'date', "after:{$userCreatedAt}", $to],
            'to' => ['nullable', 'date', "after_or_equal:{$request->input('from')}", 'before:now'],
        ];
    }

    private function getLogs(Request $request)
    {
        return Log::query()
            ->visibleTo(Auth::user())  
            ->when($request->input('from') && $request->input('to') && ($request->input('from') != $request->input('to')), 
                    function ($query, $from) use ($request) {
                $query->whereBetween('created_at', 
                    [$request->input('from') . ':00', $request->input('to') . ':59']
                );
            })
            ->when($request->input('from') && $request->input('to') && ($request->input('from') == $request->input('to')), 
                    function ($query, $from) use ($request) {
                $query->whereBetween('created_at', 
                    [$request->input('from') . ':00', $request->input('from') . ':59']
                );
            })
            ->when($request->input('from') && ($request->input('to') == null), 
                    function ($query, $from) use ($request) {

                $request->merge(['to' => now()]);
                $query->whereBetween('created_at', 
                    [$request->input('from'), $request->input('to')]
                );
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
    }
}
