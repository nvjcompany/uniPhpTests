<?php
use App\Http\Controllers\UserLoginController;
use App\Questions;
use App\Awnsers;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get(('/'),function()
{
    
    if(session('userId')==1)
    {
        return view('AdministratorPage');
    }
    
    if(Session::has('isLogged') && (session('userId') !=1))
    {
        return view('main');
    }
    

    
    return view('LogginPage');
});

Route::get(('/AddUsers'),function()
{

});

Route::get(('/StudentAwnsers'),function()
{
    return view('StudentAwnsers');
});

Route::get('/Dashboard', function () {
    
    if(session('userId')==1)
    {
        return view('AdministratorPage');
    }
    
    if(Session::has('isLogged') && (session('userId') != 1))
    {
        return view('main');
    }
    
    
    
    return view('LogginPage');
});

Route::get('/Exam', function(){
    if(!Session::has('isLogged'))
    {
        die("404");
    }
    
    $arrQuestions = array();
    $arrAwnsers = array();
    $questions = Questions::orderByRaw ('rand()')->take(15)->skip(0)->get();

    foreach($questions as $question)
    {
        $arrQuestions['questions']['question_text'][]=$question->question;
        $arrQuestions['questions']['id'][]=$question->id;
        
        $awnsers = $question::find($question->id)->awnsers;
        $awnsers = json_decode($awnsers);
        foreach($awnsers as $awnser)
        {
            $arrQuestions['questions']['awnsers'][$question->id]['awnser_text'][]=$awnser->awnser_text;
            $arrQuestions['questions']['awnsers'][$question->id]['awnser_id'][]=$awnser->awnser_id;
        }
    }
    return view('exam',$arrQuestions);
});

Route::get(('/ViewResult'),function(){
    
    $id = Request::input('studentId');
    $student = DB::table('students_result')->where('student_id','=',$id)->first();
    $studentResultPercents = ($student->result).'%';
    $color = 'red';
    if($studentResultPercents >= 80)
    {
       $color = 'green';
    }
    else if($studentResultPercents>50 && $studentResultPercents<80)
    {
            $color = 'yellow';
    }
    else{
        $color = 'red';
    }
    
     echo '<div style="text-align:center;color:'.$color.';font-size:72px;text-shadow: 1px 1px black;">'. $studentResultPercents.'</div>';
});

Route::get(('/TableResultsAdmin'),function()
{
    if(session('userId') == 1)
    {
       return view('TableResultsAdmin'); 
    }
    
}
);

Route::post('/Dashboard',function()
{
    if(!Session::has('isLogged'))
    {
        $username = Request::input('username');
        $password = Request::input('password');
        $userLoginController = new UserLoginController();
        return $userLoginController->CheckLoginDetails($username, $password);
    }
});

Route::get(('/exit'),function()
{
    Session::forget('fNum');
    Session::forget('userId');
    Session::forget('isLogged');
    Session::forget('isStarted');
    Session::forget('isValued');
    return view('LogginPage');
});

