<?php

namespace App\Http\Controllers;

use App\Http\Resources\VacationResource;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacations = Vacation::paginate(10);
        return VacationResource::collection($vacations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'body' => 'required',
            'vacation_type' => 'required',
        ]);

        $vacation = new Vacation();
        $vacation->Usr_date_out = $request->input('date')[0];
        $vacation->Usr_date_in = $request->input('date')[1];
        $vacation->body = $request->input('body');
        $vacation->status = $request->input('status');
        $vacation->vacation_type = $request->input('vacation_type');
        $vacation->user_id = auth()->id();

        if ($vacation->save())
        {
            return new VacationResource($vacation);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaction = Vacation::findOrFail($id);
        return  new VacationResource($vaction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaction = Vacation::fidOrFail($id);
        if ($vaction->delete())
        {
            return VacationResource($vaction);
        }
    }
}
