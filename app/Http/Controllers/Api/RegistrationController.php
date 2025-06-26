<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\RegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'sirname' => $request->input('sirname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'accept_terms' => $request->input('terms'),
                'birthdate' => $request->input('birthdate'),
                'country' => $request->input('country.sigla'),
                'hcaptcha_token' => $request->input('captcha.token'),
                'hcaptcha_ekey'=> $request->input('captcha.eKey'), 
                //'id' => Str::uuid7(),
                'sex' => $request->input('sex')
            ]);
            return response()->json(["success" => true], 200);
        } catch (Exception $e) {
            return response()->json(["success"=>false], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
