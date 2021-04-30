<!DOCTYPE html>
<html>
<head>
	<title>Cinema</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

		<script>
	  n  = window.location.href;
    function SingnUpOn(){
      
       window.location = n+"signup";

    }
    function LogIn(){
       
          window.location = n+"login";

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
        .inContainer{
			position: fixed;
            top: 0;
            width: 100%;
			display: flex;
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
		#button2{
			margin-left: 10px;
		
			background-color: white;
			color: black;}

       .bg-image {
       height: 100%;
       background-position: center;
       background-repeat: no-repeat;
       background-size: cover;
       }
      .img1 { background-image: url('{{ asset('img/rsz_ani1.jpg') }}'); }
      .img2 { background-image: url('{{ asset('img/ani2.jpg') }}');}
      .img3 { background-image: url('{{ asset('img/ani3.jpg') }}');}
      


  		
      
	</style>
</head>
<body>
    <div class="bg-image img1"></div>
    <div class="bg-image img2"></div>
    <div class="bg-image img3"></div>



    <div class="inContainer">
	           
	           <div class="button12"><button  type="button" class="btn btn-default button1" onclick="SingnUpOn()" style="display: none;" >Sign Up</button>
	           <button  type="button" id="button2" class="btn btn-default" onclick="LogIn()">Admin</button>
             <button  type="button" id="button2" class="btn btn-default"style="display: none;">User</button>
	           </div>
      </div>

  
</body>
</html>