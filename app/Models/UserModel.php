<?php
namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class UserModel extends Model{
    
    public static function ValidateUserLogin($username, $password)
    {
        $user = DB::table('users')->where('username','=',$username)->where('password','=',$password)->first();        
        if($user != null)
        {
            DB::table('users')
                    ->where('id',$user->id)
                    ->update(['isLogged' => 1]);
            session(['isLogged' => '1','fNum'=>$user->fnum]);
            Session::put('userId',$user->id);
            Session::put('isLogged', '1');
            Session::put('isValued', $user->isValued);
            return true;
        }
        
        return false;
    }
}
