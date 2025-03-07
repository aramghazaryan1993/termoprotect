<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamsUpdateRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::with('localizations')->get();
        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * @param TeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamRequest $request)
    {
        $this->teamRepository->create($request->all());
        return redirect()->route('admin.teams.index');
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
        $teamEdit = Team::where('id',$id)->with('localizations')->first();
        return view('admin.teams.edit',compact('teamEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamsUpdateRequest $request, string $id)
    {
        $this->teamRepository->update($request->all());
        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->teamRepository->destroy($id);
        return redirect()->route('admin.teams.index');
    }
}
