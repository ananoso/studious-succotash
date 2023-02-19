<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    /**
     * Display a listing of the workers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::paginate();

        return view('workers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new worker.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created worker in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'specialization' => 'required',
            'phone' => 'required',
            'type_of_employment' => 'required',
        ]);

        $worker = new Worker([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'specialization' => implode(',', $request->get('specialization')),
            'phone' => $request->get('phone'),
            'type_of_employment' => $request->get('type_of_employment'),
        ]);

        $worker->save();

        return redirect()->route('workers.index')->with('success', 'Worker created successfully.');
    }

    /**
     * Display the specified worker.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        return view('workers.show', compact('worker'));
    }

    /**
     * Show the form for editing the specified worker.
     *
     * @param  \App\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    /**
     * Update the specified worker in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'specialization' => 'required',
            'phone' => 'required',
            'type_of_employment' => 'required',
        ]);

        $worker->name = $request->get('name');
        $worker->surname = $request->get('surname');
        $worker->specialization = implode(',', $request->get('specialization'));
        $worker->phone = $request->get('phone');
        $worker->type_of_employment = $request->get('type_of_employment');
        $worker->save();

        return redirect()->route('workers.index')->with('success', 'Worker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect(route('workers.index'))->with('success', 'Contract deleted.');
    }
}
