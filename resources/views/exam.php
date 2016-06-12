<?php 
if(Session::get('isValued')==1)
{
    die("Ne refreshvai stranicata pak ! ");
}
Session::put('isValued',1);
?>

<html>
    <head>
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    </head>
    <body >
        <?php
        ?>
            <form id="questionForm" action="Exam/Result" method="POST">
            <div class="row" style="width:100%;margin:0;padding:0;background-color:white;" >
                <?php
                $br=0;
                foreach($questions['question_text'] as $question)
                {
                    $questionId = $questions['id'][$br];
                ?>
                <div class="col-xs-6 col-sm-4" style="background-color:#008cba !important;height:50%;">
                    <div class="questions">
                        <strong><?=$br+1?>) <?=$question?></strong>
                        <?php 
                        foreach($questions['awnsers'][$questionId]['awnser_text'] as $key=>$awnserText)
                        {
                        ?>
                        <p><input type="radio" name="Awnser<?=$br+1?>" value="<?=$questions['awnsers'][$questionId]['awnser_id'][$key]?>" /><label><?=$awnserText?></label></p>
                        <input type="hidden" value="<?=$questionId?>" name="Question<?=$br+1?>" />
                        <?php
                        }
                        ?>
                    </div>
                    
                </div>
                <?php
                $br++;
                }
                
                ?>
                <input type="hidden" name="_token" value="<?=csrf_token();?>">
                <input type="submit" value="Предай!" style="float:right;margin-right:10%;" />
            </div>
        </form>
        <div>Registration closes in <span id="time"></span> minutes!</div>
    </body>
    <script>
        window.onload=function(){ 
            window.setTimeout(function() { document.getElementById('questionForm').submit(); }, 50000);
        };
        
        function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 12,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
    </script>
</html>