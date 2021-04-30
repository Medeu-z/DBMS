<?php     
          $conn = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } ?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
    function out(){
       n  = window.location.href;
       window.location.href = "http://localhost/animefp/public/test";
    } 
    function overOn(){
      $("#overlay1").show();
     } 
      function overOffC(){
      $("#overlay1").hide();
    }
     function overAC(){
      alert("Your account successfully updeted!");
      $("#overlay1").hide();
    }

    function overOnD(){
        $("#overlay2").show();
    }
    function overAD(){
      alert("Your account successfully deleted!");
    }
    function overOffD(){
      $("#overlay2").hide();
    }
     function al(){
       n  = window.location.href;
       window.location.href = "http://localhost/animefp/public/test";
    }
   
</script>
  <style>
   body{
    background-image: url('{{ asset('img/rsz_ani1.jpg') }}');
     background-repeat: no-repeat;
  background-attachment: fixed;
      
  }
     header{
      position: fixed;
      top: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      background-color: RGBA(0,0,0,0.65);
      padding: 10px 10% 10px 10%;
      box-shadow:  0 2px 3px hsl(0, 0%, 85%);
    }
     .button12{
         display: flex;
         justify-content: flex-end;
         width: 100%;
         padding: 5px;
         }
          a{
            color: white;
          }
    .button1{
      background-color: white;
      color: black;
    }
      .butt{
      background-color: black;
      color: white;
      float: right;
      margin-right: 10px;
      }
   .m{
  
    width: 100%;
    background-color: hsla(0, 0%, 0%, 0.8);
    padding: 3%;
    display: inline-flex;
   }
   #cont{
    display: flex;
    flex-direction: column;
    color: white;
   }
   .w h3{
    margin-left: 30px;
   }
   .m hr{background-color:white; height: 0.5px; margin-left: 93px;width: 90%; margin-top: -10px;}
   .w{display: inline-flex;
    font-size: 0.8em;}
  
   p{
    width: 200px;
   }
   .bg1 {margin-top: 160px;
       margin-left: 400px;
         display: block;
         background-color: hsla(0, 0%, 70%, 0.7);
  
         border: 10px solid #f1f1f1;
         position: ; 
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         z-index: 2;width: 600px;
  
         padding: 20px;
         text-align: center;
} 
           .ov {
        position: fixed;
      
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: RGBA(0,0,0,0.65);
        padding-top: 10%;
        padding-left: 20%;

      }
      .ov1{display: none;}
      .ov2{display: none;}
      .ov input{
        
        margin-bottom: 10px;
        margin-left: 10px;
      }
      .ov select{
        
        margin-bottom: 10px;
        margin-left: 10px;
      }
      .ov p{
        border:solid 0px white;
        width: 100px;
        margin-right: 50px;
        
      }
  </style>
</head>
<body>  
 <header>
      <div><h3 style="color: white;">World Of Anime</h3></div>
        <div> 
                 <form action="{{  route('search3')}}" method = "get"> {{ csrf_field() }}
                <input type="text" id="anime_search" name="anime_search" style="width: 400px;"  placeholder="Search anime..." value="" required>
                <button class="btn btn-default" type="submit"><i class='fa fa-search' style="color: white;"></i></button>
              </form>
            
        </div>
        <a onclick="al()" >AnimeList</a>
       
    </header>
  
            


<div class="m" style="margin-top: 50px;">

      
          <div style="width: 30%;padding: 3%;"><?php
     
$sql = 'SELECT * FROM anime WHERE anime_name = :didbv';
$s = oci_parse($conn, $sql);
$didbv = $aname;
oci_bind_by_name($s, ':didbv', $didbv);
oci_execute($s, OCI_DEFAULT);

                while (oci_fetch($s)) {
                
                $id = oci_result($s, "ANIME_ID"); 
                $name =  oci_result($s, "ANIME_NAME");
                $jname =  oci_result($s, "JAPANESENAME");  
                $img =  oci_result($s, "IMAGE")->load();
                header("Content-type: image/jpeg");

                $score = oci_result($s, "SCORE");
                $genders = oci_result($s, "GENDERS");
                 $ep = oci_result($s, "EPISODES");

                  $duration = oci_result($s, "ANIME_DURATION");
                   $rating = oci_result($s, "RATING");
                  $pro = oci_result($s, "PRODUCERS");
               
               
                 $popul = oci_result($s, "POPULARITY");
                  $fav = oci_result($s, "FAVORITES");
                   $watch = oci_result($s, "WATCHING");
                    $COMPLETED = oci_result($s, "COMPLETED");
                    $onh = oci_result($s, "ONHOLD");
                    $drop = oci_result($s, "DROPPED");
                    $pw = oci_result($s, "PLANTOWATCH");
?> 
 <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="300px" height="300px"/><br>
 <!--  
     <div style="background-color: white;color: black;text-align: center;font-family: Arial, Helvetica, sans-serif; width: 70%;border-radius: 5px;margin-top: 10px;margin-left: 50px;"><h4 id="employeeID" ><?php echo $id ?></h4></div>
 -->
<div style="text-align: center;color: white;"><h5 id="FName"><?php echo $name ?></h5><?php echo $jname ?></div>
</div>    
             

<!-- INSERT -->
   <!-- take inserted attribites value from employee table and do document.getElementById("id").innerHTML to h3 tags  -->
   <div id="cont" style="padding-top:3%;width: 60%; margin-left: 50px;">
    <div class="w"><p>Producers:</p><h5 id="Email"><?php echo $pro ?></h5></div>
    <hr><br>
    <div class="w"><p>Rating:</p><h5 id="PhonNumber"><?php echo $rating ?></h5></div>
    <hr><br>
    <div class="w"><p>Duration time:</p><h5 id="CinemaID"><?php echo $duration ?></h5></div>
    <hr><br>
    <div class="w"><p>Genders: </p><h5 id="Profession"><?php echo $genders ?></h5></div>
    <hr><br>
    <div class="w"><p>Episodes:</p><h3 id="Experience"><?php echo $ep ?></h5></div>
    <hr><br>
    <div class="w"><p>Score: </p><h5 id="TotalS"><?php echo $score ?></h5></div>
    <hr><br>
     <div class="m" style="background-color: hsla(0, 5%, 80%, 0.9);width: 100%;">
    <canvas id="myChart" width="400" height="100">></canvas></div>
   </div> 

</div>
 
<script type="text/javascript">
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
      type: 'bar',
         data: {
            labels: ["Popularity","Favorites", "Watching" , "Completed" ,"Onhold", "Dropped", "PlanToWatch"],
            datasets: [
               { label: 'Anime info',
               data: [<?php echo $popul ?>,<?php echo $fav ?>,<?php echo $watch ?>,<?php echo $COMPLETED ?>,
                      <?php echo $onh ?>,<?php echo $drop ?>,<?php echo $pw ?>],
               backgroundColor :[
                'rgba(255, 229, 132, 1)',
               'rgba(234, 162, 35, 1)',
               'rgba(255, 129, 102, 1)',
               'rgba(234, 162, 235, 1)',
               'rgba(255, 206, 36, 1)',
               'rgba(75, 192, 192, 1)',
               'rgba(153, 102, 255, 1)'
            ],
         }
      ]
   },
   options: {
      scales: {
         yAxes: [{
            ticks: {
               beginAtZero:true
            }
         }]
      }
   }
});
</script><?php

            }
        
          ?>

   

</body>
</html>