<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{

    public function index(){
        $users = User::all();
        return view('user', compact('users'));
    }

    public function store(Request $request){

        $file = Input::file('imagem');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->imagem = $img;
        $user->password = $request['password'];

        $user->save();

        return redirect()->route('user');

    }


    public function image($id){
        $user = User::find($id);

        $pic = Image::make($user->imagem);
        $response = Response::make($pic->encode('jpeg'));
        $response->header('Content-Type','image/jpeg');

        return $response;

    }


}
