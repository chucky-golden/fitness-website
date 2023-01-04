<!DOCTYPE html>
<html>
<head>
	<title>Mabs Fitness</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/log.css">
    <link rel="stylesheet" type="text/css" href="css/hover.css">
</head>

<body>


<div class="questions">
   <div class="q1" id="q1">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>1/6</p>
       <li> <button id="q11">I'm not ready to commit fully</button> </li>
       <li> <button id="q12"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q13">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="q1" id="q2">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>2/6</p>
       <li> <button id="q21">I'm not ready to commit fully</button> </li>
       <li> <button id="q22"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q23">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="q1" id="q3">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>3/6</p>
       <li> <button id="q31">I'm not ready to commit fully</button> </li>
       <li> <button id="q32"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q33">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="q1" id="q4">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>4/6</p>
       <li> <button id="q41">I'm not ready to commit fully</button> </li>
       <li> <button id="q42"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q43">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="q1" id="q5">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>5/6</p>
       <li> <button id="q51">I'm not ready to commit fully</button> </li>
       <li> <button id="q52"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q53">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="q1" id="q6">
     <center> 
      <h3>How committed are you to your weight loss goals</h3>
      <p>6/6</p>
       <li> <button id="q61">I'm not ready to commit fully</button> </li>
       <li> <button id="q62"> I'm ready to commit but i have struggles</button> </li>
       <li> <button id="q63">I'm very ready to commit fully</button> </li>
      </center>
   </div>

   <div class="op_1" id="q7">
     <center> 
      <h3>Your answers have been analyzed and a program has been chosen</h3>
       <center> <img src="img/figure.png"> </center>
       <h4>The 21 Days Program is the one for you.</h4>
       <a href="package1.php"> REGISTER</a>
      </center>
   </div>

   <div class="op_2" id="q8">
     <center> 
      <h3>Your answers have been analyzed and a program has been chosen</h3>
       <center> <img src="img/dumb.png"> </center>
       <h4>The 28 Days Program is the one for you.</h4>
       <a href="package2.php"> REGISTER</a>
      </center>
   </div>

   <div class="op_3" id="q9">
     <center> 
      <h3>Your answers have been analyzed and a program has been chosen</h3>
       <center> <img src="img/band.png"> </center>
       <h4>The 31 Days Program is the one for you.</h4>
       <a href="package3.php"> REGISTER</a>
      </center>
   </div>

</div>







<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
  $(document).ready(function(){
    $("#q2").hide();
    $("#q3").hide();
    $("#q4").hide();
    $("#q5").hide();
    $("#q6").hide();
    $("#q7").hide();
    $("#q8").hide();
    $("#q9").hide();
    $("#q11, #q12, #q13").click(function(){
      $("#q1").hide();
      $("#q2").fadeIn(500);
    });
     $("#q21, #q22, #q23").click(function(){
      $("#q2").hide();
      $("#q3").fadeIn(500);
    });
      $("#q31, #q32, #q33").click(function(){
      $("#q3").hide();
      $("#q4").fadeIn(500);
    });
       $("#q41, #q42, #q43").click(function(){
      $("#q4").hide();
      $("#q5").fadeIn(500);
    });
        $("#q51, #q52, #q53").click(function(){
      $("#q5").hide();
      $("#q6").fadeIn(500);
    });
         $("#q61").click(function(){
      $("#q6").hide();
      $("#q8").fadeIn(500);
    });
          $("#q62").click(function(){
      $("#q6").hide();
      $("#q9").fadeIn(500);
    });
           $("#q63").click(function(){
      $("#q6").hide();
      $("#q7").fadeIn(500);
    });
  });
</script>
</body>
</html>




