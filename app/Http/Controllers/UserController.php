<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
        $users = User::all();
       return view('users.index', compact('users'));
   }

   public function show($id)
   {
    if (! $user = User::find($id))
     return redirect()->route('users.index');
//    $user = User::where('id', $id)->first();
    return view('users.show', compact('user'));
   }
}
