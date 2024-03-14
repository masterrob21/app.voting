<?php

namespace App\Http\Controllers;

use App\Models\Ec_Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ec_OfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->join('ec__officials', 'users.id', '=', 'ec__officials.userid')
                                    ->select('users.name', 'ec__officials.id')
                                    ->orderBy('name')
                                    ->get();

        return view('voter.ec')->with('ecs', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ecOfficials = DB::table('ec__officials')->select('userid');

        $users = DB::table('users')->where('is_system', 0)
                                    ->whereNotIn('id', $ecOfficials)
                                    ->orderBy('name')
                                    ->get();

        return view('voter.create-ec')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        $ec = new Ec_Official;
        $ec->userid = $id;
        $ec->save();

        return redirect(route('ec.index'))->with('status', 'Ec official added');
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