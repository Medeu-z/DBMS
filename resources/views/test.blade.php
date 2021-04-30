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
    function LogIn(){
       
          window.location = "http://localhost/animefp/public/login";

    }
   
    function overOn(){
      $("#overlay1").show();
      $("#overlay2").hide();
     } 
        function overOffC(){
      $("#overlay1").hide();
    }
 

    function overOnD(){
        $("#overlay2").show();
        $("#overlay1").hide();
    }
  
    function overOffD(){
      $("#overlay2").hide();
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
        width: 65%;
      margin: 100px 0 0 100px;
      padding: 30px 0 0 40px;
         background-color: hsla(0, 0%, 70%, 0.5);
         display: flex;
         flex-direction: column;
         
         color: white;
      }
      .main{
      display: flex;
      flex-wrap: wrap;
      

      }
      .maindiv{
      display: flex;
      flex-direction: column; 
       background-color: hsla(258, 39%, 44%, 0.5);
      color:white;
      border-radius: 10px;
      text-align: center;
      margin: 15px; 
      padding: 5px;
      width: 210px;
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
       li{
        width: 100%;
        margin-bottom: 3px;
        background-color: white;
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
        <button  type="button" id="button2" class="btn btn-default" onclick="LogIn()">Admin</button>
    </header>



  <div style="display: inline-flex;" >
    
     <main>
      <div style="display: flex;flex-direction: column;color: black;">
      <div style=""><h3>ABOUT US</h3></div>
      <hr class="class4" style="margin-top: 5px;">

      <h6 class="ch6" style="background-color: white;">AnimeInfo is a web application where you can see popular anime and find information about them.</h6><hr class="hrc">
            <div style="display: inline-flex;">   <address style="margin-right: 5px;">
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

?>

          <b>Users: </b>6k (2020)<br>
          
       </address>
               

              <div style="background-color: hsla(258, 39%, 44%, 0.2);margin-top: -10px; " >
               <div style="text-align: center;">  <h4>Types of Anime</h4></div>
                <canvas id="Chart1" width="500" height="250"></canvas>
              </div>
            </div>
         
            
    </div>

      <div> <h3>TOP-18 Anime</h3></div>
      <hr class="class4" style="margin-top: 5px;">
    <div class="main" id="TOP-18_pop">
    <?php
    $curs1 = oci_new_cursor($conn);
    $stid1 = oci_parse($conn, "begin  top_anime.top_anime_18(:cursbv); end;");
    oci_bind_by_name($stid1, ":cursbv", $curs1, -1, OCI_B_CURSOR);
    oci_execute($stid1);
    oci_execute($curs1);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid1);
    oci_free_statement($curs1);?>
         </div> 


         <div class="main" id="top_anime_ep_max" style="display: none;">
    <?php
    $curs2 = oci_new_cursor($conn);
    $stid2 = oci_parse($conn, "begin   top_sorted_anime.top_anime_max_ep(:cursb); end;");
    oci_bind_by_name($stid2, ":cursb", $curs2, -1, OCI_B_CURSOR);
    oci_execute($stid2);
    oci_execute($curs2);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs2, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid2);
    oci_free_statement($curs2);?>
  </div> 
         <div class="main" id="top_anime_ep_min" style="display: none;">
       
    <?php
    $curs3 = oci_new_cursor($conn);
    $stid3 = oci_parse($conn, "begin   top_sorted_anime.top_anime_min_ep(:curs); end;");
    oci_bind_by_name($stid3, ":curs", $curs3, -1, OCI_B_CURSOR);
    oci_execute($stid3);
    oci_execute($curs3);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs3, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid3);
    oci_free_statement($curs3);?>
          </div> 
         <div class="main" id="top_anime_reting17" style="display: none;">
    <?php
    $b = "R - 17+ (violence & profanity)";
    $curs4 = oci_new_cursor($conn);
    $stid4 = oci_parse($conn, "begin   top_sorted_anime.top_anime_rating(:bind2,:cursr); end;");
    oci_bind_by_name($stid4, ":cursr", $curs4, -1, OCI_B_CURSOR);
    oci_bind_by_name($stid4, ":bind2",$b);
    oci_execute($stid4);
    oci_execute($curs4);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs4, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid4);
    oci_free_statement($curs4);?>
         </div>  

          <div class="main" id="top_anime_reting" style="display: none;">
    <?php
    $b = "R+ - Mild Nudity";
    $curs4 = oci_new_cursor($conn);
    $stid4 = oci_parse($conn, "begin   top_sorted_anime.top_anime_rating(:bind2,:cursr); end;");
    oci_bind_by_name($stid4, ":cursr", $curs4, -1, OCI_B_CURSOR);
    oci_bind_by_name($stid4, ":bind2",$b);
    oci_execute($stid4);
    oci_execute($curs4);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs4, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid4);
    oci_free_statement($curs4);?>
         </div>  


          <div class="main" id="top_anime_reting13" style="display: none;">
    <?php
    $b = "PG-13 - Teens 13 or older";
    $curs4 = oci_new_cursor($conn);
    $stid4 = oci_parse($conn, "begin   top_sorted_anime.top_anime_rating(:bind2,:cursr); end;");
    oci_bind_by_name($stid4, ":cursr", $curs4, -1, OCI_B_CURSOR);
    oci_bind_by_name($stid4, ":bind2",$b);
    oci_execute($stid4);
    oci_execute($curs4);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs4, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid4);
    oci_free_statement($curs4);?>
         </div>
           <div class="main" id="onad" style="display: none;">
    <?php
    $b = "Adventure";
    $curs4 = oci_new_cursor($conn);
    $stid4 = oci_parse($conn, "begin   top_sorted_anime.TOP_ANIME_GENDERS(:bind2,:cursr); end;");
    oci_bind_by_name($stid4, ":cursr", $curs4, -1, OCI_B_CURSOR);
    oci_bind_by_name($stid4, ":bind2",$b);
    oci_execute($stid4);
    oci_execute($curs4);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs4, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid4);
    oci_free_statement($curs4);?>
         </div>  
           <div class="main" id="onac" style="display: none;"> 
    <?php
    $b = "Action";
    $curs4 = oci_new_cursor($conn);
    $stid4 = oci_parse($conn, "begin   top_sorted_anime.TOP_ANIME_GENDERS(:bind2,:cursr); end;");
    oci_bind_by_name($stid4, ":cursr", $curs4, -1, OCI_B_CURSOR);
    oci_bind_by_name($stid4, ":bind2",$b);
    oci_execute($stid4);
    oci_execute($curs4);  // Execute the REF CURSOR like a normal statement id
    while (($row = oci_fetch_array($curs4, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    $id = $row['ANIME_ID'];
                $name =  $row['ANIME_NAME'];
                $jname =  $row['JAPANESENAME'];
                $img =  $row['IMAGE']->load();
                header("Content-type: image/jpeg");

                
         ?>
       
               <div class="maindiv">
                <form action="{{  route('search4')}}" method = "get"> 
                {{ csrf_field() }}
                <input type="text"  name="anime_s" style="display: none;" value="<?php echo $name ?>" required>
                <button type="submit" class="btn" style="float: right;"><i class="fa fa-sign-in" aria-hidden="true"></i></button> </form>
              <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="200px" height="150px"/>
             
                <h6><?php echo $name ?></h6>
                <h6><?php echo $jname ?></h6>  
               
          </div>

              <?php
    }

    oci_free_statement($stid4);
    oci_free_statement($curs4);?>
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


<script type="text/javascript">
  function ons(){
              $("#id2").toggle();
              $("#id1").toggle();
              $("#sort").toggle();
  } function ons1(){
              $("#id3").toggle();
              $("#id4").toggle();
              $("#sort1").toggle();
  }
  function ons2(){
              $("#id5").toggle();
              $("#id6").toggle();
              $("#sort2").toggle();
  }
  function ons3(){
              $("#id7").toggle();
              $("#id8").toggle();
              $("#sort3").toggle();
  }
   function ons4(){
              $("#11").toggle();
              $("#12").toggle();
              $("#TOP-18_pop").show();
              $("#top_anime_ep_min").hide();
               $("#top_anime_ep_max").hide();
                  $("#top_anime_reting13").hide();
              
  }
  function onac(){
    $("#onac").show();
    $("#top_anime_ep_max").hide();
    $("#TOP-18_pop").hide();
    $("#top_anime_ep_min").hide();
    $("#top_anime_reting13").hide();
    $("#top_anime_reting17").hide();
    $("#top_anime_reting").hide();
  }
  function onad(){
    $("#onad").show();
    $("#top_anime_ep_max").hide();
    $("#TOP-18_pop").hide();
    $("#top_anime_ep_min").hide();
    $("#top_anime_reting13").hide();
    $("#top_anime_reting17").hide();
    $("#top_anime_reting").hide();

  }
  function maxep(){
    $("#top_anime_ep_max").show();
    $("#TOP-18_pop").hide();
    $("#top_anime_ep_min").hide();
    $("#top_anime_reting13").hide();
    $("#top_anime_reting17").hide();
    $("#top_anime_reting").hide();
    $("#onad").hide();
    $("#onac").hide();
  }
  function minep(){
    $("#top_anime_ep_min").show();
    $("#top_anime_ep_max").hide();
    $("#TOP-18_pop").hide();
    $("#top_anime_reting13").hide();
    $("#top_anime_reting17").hide();
    $("#top_anime_reting").hide();
    $("#onad").hide();
    $("#onac").hide();
  }
  function r13(){
     $("#top_anime_reting13").show();
     $("#top_anime_ep_max").hide();
     $("#TOP-18_pop").hide();
     $("#top_anime_ep_min").hide();
     $("#top_anime_reting17").hide();
     $("#top_anime_reting").hide();
     $("#onad").hide();
     $("#onac").hide();
  }
  function r17(){
     $("#top_anime_reting17").show();
     $("#top_anime_reting").hide();
     $("#top_anime_reting13").hide();
     $("#top_anime_ep_max").hide();
     $("#TOP-18_pop").hide();
     $("#top_anime_ep_min").hide();
     $("#onad").hide();
     $("#onac").hide();
  }
  function r(){
     $("#top_anime_reting").show();
     $("#top_anime_reting17").hide();
     $("#top_anime_reting13").hide();
     $("#top_anime_ep_max").hide();
     $("#TOP-18_pop").hide();
     $("#top_anime_ep_min").hide();
     $("#onad").hide();
     $("#onac").hide();
  }
 
</script>
<!-- Aside -->
    <aside style="width: 30%;height: 50%;margin-top: 100px;margin-right: 10px;margin-left: 10px;">
  
    <div class="m" style="background-color: hsla(0, 0%, 70%, 0.5); border-radius: 5px;">
      <div>
        <h3>Best anime</h3>
        <?php
        $s = oci_parse($conn, "Select * from anime where anime_name='Naruto'");
        oci_execute($s, OCI_DEFAULT);
        while (oci_fetch($s)) {
                $name =  oci_result($s, "ANIME_NAME");
                $img =  oci_result($s, "IMAGE")->load();
                header("Content-type: image/jpeg");
                $jname =  oci_result($s,"JAPANESENAME");
                
        ?>
        <div class="maindiv" style="width: 100%;justify-content: center;margin-left: 0px;padding-left: 50px;">
         <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" width="250px" height="300px"/>
             
                <h6 style="margin-left: -20px;"> <?php echo $name ?> <?php echo $jname ?></h6>
                <h6></h6>
          </div>
 
              <?php
         }

         oci_free_statement($s);
        ?>
      </div>

      <h2>Anime Sort</h2>
      <div onclick="ons4()">TOP-18 Anime <i id="id11" class="fa fa-angle-right" style="float: right;margin-right: 10px; font-size:26px;"></i>
                         <i id="id12" class=" fa fa-angle-down" style="float: right;margin-right: 10px; font-size:26px;display: none;"></i>
                        <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 15px;" >   </div>
     <div onclick="ons()">Anime by genre <i id="id1" class="fa fa-angle-right" style="float: right;margin-right: 10px; font-size:26px;"></i>
                         <i id="id2" class=" fa fa-angle-down" style="float: right;margin-right: 10px; font-size:26px;display: none;"></i></div>
       <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 3px;" >                  
      <div class="sort" id="sort" style="display: none;">
        <li onclick="onad()">Adventure</li>
        <li onclick="onac()">Action</li>
        <li>Comedy</li>
        <li>Drama</li>
        <li>Demons</li>
        <li>Fantasy</li>
        <li>Historical</li>
        <li>Horror</li>
        <li>Game</li>
        <li>Kids</li>
        <li>Magic</li>
        <li>Mystery</li> 
        <li>Romance</li>
        <li>Sci-Fi</li>
        <li>School</li>
        <li>Supernatural</li> 
        <li>Sports</li>
        <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 15px;" >   
      </div>

      <div onclick="ons1()">Anime by number of episode <i id="id3" class="fa fa-angle-right" style="float: right;margin-right: 10px; font-size:26px;"></i>
                         <i id="id4" class=" fa fa-angle-down" style="float: right;margin-right: 10px; font-size:26px;display: none;"></i></div>
       <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 3px;" >                  
      <div class="sort1" id="sort1" style="display: none;">
        <li onclick="maxep()">Maximum episode</li>
        <li onclick="minep()">Minimum episode</li>
        <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 15px;" >   
      </div>
      
      <div >Anime by duration time<i id="id5"onclick="ons2()" class="fa fa-angle-right" style="float: right;margin-right: 10px; font-size:26px;"></i>
                         <i id="id6" onclick="ons2()" class=" fa fa-angle-down" style="float: right;margin-right: 10px; font-size:26px;display: none;"></i></div>
       <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 3px;" >                  
      <div class="sort2" id="sort2" style="display: none;">
        <li >per episode  <strong>maximum</strong> duartion time 30 min</li>
        <li >per episode <strong>minimum</strong> duartion time 30 min</li>
        <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 15px;" >   
      </div>
       <div onclick="ons3()">Anime by rating<i id="id7" class="fa fa-angle-right" style="float: right;margin-right: 10px; font-size:26px;"></i>
                         <i id="id8" class=" fa fa-angle-down" style="float: right;margin-right: 10px; font-size:26px;display: none;"></i></div>
       <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 3px;" >                  
      <div class="sort3" id="sort3" style="display: none;">
        <li onclick="r13()">PG-13 - Teens 13 or older</li>
        <li onclick="r17()">R - 17+ (violence & profanity)</li>
        <li onclick="r()">R+ - Mild Nudity</li>
        <hr class="hrc" style="width: 100%; margin-left: 0;margin-top: 15px;" >   
      </div>
       


    </div>

    </aside>

  </div>


</body>
</html>