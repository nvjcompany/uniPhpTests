<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\UserModel;

class UserLoginController extends Controller{
    
    public function CheckLoginDetails($username, $password)
    {
        if(UserModel::ValidateUserLogin($username, $password))
        {
                if(session('userId')!=1)
                {
                    return view('main');
                }
                else{
                    return view('AdministratorPage');
                }
              
        }
        
        return view('LogginPage', ['isLogginDetailsOK' => false]);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

