<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{

    public function login(Request $request)
    {

      $username = $request->input('username');
      $password = $request->input('password');

      $status = User::where('username' , $username)->first();

      if ($status)
      {
        if(Hash::check($password,$status->password))
        {
          $res['status'] = "200";
          $res['message'] = "Login Success";
          return response($res);
        }
      }

      else
      {
        $res['status'] = "404";
        $res['message'] = "Invalid Username And Password";
        return response($res);
      }

    }

    public function register(Request $request)
    {

      $username = $request->input('username');
      $password = $request->input('password');

      $data = new User;
      $data->username = $username;
      $data->password = Hash::make($password);

      if ($data->save()) {
        $res['status'] = "200";
        $res['message'] = "Username Success Register";
        return response($res);
      }else {
        $res['status'] = "404";
        $res['message'] = "Something Wrong";
        return response($res);
      }

    }

      public function forgotPassword($username , Request $request)
      {

        $password = $request->input('password');
        $passwordBaru = Hash::make($password);

        $data = User::where('username' , $username)->first();
        $data->username = $username;
        $data->password = $passwordBaru;

        if ($data->save()) {
          $res['message'] = "Success Mengubah Data";
          return response($res);
        }else {
          $res['message'] = "Error 404";
          return response($res);
        }

      }



    }
