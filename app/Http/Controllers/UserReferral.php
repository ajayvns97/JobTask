<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserReferral extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get(['name' , 'refer_points' , 'id' , 'referral_code']);
        $referral_user = User::whereNotNull('refer_by')->with(['referals' , 'tech'])->get(); 
        return view('user-list' , ['users' => $user , 'referral_users' => $referral_user ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|unique:users',
            'email' => 'required|unique:users',
            'gender' => 'required',
        ]);
        $input = $request->all();
      $status =  User::userAddWithReferral($input);

        if($status){
            return redirect()->back()->with('message', 'User Registered Successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
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
