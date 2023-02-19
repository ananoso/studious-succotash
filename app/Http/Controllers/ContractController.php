<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractsRequest;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\User;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::paginate();

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('contracts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractsRequest $request)
    {
        $entity = new Contract();
        $entity->fill($request->all());
        $entity->save();
        return redirect()->back()->with('success', 'Contract added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        $contractors = $contract->users->unique();

        $users = User::getViableContractors()->
        whereNotIn('id', $contractors->pluck('id'))->paginate();

        return view('contracts.detail', compact('contract', 'users', 'contractors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return Viev
     */
    public function edit(Contract $contract)
    {
        $users = User::all();
        return view('contracts.edit', [
            'contract' => $contract,
            'users'    => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $contract->fill($request->all());
        $contract->save();
        return redirect()->back()->with('success', 'Contract updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function delete(Contract $contract)
    {
        return view('contracts.delete', [
            'contract' => $contract
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect(route('contracts.index'))->with('success', 'Contract deleted.');
    }
}
