<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;

class CheckVotingStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $votingStatus = Setting::where('key', 'voting_status')->value('value') ?? 'close';

        if ($votingStatus === 'close') {
            session()->flash('error', 'Voting belum dimulai.');
            return redirect()->route('home');
        }elseif ($votingStatus === 'end') {
            session()->flash('error', 'Voting berakhir.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
