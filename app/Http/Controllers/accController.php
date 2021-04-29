<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accController extends Controller
{
    function add(Request $request){
      $this->validate($request, [
         'Fname'=>'required',
         'Lname'=>'required',
         'bday'=>'required',
         'email'=>'required',
         'pwd'=>'required'
    ]); 
      $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
	  $email = $request->input('email');
      $fname = $request->input('Fname');
      $lname = $request->input('Lname');
      $bday  = $request->input('bday');
      $psw   = $request->input('pwd');
      $s = oci_parse($c, "begin insert_ad(:bind1, :bind2, :bind3, :bind4, :bind5); end;");
      oci_bind_by_name($s, ":bind1", $email);
      oci_bind_by_name($s, ":bind2", $fname);
      oci_bind_by_name($s, ":bind3", $lname);
      oci_bind_by_name($s, ":bind4", $bday);
      oci_bind_by_name($s, ":bind5", $psw);
      oci_execute($s);
      oci_free_statement($s);
      oci_close($c);
      
      /*return view("login");*/
      return back();
}
function log(Request $request){
	$this->validate($request, [
         'emaill'=>'required',
         'pwdl'=>'required'
    ]); 
    $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
	  $email = $request->input('emaill');
      $psw   = $request->input('pwdl');
       $s = oci_parse($c, "select * from useracc where u_email=:bind1 and psw = :bind5");
        oci_bind_by_name($s, ":bind1", $email);
      oci_bind_by_name($s, ":bind5", $psw);
        oci_execute($s, OCI_DEFAULT);
       $var = 0;
         while (oci_fetch($s)) {
         	$var +=1;
         	 $fname = oci_result($s, "F_NAME");
             $lname = oci_result($s, "L_NAME");
             $bday  = oci_result($s, "BDAY");
   }
   if ($var > 0) {
    return view("mainp",["email" => $email,"fname" => $fname,"lname" => $lname,"bday" => $bday]);
    oci_free_statement($s);
      oci_close($c);
   }else{
      return back()->with('info', 'Wrong Login Details');
   }
   
    
}
function del(Request $request){
	$this->validate($request, [
         'delemail'=>'required',
    ]); 
    $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
	  $email = $request->input('delemail');
     
       $s = oci_parse($c, "DELETE FROM useracc where u_email=:bind1");
        oci_bind_by_name($s, ":bind1", $email);
        oci_execute($s);
    return redirect('/');
   
    
}
function upd(Request $request){
      $this->validate($request, [
         'fname'=>'required',
         'lname'=>'required',
         'bday'=>'required',
         'email'=>'required',
         'caremail'=>'required',
         'pwdl'=>'required'
    ]); 
      $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
      $caremail = $request->input('caremail');
	  $email = $request->input('email');
      $fname = $request->input('fname');
      $lname = $request->input('lname');
      $bday  = $request->input('bday');
      $psw   = $request->input('pwdl');
      $s = oci_parse($c, "UPDATE useracc
SET u_email =:bind1 , f_name =:bind2 , l_name =:bind3 ,bday =:bind4 ,psw =:bind5
WHERE u_email=:bind6");
      oci_bind_by_name($s, ":bind1", $email);
      oci_bind_by_name($s, ":bind2", $fname);
      oci_bind_by_name($s, ":bind3", $lname);
      oci_bind_by_name($s, ":bind4", $bday);
      oci_bind_by_name($s, ":bind5", $psw);
      oci_bind_by_name($s, ":bind6", $caremail);
      oci_execute($s);
      oci_free_statement($s);
      oci_close($c);
      
      return back();
}
}
