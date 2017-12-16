<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
class RegController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }
     public function store(RegistrationRequest $request)
    {
 	
    	$request->persist();

    	return redirect()->home();


    }
}
