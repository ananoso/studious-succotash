<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserContract;

class UserContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id, $contract_id)
    {
        $contract = Contract::findOrFail($contract_id);
        $user = User::findOrFail($user_id);
        return view('user_contracts.create', ['contract' => $contract, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entity = new UserContract();
        $entity->fill($request->all());
        $entity->save();

        return redirect(route('contracts.show', [$entity->contract_id]))->with('success', 'User added.');
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
    public function edit($user_id, $contract_id)
    {
        $contract = Contract::findOrFail($contract_id);
        $user = User::findOrFail($user_id);
        $user_contract = UserContract::where(['user_id' => $user_id, 'contract_id' => $contract_id])->firstOrFail();

        return view('user_contracts.edit', compact('contract', 'user', 'user_contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserContract $user_contract)
    {
        $user_contract->fill($request->all());
        $user_contract->save();
        return redirect()->back()->with('success', 'User changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
