<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
     public function search(Request  $request)
    { $this->validate($request, [
         'anime_search'=>'required'
    ]);
     $name = $request->input('anime_search');
       return  view('oneAnime',["aname" => $name]);
    }
       public function search2(Request  $request)
    { $this->validate($request, [
         'anime_s'=>'required'
    ]);
     $name = $request->input('anime_s');
       return  view('oneAnime',["aname" => $name]);
    }


 public function search3(Request  $request)
    { $this->validate($request, [
         'anime_search'=>'required'
    ]);
     $name = $request->input('anime_search');
       return  view('oneAnimeUser',["aname" => $name]);
    }
       public function search4(Request  $request)
    { $this->validate($request, [
         'anime_s'=>'required'
    ]);
     $name = $request->input('anime_s');
       return  view('oneAnimeUser',["aname" => $name]);
    }





  function del(Request $request){
    $this->validate($request, [
         'daid'=>'required',
    ]); 
    $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
      $id = $request->input('daid');
     
       $s = oci_parse($c, "begin anime_del_up.delete_anime(:bind1); end;");
        oci_bind_by_name($s, ":bind1", $id);
        oci_execute($s);
    return redirect('/al');
   
    
}
function upd(Request $request){
      $this->validate($request, [
         'ep'=>'required',
         'aid'=>'required'

    ]); 
      $c = oci_connect('hr', 'hr', 'localhost/XE','AL32UTF8');
          if (!$c) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
           } 
      $id = $request->input('aid');
      $ep = $request->input('ep');
      $s = oci_parse($c, "begin anime_del_up.update_episodes(:bind1,:bind2); end;");
      oci_bind_by_name($s, ":bind1", $id);
      oci_bind_by_name($s, ":bind2", $ep);
      oci_execute($s);
      oci_free_statement($s);
      oci_close($c);
      
      return back();
}
}
