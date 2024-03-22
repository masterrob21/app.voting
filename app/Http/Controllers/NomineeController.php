<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nominee = DB::table('nominees')->join('users', 'nominees.userid', '=', 'users.id')
                                        ->join('positions', 'nominees.positionid', '=', 'positions.id')
                                        ->select('users.name', 'positions.position', 'nominees.id')
                                        ->get();

        return view('nominee.index')->with('nominees', $nominee);
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