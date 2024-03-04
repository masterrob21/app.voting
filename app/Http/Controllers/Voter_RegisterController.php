<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VoterRegister;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Voter_RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->join('voter_registers', 'users.id', '=', 'voter_registers.userid')
                                    ->select('users.name', 'voter_registers.id')
                                    ->orderBy('name')
                                    ->get();

        return view('voter.index')->with('voters', $users );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $voters = DB::table('voter_registers')->select('userid');

        $users = DB::table('users')->where('is_system', 0)
                                    ->whereNotIn('id', $voters)
                                    ->orderBy('name')
                                    ->get();

        return view('voter.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id): RedirectResponse
    {
        $voter = new VoterRegister;
        $voter->userid = $id;

        $voter->save();

        return redirect(route('voters.index'))->with('status', 'New voter added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $deleteVoter = VoterRegister::find($id);

        $lastRecord = VoterRegister::all();
        if(count($lastRecord)<2){
            $deleteVoter->truncate();
        } else {
             $deleteVoter->delete();
        }
       
        
        return redirect()->route('voters.index')->with('status', 'Voter removed from Voter register');
    }
}