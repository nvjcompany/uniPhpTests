<html>
    <head>
        <meta charset="utf-8"/>
        <style>
        </style>
        <script>
            function LoadResults() {

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
            xmlhttp.open("GET","TableResultsAdmin",true);
            xmlhttp.send();
            return false;
            }
            
    function ViewStudentAwnsers(id) {
    var location = 'StudentAwnsers?studentId='+id;;
    //var myWindow = window.open(location, "MsgWindow", "width=800,height=1200");
    var myWindow = window.open(location);
    myWindow.onload.window.location.href=location;
    myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 100px tall!</p>");
}
var count = 0;
function TestTab()
{
            count++;
   
    
    if(count==3)
    {
        alert('Sorry');
        return false;
    }
     alert('Не гледай другаде!Ако продължиш тестът ще се изпрати автоматично!');

}
</script>
    </head>
    <body onblur="TestTab();">
        <button onclick="return LoadResults();">Зареди</button>
        <button onclick="window.location.href='exit';">Изход</button>
        <div style="width:250px;height:250px;background-color:red;" ></div>
        <div id="result"></div>
    </body>    
</html>