<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Specie;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $observations = Observation::orderBy('created_at', 'asc')->get();
        $myObservations = Observation::where('user_id', auth()->user()->id)->get();

        return view('observations.index', ['observations' => $observations, 'my_observations' => $myObservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $species = Specie::all();

        return view('observations.create', ['species' => $species]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'observation' => 'required',
            'gps_coord1' => 'required|numeric',
            'gps_coord2' => 'required|numeric',
        ]);
    
        $request->user()->observations()->create([
            'observation' => $request->observation,
            'gps_coord1' => $request->gps_coord1,
            'gps_coord2' => $request->gps_coord2,
            'specie_id' => $request->specie_id
        ]);
    
        return redirect('/observations');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function edit(Observation $observation)
    {
        //
        $species = Specie::all();

        return view('observations.edit', ['species' => $species, 'observation' => $observation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Observation $observation)
    {
        $this->validate($request, [
            'observation' => 'required',
            'gps_coord1' => 'required|numeric',
            'gps_coord2' => 'required|numeric',
            'id' => 'required'
        ]);

        //get all input data
        $input = $request->all();

        //update with inpput data from request
        $observation->update($input);
        return redirect('observations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation)
    {
        // use model method to delete entity from database
        $observation->delete();

        //redirect
        return redirect('/observations');
    }
}
