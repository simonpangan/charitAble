<?php

namespace App\Http\Controllers\Benefactor;

use App\Models\Log;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BenefactorLogController extends Controller
{
    public function __invoke()
    {
        $logs = Log::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(
                10, ['activity', 'created_at'], 'page'
            );

        return Inertia::render('Benefactor/Logs', ['logs' => $logs]);
    }
}
