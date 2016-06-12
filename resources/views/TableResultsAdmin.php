<?php
$userResults = DB::table('users')
        ->join('students_result','users.id','=','students_result.student_id')
        ->select('users.id','users.fnum','students_result.result')
        ->orderBy('students_result.result','DESC')
        ->get();
?>
<html>
<head>
<style>
 
table {
    border-collapse: collapse;
    width: 50%;
    font-size:24px;
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
</head>
<body>
<table border="1" style="margin:0 auto;border-collapse: collapse;overflow:hidden;">
        <tr>
            <th>Факултетен номер</th>
            <th>Резултат</th>
            <th>Виж отговори</th>
        </tr>
        
        <?php
        foreach($userResults as $key=>$value)
        {
        ?>
        <tr>
            <td><?=$value->fnum?></td>
            <td
                <?php if($value->result<=50)
                {
                    echo 'style="background-color:#FF3333;"';
                }
                else if($value->result > 50 && $value->result < 80)
                {
                    echo 'style="background-color:#CCFF33;"';
                }
                else{
                    echo 'style="background-color:#33FF99;"';
                }                
                ?>
                
                ><?=$value->result?>%</td>
            <td><button onclick="ViewStudentAwnsers(<?=$value->id?>)">Виж</button></td>
        </tr>
        <?php
        }
        ?>
    </table>
 </body>
 <script>

 </script>
</html>