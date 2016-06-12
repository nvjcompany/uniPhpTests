<?php
$studentId = Request::input('studentId');
$studentAwnsers  = DB::table('students_awnsers')->where('students_awnsers.student_id','=',$studentId)
                                                ->join('awnsers','students_awnsers.awnser_id','=','awnsers.awnser_id')
                                                ->join('questions','questions.id','=','awnsers.question_id')
                                                ->join('users','users.id','=','students_awnsers.student_id')
                                                ->get();
?>
<html>
    <head><style>
 
table {
    border-collapse: collapse;
    width: 50%;
}

th, td {
    text-align: left;
    padding: 8px;
    text-align:center;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #008cba;
    color: white;
}
</style>
        <meta charset="utf-8" />
    </head>
    <body style="overflow:scroll;">
        <h1>Фак.Номер : <?=$studentAwnsers[0]->fnum?></h1>
        <table border="1">
            <tr>
                <th>Въпрос</th>
                <th>Отговор</th>  
            </tr>
            
            <?php 
            foreach($studentAwnsers as $key=>$value)
            {        
            ?>
            <tr>
                <td><?=$value->question?></td>
                <td <?=($value->isRight ==1 ? ' style="background-color:#33FF99;"' : 'style="background-color:#FF0000;"')?>><?=$value->awnser_text?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>