<?php     
          $conn = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } ?>
<!DOCTYPE html>
<html>
<head>
  <title>Cinema</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
  function animeN(){
      var n =  document.getElementById("anime_search").value;
      n1  = window.location;
       window.location = n1+"/"+n;
    }
    function out(){
       n  = window.location.href;
       window.location.href = "http://localhost/animefp/public/";
    } 
    function al(){
       n  = window.location.href;
       window.location.href = "http://localhost/animefp/public/al";
    }
    function overOn(){
      $("#overlay1").show();
      $("#overlay2").hide();
       $("#overlay3").hide();
     } 
        function overOffC(){
      $("#overlay1").hide();
    }
 

    function overOnD(){
        $("#overlay2").show();
        $("#overlay1").hide();
         $("#overlay3").hide();
    }
  
    function overOffD(){
      $("#overlay2").hide();
    }
     function overOnI(){
        $("#overlay3").show();
        $("#overlay1").hide();
         $("#overlay2").hide();
    }
  
    function overOffI(){
      $("#overlay3").hide();
    }
      
</script>
  <style type="text/css">
    body, html {
           height: 100%;
           margin: 0;
           font-family: Arial, Helvetica, sans-serif;
           }
         

           *{
           box-sizing: border-box;
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
  body{
    background-image: url('{{ asset('img/rsz_ani1.jpg') }}');
     background-repeat: no-repeat;
  background-attachment: fixed;
      
  }
  .class1{
      border-radius: 4px;
      box-shadow: 10px 20px 20px black;
      width: 95%;
      height: 60%;
      padding: 10px;
      background-color: white;
      padding-top: 30px;
      margin-bottom: 20px;
        }
    .hrc{
        margin-top: -8px;
        
      }
    .ch6{
      margin-left: 12px;
      margin-top: 2px;
     }
      .class4{
      margin-bottom: 5px;
      width: 100%;
      background-color: grey;
    }
      .butt{
      background-color: black;
      color: white;
      float: right;
      margin-right: 10px;
      }
      main{
      display: flex;
      flex-wrap: wrap;
      width: 700px;
      margin: 100px 0 0 100px;
      margin-right: 50px;
      padding: 30px 0 0 40px;
      background-color: hsla(0, 0%, 70%, 0.5);
       border-radius: 5px;
      }
      main div{
      display: flex;
      flex-direction: column; 
      
      color:black;
     
      margin: 15px; 
      padding: 5px;
      width: 90%;
      }
      img{
      border-radius: 10px;
      }
      .m{
       padding: 5px;
      }
      .m hr{background-color:white; height: 0.5px; margin-left: 93px;width: 50%; margin-top: -10px;}
      .w{display: inline-flex;}
    
      
      .m p{width: 100px;color: black; }
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
      .ov3{display: none;}
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
      .header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}


  </style>
