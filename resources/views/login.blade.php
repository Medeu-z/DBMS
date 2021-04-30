<!DOCTYPE html>
<html>
<head>
	<title>Cinema</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

		<script>
	 
    
     function overOffl(){
     	 n  = window.location.href;
       window.location.href = "http://localhost/animefp/public/test";
     	

    } 
    function onclickP() {
    var togglePassword = document.querySelector('#togglePassword');
    var password = document.querySelector('#pwd');
    var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
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
      

.bg1 {margin-top: 160px;
	  margin-left: 400px;
     display: block;
  background-color: hsla(0, 0%, 70%, 0.5);
  
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
            background-color: hsla(0, 0%, 0%, 0.8);
  			
  			padding-top: 10%;
  			padding-left: 20%;

  		}
  	
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
  		.w{
  			display: flex;

  		}
  		#togglePassword {
  			margin-top: 5px;
            margin-left: -25px;
            cursor: pointer;
         }
      
	</style>
</head>
<body>
    <div class="bg-image img1"></div>
    <div class="bg-image img2"></div>
    <div class="bg-image img3"></div>



    <div class="inContainer">
	           
	           
      </div>




	<!-- Check email and password are same or not in database -->
    <div id="overlay2" class="ov ov2">
    	<div class="bg1">
		<i  class="fa fa-close" style="color: black; float: right;" onclick="overOffl()" ></i>
 @if($message = Session::get('info'))
            
           <div class="alert alert-danger alert-block">
            <strong id="text">{{ $message }}</strong>
         </div>
         @endif
       <form action="{{  route('log')}}" method = "get" >
            {{ csrf_field() }}
		<div class="w"><p>Email:</p><input style="width: 50%;" type="email" name="emaill"></div>
		 <div class="w"><p>Password:</p><input style="width: 50%;" type="password" id="pwd" name="pwdl" required></div>
		 <div style="display: inline-flex;">
   
    <div>
      <button  id="lg" type="submit" name="select" class="btn btn-sm" style="background-color: black;color: white;margin-left: 5px;">Log in</button></div>
    </form>

      <div><button  type="button" class="btn btn-sm"  onclick="overOffl()" style="background-color:black;color: white;margin-left: 50px;">Cancel</button></div> 
      </div> 
        
       </div> 
    </div>


</body>
</html>