Route::post('Exam/Result',function()
{   
    if(!Session::has('isLogged'))
    {
        die("404");
    }
    
    $Question1 = (int)$_POST['Question1'];
    $Question2 = (int)$_POST['Question2'];
    $Question3 = (int)$_POST['Question3'];
    $Question4 = (int)$_POST['Question4'];
    $Question5 = (int)$_POST['Question5'];
    $Question6 = (int)$_POST['Question6'];
    $Question7 = (int)$_POST['Question7'];
    $Question8 = (int)$_POST['Question8'];
    $Question9 = (int)$_POST['Question9'];
    $Question10 = (int)$_POST['Question10'];
    $Question11 = (int)$_POST['Question11'];
    $Question12 = (int)$_POST['Question12'];
    $Question13 = (int)$_POST['Question13'];
    $Question14 = (int)$_POST['Question14'];
    $Question15 = (int)$_POST['Question15'];
    
    
    $Awnser1 = (isset($_POST['Awnser1']) ? (int)$_POST['Awnser1'] : null);
    $Awnser2 = (isset($_POST['Awnser2']) ? (int)$_POST['Awnser2'] : null);
    $Awnser3 = (isset($_POST['Awnser3']) ? (int)$_POST['Awnser3'] : null);
    $Awnser4 = (isset($_POST['Awnser4']) ? (int)$_POST['Awnser4'] : null);
    $Awnser5 = (isset($_POST['Awnser5']) ? (int)$_POST['Awnser5'] : null);
    $Awnser6 = (isset($_POST['Awnser6']) ? (int)$_POST['Awnser6'] : null);
    $Awnser7 = (isset($_POST['Awnser7']) ? (int)$_POST['Awnser7'] : null);
    $Awnser8 = (isset($_POST['Awnser8']) ? (int)$_POST['Awnser8'] : null);
    $Awnser9 = (isset($_POST['Awnser9']) ? (int)$_POST['Awnser9'] : null);
    $Awnser10 = (isset($_POST['Awnser10']) ? (int)$_POST['Awnser10'] : null);
    $Awnser11 = (isset($_POST['Awnser11']) ? (int)$_POST['Awnser11'] : null);
    $Awnser12 = (isset($_POST['Awnser12']) ? (int)$_POST['Awnser12'] : null);
    $Awnser13 = (isset($_POST['Awnser13']) ? (int)$_POST['Awnser13'] : null);
    $Awnser14 = (isset($_POST['Awnser14']) ? (int)$_POST['Awnser14'] : null);
    $Awnser15 = (isset($_POST['Awnser15']) ? (int)$_POST['Awnser15'] : null);
    $numRightAwnsers = DB::select(DB::raw("SELECT COUNT(isRight) as RightAwnsers FROM `awnsers` WHERE awnser_id IN ('$Awnser1', '$Awnser2', '$Awnser3','$Awnser4','$Awnser5','$Awnser6', '$Awnser7', '$Awnser8','$Awnser9','$Awnser10','$Awnser11', '$Awnser12', '$Awnser13','$Awnser14','$Awnser15')&&isRight=1"));
    $studentResult = round(($numRightAwnsers[0]->RightAwnsers/15),2)*100;
    
    $userId = Session::get('userId');
    DB::table('students_awnsers')->insert([
    ['student_id' => $userId, 'question_id' => $Question1, 'awnser_id' => $Awnser1],
    ['student_id' => $userId, 'question_id' => $Question2, 'awnser_id' => $Awnser2],
    ['student_id' => $userId, 'question_id' => $Question3, 'awnser_id' => $Awnser3],
    ['student_id' => $userId, 'question_id' => $Question4, 'awnser_id' => $Awnser4],
    ['student_id' => $userId, 'question_id' => $Question5, 'awnser_id' => $Awnser5],
    ['student_id' => $userId, 'question_id' => $Question6, 'awnser_id' => $Awnser6],
    ['student_id' => $userId, 'question_id' => $Question7, 'awnser_id' => $Awnser7],
    ['student_id' => $userId, 'question_id' => $Question8, 'awnser_id' => $Awnser8],
    ['student_id' => $userId, 'question_id' => $Question9, 'awnser_id' => $Awnser9],
    ['student_id' => $userId, 'question_id' => $Question10, 'awnser_id' => $Awnser10],
    ['student_id' => $userId, 'question_id' => $Question11, 'awnser_id' => $Awnser11],
    ['student_id' => $userId, 'question_id' => $Question12, 'awnser_id' => $Awnser12],
    ['student_id' => $userId, 'question_id' => $Question13, 'awnser_id' => $Awnser13],
    ['student_id' => $userId, 'question_id' => $Question14, 'awnser_id' => $Awnser14],
    ['student_id' => $userId, 'question_id' => $Question15, 'awnser_id' => $Awnser15]
    ]);
    
    DB::table('students_result')->insert(
            [
                ['student_id' => $userId, 'result' => $studentResult]
            ]);
    DB::table('users')
        ->where('id',$userId)
            ->update(['isValued' => 1]);
    Session::put('isValued',1);
    $studentResults['studentResult']=$studentResult;
    if($studentResult<50)
    {
        return view('fail',$studentResults);
    }
    else if($studentResult>=50 && $studentResult<80)
    {
        return view('pass',$studentResults);
    }
    else
    {
        return view('succes',$studentResults);
    }
});
