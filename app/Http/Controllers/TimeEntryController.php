<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserContract;
use App\Models\TimeEntry;
use App\Models\Worker;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_entries = TimeEntry::paginate();
        return view('time_entry.index', compact('time_entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $contracts = $user->userContracts;
        $workers = Worker::all();

        return view('time_entry.create', compact('contracts', 'workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_contract = UserContract::find($request->get('user_contract_id'));
        $user = auth()->user();
        $entity = new TimeEntry();
        $entity->user_id = $user->id;
        $entity->fill($request->all());
        $entity->paycheck = $user_contract->hourly_rate * $entity->hours_amount;
        $entity->save();

        return redirect(route('time_entry.index'))->with('success', 'Time entry added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEntry $time_entry)
    {
        $user = auth()->user();
        $contracts = $user->userContracts;
        $workers = Worker::all();

        return view('time_entry.edit', compact('contracts', 'time_entry', 'workers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeEntry $time_entry)
    {
        $user_contract = UserContract::find($request->get('user_contract_id'));
        $time_entry->fill($request->all());
        $time_entry->paycheck = $user_contract->hourly_rate * $time_entry->hours_amount;
        $time_entry->save();
        return redirect(route('time_entry.index'))->with('success', 'Time entry edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $time_entry)
    {
        $time_entry->delete();
        return redirect()->back()->with('success', 'TimeEntry deleted.');
    }
}
