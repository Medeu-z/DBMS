<?php 
$last_id=0;
function conect(){
	 $conn = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
	return  $conn;
}
function add($email,$fname,$lname,$bday,$psw){
	  $c=conect();
      $s = oci_parse($c, "insert into useracc values (:bind1, :bind2, :bind3, :bind4, :bind5)");
      oci_bind_by_name($s, ":bind1", $email);
      oci_bind_by_name($s, ":bind2", $fname);
      oci_bind_by_name($s, ":bind3", $lname);
      oci_bind_by_name($s, ":bind4", $bday);
      oci_bind_by_name($s, ":bind5", $psw);
      oci_execute($s, OCI_DEFAULT);
      oci_free_statement($s);
      oci_close($c);
      return view('anime');
}







$page = 'home.blade.php';
if(isset($_GET['add'])) { 
            add($_GET['email'],$_GET['Fname'],$_GET['Lname'],$_GET['bday'],$_GET['pwd']);
            header('location: '.$page);

        } 



?>