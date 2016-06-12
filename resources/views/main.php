<html>
	<head>
		<meta charset="utf-8" >
		<link rel="stylesheet" href="css/styles.css" type="text/css" >
                <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.2.min.js"></script>
	</head>
	<body>
		<div id="studentDashboard" <?php if(session('userId')==1) echo 'style="height:1000px;"'?>>
			<div id="studentInfo" <?php if(session('userId')==1) echo 'style="display:none;"'?>>
                            <img src="images/avatar.png">
                            <p><h2>Име Презиме Фамилия</h2></p>
                            <p><h3><?=session('fNum')?></h3></p>
                            <p><button class="buttonBlue" id="exit">Изход</button></p>
			</div>
			<div id="rightStudentDashboard">
				<div style="padding-top:150px;">
                                    <?php if(session('isValued') == 0)
                                    {
                                    ?>
                                        <button id="phpTest" class="buttonBlue" style="margin:15px auto;display:block;width:400px;height:200px;font-size:42px !important;">Започни тестa по PHP & MYSQL!</button>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <?php if(session('userId') != 1)
                                        {
                                           ?>
                                        <button onclick="return ShowResult(<?=session('userId')?>)" id="viewResult" class="buttonBlue" style="margin:15px auto;display:block;width:400px;height:200px;font-size:42px !important;">Виж резултата си!</button>
                                        <?php  } ?>
                                    <?php
                                    }
                                    
                                    if(session('userId') == 1)
                                    {
                                        ?>
                                        <button onclick="return ShowResult(<?=session('userId')?>)">Обнови резултатите</button>
                                        <?php 
                                    }
                                    ?>
                                        <div id="result"></div>
				</div>
			</div>
		</div>
	</body>
        <script>
            $('#exit').click(function()
            {
                window.location.href = 'exit';
            });
            
            $('#phpTest').click(function()
            {
                window.location.href='Exam';
            }
            );
    
            /*$('#viewResult').click(function()
            {
                window.location.href='Dashboard/Results';
            }
            );*/
        function ShowResult(str) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("result").innerHTML = xmlhttp.responseText;
            }
        };
        //xmlhttp.open("GET","pass.php?q="+str,true);
        if(str != 1)
        {
        xmlhttp.open("GET","ViewResult?studentId="+str,true);
        }
        xmlhttp.send();
	return false;
}
        </script>
</html>