</head>
<body>
      <header>
      <div><h3 style="color: white;">World Of Anime</h3></div>
        <div> 
                 <form action="{{  route('search')}}" method = "get"> {{ csrf_field() }}
                <input type="text" id="anime_search" name="anime_search" style="width: 400px;" value="Search anime..." required>
                <button class="btn btn-default" type="submit"><i class='fa fa-search' style="color: white;"></i></button>
              </form>
            
        </div>

    
        <a onclick="onmain()" >Main</a>
        <a onclick="al()" >AnimeList</a>
        <a  onclick="out()" style="width: 100px;">LogOut</a>
      
    </header>



  <div style="display: inline-flex;" >
    <main>
    <div style="display: flex;flex-direction: column;color: black;">
      <div style=""><h3>ABOUT US</h3></div>
      <hr class="class4" style="margin-top: -15px;">

      <h6 class="ch6">AnimeInfo is a web application where you can see popular anime and find information about them.</h6><hr class="hrc">
               <address style="float: left;">
         <b> CEO: </b><a href="https://en.wikipedia.org/wiki/Dustin_Moskovitz">Dustin Moskovitz</a><br>
         <b> Founded:</b> 2008<br>

  <!--  FIND TOTAL NUMBER OF ANIME AND ANIME TYPE   -->   
 <?php   
         $s = oci_parse($conn, "begin :ret :=anime_inf.totalAnimes();
                                      :ret1:=anime_inf.total_animeByType('TV'); 
                                      :ret2:=anime_inf.total_animeByType('OVA');
                                      :ret3:=anime_inf.total_animeByType('Movie');
                                      :ret4:=anime_inf.total_animeByType('Special');
                                     end;");
              oci_bind_by_name($s, ':ret', $r, 200);
              oci_bind_by_name($s, ':ret1', $r1, 200);
              oci_bind_by_name($s, ':ret2', $r2, 200);
              oci_bind_by_name($s, ':ret3', $r3, 200);
              oci_bind_by_name($s, ':ret4', $r4, 200);
              oci_execute($s, OCI_DEFAULT);
             ?>

          <b>Number of anime: </b><?php echo $r; ?><br>

<?php
oci_free_statement($s);
oci_close($conn);
?>

          <b>Users: </b>6k (2020)<br>
          
       </address>

              <div style="background-color: hsla(258, 39%, 44%, 0.2);" >
                <canvas id="Chart1" width="500" height="250"></canvas>
              </div>
            
         
            
    </div>
         
    </main>
<script type="text/javascript">
  

   var ctx = document.getElementById("Chart1");
   var myChart = new Chart(ctx, {
      type: 'pie',
         data: {
            labels: [
        'TV',
        'OVA',
        'Movie',
        'Special'
    ],
            datasets: [
               { label: "Anime Type",
               data:[<?php echo $r1; ?>, <?php echo $r2; ?>, <?php echo $r3; ?>,<?php echo $r4; ?>],
               backgroundColor :['rgba(75, 192, 192, 0.4)',
               'rgba(255, 129, 102, 0.4)',
               'rgba(234, 162, 235, 0.4)',
               'rgba(255, 206, 36, 0.4)',
               'rgba(153, 102, 255, 0.4)'
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
</script>
<!-- Aside -->
    <aside style="width: 30%;height: 50%;margin-top: 140px;margin-right: 5px;">
   <div class="m" style="background-color: hsla(0, 0%, 70%, 0.5); border-radius: 5px;">
     <div id="cont" style="padding-top:3%;width: 70%; ">  
      <div class="w" style="margin-top: -10px;margin-left: 180px;">
         <div class="button12">
          <button  type="button" class="btn btn-default butt" onclick="overOnI()" style="width: 110px;">Add Admin</button>
        <button class="btn" onclick="overOn()"><i class="fa fa-edit" aria-hidden="true" ></i></button>
        <button class="btn" onclick="overOnD()"> <i class="fa fa-trash" aria-hidden="true" ></i></button>
        
      </div></div>
    <div class="w"><p>First Name:</p><p id="FName"><?php  echo $fname;?></p></div>
    <br>
    <div class="w"><p>Last Name:</p><p id="LName"><?php  echo $lname;?></p></div>
    <br>
    <div class="w"><p>Email:</p><p id="Email"><?php  echo $email;?></p></div>
    <br>
    <div class="w"><p>BDay:</p><p id="PhonNumber"><?php  echo $bday;?></p></div>
    <br>

    

      </div>
  
 </div>


    </aside>

  </div>

 <!-- INSERT -->
    <!-- Account create, take values from input tag and insert to database. -->
  
  <div id="overlay3" class="ov ov3" >
  <div id="bg" class="bg1">
    <h3 style=" font-family:sans-serif;text-align: center;">Add new admin!</h3>
        <h6>Please fill in this form to create an account.</h6>
    <hr style="background-color:black; height: 0.5px; margin-top: -5px; ">
   
    <form action="{{  route('add')}}" method = "post" >
            {{ csrf_field() }}
    <div class="w"><p>First Name:</p><input style="width: 50%;"type="text" name="Fname" required></div>
    <div class="w"><p>Last Name:</p><input style="width: 50%;"type="text" name="Lname" required></div>
    <div class="w"><p>B'Day:</p><input style="width: 50%;" type="text" name="bday" required></div>
    <div class="w"><p>Email:</p><input style="width: 50%;" type="email" name="email" required></div>
    <div class="w"><p>Password:</p><input style="width: 50%;" type="text" id="pwd" name="pwd" required><i class="far fa-eye-slash" id="togglePassword" onclick="onclickP()"></i></div><br>
        <div style="display: inline-flex;">
          
          <div><button  type="submit" name="add" class="btn btn-sm" id="su" style="background-color: black;color: white;margin-left: 5px;">Add</button></div>
        </form>
       <button  type="button" class="btn btn-sm"  onclick="overOffI()" style="background-color:black;color: white;margin-left: 50px;">Cancel</button></div>
  </div>
  </div>




<!-- UPDATE -->
<div id="overlay1" class="ov1 ov" >
  <div id="bg" class="bg1">
   
        <h6>Please fill in this form to update an account.</h6>
    <hr style="background-color:black; height: 0.5px; margin-top: -5px; ">
   
    <form action="{{  route('upd')}}" method = "post" >
            {{ csrf_field() }}
            <input type="text" name="caremail" value="<?php echo $email ?>" style="display: none;">
    <div class="w"><p>First Name:</p><input style="width: 50%;"type="text" name="fname" required></div>
    <div class="w"><p>Last Name:</p><input style="width: 50%;"type="text" name="lname" required></div>
    <div class="w"><p>B'Day:</p><input style="width: 50%;" type="text" name="bday" required></div>
    <div class="w"><p>Email:</p><input style="width: 50%;" type="email" name="email" required></div>
    <div class="w"><p>Password:</p><input style="width: 50%;" type="text" id="pwd" name="pwdl" required><i class="far fa-eye-slash" id="togglePassword" onclick="onclickP()"></i></div>
        <div style="display: inline-flex;">
          
          <div><button  type="submit" name="add" class="btn btn-sm" id="su" style="background-color: black;color: white;margin-left: 5px;">Update</button></div>
        </form>
       <button  type="button" class="btn btn-sm"  onclick="overOffC()" style="background-color:black;color: white;margin-left: 50px;">Cancel</button></div>
  </div>
  </div>



<!-- DELETE -->
 <div id="overlay2" class="ov ov2">
      <div class="bg1">
    <h2 style=" font-family:sans-serif;text-align: center;">Confirm your action!</h2>
       
        
          <div style="display: inline-flex;">
            <div>
              <button type="button" class="btn btn-sm" onclick="overOffD()" style="background-color:white;color:black;margin-left:                               45px;">Cancel</button>
            </div>
           <div>
            <form action="{{  route('del')}}" method = "POST"> {{ csrf_field() }}
            <input type="text" name="delemail" value="<?php echo $email ?>" style="display: none;">
            <button  type="submit" class="btn btn-sm"  style="background-color: white;color: black;margin-left: 5px;">Delete</button>
            </form>
            </div>
            </div>
        </div>
    </div>

</body>
</html>