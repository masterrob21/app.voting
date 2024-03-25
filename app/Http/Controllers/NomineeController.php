<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
                                        ->orderBy('position')
                                        ->get();

        return view('nominee.index')->with('nominees', $nominee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $nominee = DB::table('nominees')->select('userid');

        $users = DB::table('users')->where('is_system', 0)
                                    ->whereNotIn('id', $nominee)
                                    ->select('id', 'name')
                                    ->orderBy('name')
                                    ->get();

        $positions = DB::table('positions')->orderBy('position')
                                            ->get();

        return view('nominee.create')->with('users', $users)
                                    ->with('positions', $positions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'userid' => ['required', 'unique:nominees,userid'],
            'position' => ['required']
        ]);

        $nominee = Nominee::create([
            'userid' => $request->userid,
            'positionid' => $request->position
        ]);

        return redirect(route('nominee.index'))->with('status', 'Nominee added.');
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

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('');
    }
}