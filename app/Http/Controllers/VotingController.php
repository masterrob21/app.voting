<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $president = DB::table('nominees')
                                        ->join('users', 'nominees.userid', '=', 'users.id')
                                        ->where('positionid', 1)
                                        ->select('nominees.id', 'nominees.photo', 'users.name')
                                        ->get();

        $vicePresident = DB::table('nominees')
                                        ->join('users', 'nominees.userid', '=', 'users.id')
                                        ->where('positionid', 2)
                                        ->select('nominees.id', 'nominees.photo', 'users.name')
                                        ->get();

        $finSecretary = DB::table('nominees')
                                        ->join('users', 'nominees.userid', '=', 'users.id')
                                        ->where('positionid', 3)
                                        ->select('nominees.id', 'nominees.photo', 'users.name')
                                        ->get();

        $organiser = DB::table('nominees')
                                        ->join('users', 'nominees.userid', '=', 'users.id')
                                        ->where('positionid', 4)
                                        ->select('nominees.id', 'nominees.photo', 'users.name')
                                        ->get();

        $secretary = DB::table('nominees')
                                        ->join('users', 'nominees.userid', '=', 'users.id')
                                        ->where('positionid', 5)
                                        ->select('nominees.id', 'nominees.photo', 'users.name')
                                        ->get();

        return view('voting.index')->with('presidents', $president)
                                    ->with('vicePresidents', $vicePresident)
                                    ->with('finSecretarys', $finSecretary)
                                    ->with('organisers', $organiser)
                                    ->with('secretarys', $secretary);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}