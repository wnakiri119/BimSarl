<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UsersController extends Controller
{
    //
    public function index()
    {
        return User::all();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return view('home');
    }

    public function registration($nom, $email, $password, $confirmation)
    {
        if ($password == $confirmation) {
            User::firstOrCreate(array(
                'name' => $nom,
                'email' => $email,
                'password' => Hash::make($password)
            ));

            return response("ok");
        } else {
            return response("verifier le mot de passe et la confirmation");
        }

        dd($nom);
    }

    public function connection($email, $password)
    {
        $user = User::whereRaw('email = ? and password = ?', array($email, $password))->get();

        if ($user) {
            return response("your are connected");
        } else {
            return response("connection failed. inspect youe datas!!");
        }
    }
}