<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.6.2
*/error_reporting(6135);$lc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($lc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$xg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($xg)$$X=$xg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($v){$rd=substr($v,-1);return
str_replace($rd.$rd,$rd,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Ge,$lc=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($Ge)){foreach($X
as$id=>$W){unset($Ge[$z][$id]);if(is_array($W)){$Ge[$z][stripslashes($id)]=$W;$Ge[]=&$Ge[$z][stripslashes($id)];}else$Ge[$z][stripslashes($id)]=($lc?$W:stripslashes($W));}}}}function
bracket_escape($v,$Ga=false){static$ig=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($v,($Ga?array_flip($ig):$ig));}function
min_version($Ig,$Cd="",$i=null){global$h;if(!$i)$i=$h;$rf=$i->server_info;if($Cd&&preg_match('~([\d.]+)-MariaDB~',$rf,$B)){$rf=$B[1];$Ig=$Cd;}return(version_compare($rf,$Ig)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($zf,$hg="\n"){return"<script".nonce().">$zf</script>$hg";}function
script_src($Bg){return"<script src='".h($Bg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($C,$Y,$Va,$od="",$de="",$d="",$pd=""){$J="<input type='checkbox' name='$C' value='".h($Y)."'".($Va?" checked":"").($pd?" aria-labelledby='$pd'":"").">".($de?script("qsl('input').onclick = function () { $de };",""):"");return($od!=""||$d?"<label".($d?" class='$d'":"").">$J".h($od)."</label>":$J);}function
optionlist($D,$lf=null,$Eg=false){$J="";foreach($D
as$id=>$W){$ie=array($id=>$W);if(is_array($W)){$J.='<optgroup label="'.h($id).'">';$ie=$W;}foreach($ie
as$z=>$X)$J.='<option'.($Eg||is_string($z)?' value="'.h($z).'"':'').(($Eg||is_string($z)?(string)$z:$X)===$lf?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($C,$D,$Y="",$ce=true,$pd=""){if($ce)return"<select name='".h($C)."'".($pd?" aria-labelledby='$pd'":"").">".optionlist($D,$Y)."</select>".(is_string($ce)?script("qsl('select').onchange = function () { $ce };",""):"");$J="";foreach($D
as$z=>$X)$J.="<label><input type='radio' name='".h($C)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ca,$D,$Y="",$ce="",$ye=""){$Rf=($D?"select":"input");return"<$Rf$Ca".($D?"><option value=''>$ye".optionlist($D,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$ye'>").($ce?script("qsl('$Rf').onchange = $ce;",""):"");}function
confirm($Kd="",$mf="qsl('input')"){return
script("$mf.onclick = function () { return confirm('".($Kd?js_escape($Kd):'Are you sure?')."'); };","");}function
print_fieldset($u,$td,$Lg=false){echo"<fieldset><legend>","<a href='#fieldset-$u'>$td</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$u');",""),"</legend>","<div id='fieldset-$u'".($Lg?"":" class='hidden'").">\n";}function
bold($Oa,$d=""){return($Oa?" class='active $d'":($d?" class='$d'":""));}function
odd($J=' class="odd"'){static$t=0;if(!$J)$t=-1;return($t++%2?$J:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($z,$X=null){static$mc=true;if($mc)echo"{";if($z!=""){echo($mc?"":",")."\n\t\"".addcslashes($z,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$mc=false;}else{echo"\n}\n";$mc=true;}}function
ini_bool($Zc){$X=ini_get($Zc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Hg,$O,$V,$G){$_SESSION["pwds"][$Hg][$O][$V]=($_COOKIE["adminer_key"]&&is_string($G)?array(encrypt_string($G,$_COOKIE["adminer_key"])):$G);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($H,$f=0){global$h;$J=array();$I=$h->query($H);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$f];}return$J;}function
get_key_vals($H,$i=null,$Yf=0,$uf=true){global$h;if(!is_object($i))$i=$h;$J=array();$i->timeout=$Yf;$I=$i->query($H);$i->timeout=0;if(is_object($I)){while($K=$I->fetch_row()){if($uf)$J[$K[0]]=$K[1];else$J[]=$K[0];}}return$J;}function
get_rows($H,$i=null,$o="<p class='error'>"){global$h;$ib=(is_object($i)?$i:$h);$J=array();$I=$ib->query($H);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$J;}function
unique_array($K,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$J=array();foreach($w["columns"]as$z){if(!isset($K[$z]))continue
2;$J[$z]=$K[$z];}return$J;}}}function
escape_key($z){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$z,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($z);}function
where($Z,$q=array()){global$h,$y;$J=array();foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$f=escape_key($z);$J[]=$f.($y=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($y=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($q[$z],q($X))));if($y=="sql"&&preg_match('~char|text~',$q[$z]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$f = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$z)$J[]=escape_key($z)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$q=array()){parse_str($X,$Ta);remove_slashes(array(&$Ta));return
where($Ta,$q);}function
where_link($t,$f,$Y,$fe="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($f)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$fe:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($g,$q,$M=array()){$J="";foreach($g
as$z=>$X){if($M&&!in_array(idf_escape($z),$M))continue;$za=convert_field($q[$z]);if($za)$J.=", $za AS ".idf_escape($z);}return$J;}function
cookie($C,$Y,$wd=2592000){global$aa;return
header("Set-Cookie: $C=".urlencode($Y).($wd?"; expires=".gmdate("D, d M Y H:i:s",time()+$wd)." GMT":"")."; path=".preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Hg,$O,$V,$m=null){global$Eb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Eb))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Hg!="server"||$O!=""?urlencode($Hg)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($yd,$Kd=null){if($Kd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($yd!==null?$yd:$_SERVER["REQUEST_URI"]))][]=$Kd;}if($yd!==null){if($yd=="")$yd=".";header("Location: $yd");exit;}}function
query_redirect($H,$yd,$Kd,$Re=true,$Xb=true,$ec=false,$Xf=""){global$h,$o,$b;if($Xb){$Ef=microtime(true);$ec=!$h->query($H);$Xf=format_time($Ef);}$Bf="";if($H)$Bf=$b->messageQuery($H,$Xf,$ec);if($ec){$o=error().$Bf.script("messagesPrint();");return
false;}if($Re)redirect($yd,$Kd.$Bf);return
true;}function
queries($H){global$h;static$Ke=array();static$Ef;if(!$Ef)$Ef=microtime(true);if($H===null)return
array(implode("\n",$Ke),format_time($Ef));$Ke[]=(preg_match('~;$~',$H)?"DELIMITER ;;\n$H;\nDELIMITER ":$H).";";return$h->query($H);}function
apply_queries($H,$T,$Ub='table'){foreach($T
as$R){if(!queries("$H ".$Ub($R)))return
false;}return
true;}function
queries_redirect($yd,$Kd,$Re){list($Ke,$Xf)=queries(null);return
query_redirect($Ke,$yd,$Kd,$Re,false,!$Re,$Xf);}function
format_time($Ef){return
sprintf('%.3f s',max(0,microtime(true)-$Ef));}function
remove_from_uri($qe=""){return
substr(preg_replace("~(?<=[?&])($qe".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$rb){return" ".($E==$rb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($z,$vb=false){$jc=$_FILES[$z];if(!$jc)return
null;foreach($jc
as$z=>$X)$jc[$z]=(array)$X;$J='';foreach($jc["error"]as$z=>$o){if($o)return$o;$C=$jc["name"][$z];$eg=$jc["tmp_name"][$z];$kb=file_get_contents($vb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$eg":$eg);if($vb){$Ef=substr($kb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ef,$Se))$kb=iconv("utf-16","utf-8",$kb);elseif($Ef=="\xEF\xBB\xBF")$kb=substr($kb,3);$J.=$kb."\n\n";}else$J.=$kb;}return$J;}function
upload_error($o){$Hd=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?'Unable to upload a file.'.($Hd?" ".sprintf('Maximum allowed file size is %sB.',$Hd):""):'File does not exist.');}function
repeat_pattern($we,$ud){return
str_repeat("$we{0,65535}",$ud/65535)."$we{0,".($ud%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$ud=80,$Lf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$ud).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ud).")($)?)",$Q,$B);return
h($B[1]).$Lf.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Ge,$Qc=array()){$J=false;while(list($z,$X)=each($Ge)){if(!in_array($z,$Qc)){if(is_array($X)){foreach($X
as$id=>$W)$Ge[$z."[$id]"]=$W;}else{$J=true;echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}return$J;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$fc=false){$J=table_status($R,$fc);return($J?$J:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$J=array();foreach($b->foreignKeys($R)as$uc){foreach($uc["source"]as$X)$J[$X][]=$uc;}return$J;}function
enum_input($U,$Ca,$p,$Y,$Pb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ed);$J=($Pb!==null?"<label><input type='$U'$Ca value='$Pb'".((is_array($Y)?in_array($Pb,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Ed[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Va=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ca value='".($t+1)."'".($Va?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$J;}function
input($p,$Y,$s){global$sg,$b,$y;$C=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$s){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$s="json";}$Xe=($y=="mssql"&&$p["auto_increment"]);if($Xe&&!$_POST["save"])$s=null;$_c=(isset($_GET["select"])||$Xe?array("orig"=>'original'):array())+$b->editFunctions($p);$Ca=" name='fields[$C]'";if($p["type"]=="enum")echo
nbsp($_c[""])."<td>".$b->editInput($_GET["edit"],$p,$Ca,$Y);else{$Gc=(in_array($s,$_c)||isset($_c[$s]));echo(count($_c)>1?"<select name='function[$C]'>".optionlist($_c,$s===null||$Gc?$s:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):nbsp(reset($_c))).'<td>';$bd=$b->editInput($_GET["edit"],$p,$Ca,$Y);if($bd!="")echo$bd;elseif(preg_match('~bool~',$p["type"]))echo"<input type='hidden'$Ca value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ca value='1'>";elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ed);foreach($Ed[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Va=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$t]' value='".(1<<$t)."'".($Va?' checked':'').">".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($Uf=preg_match('~text|lob~',$p["type"]))||preg_match("~\n~",$Y)){if($Uf&&$y!="sqlite")$Ca.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ca.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ca>".h($Y).'</textarea>';}elseif($s=="json"||preg_match('~^jsonb?$~',$p["type"]))echo"<textarea$Ca cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Jd=(!preg_match('~int~',$p["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$p["length"],$B)?((preg_match("~binary~",$p["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$p["unsigned"]?1:0)):($sg[$p["type"]]?$sg[$p["type"]]+($p["unsigned"]?0:1):0));if($y=='sql'&&min_version(5.6)&&preg_match('~time~',$p["type"]))$Jd+=7;echo"<input".((!$Gc||$s==="")&&preg_match('~(?<!o)int(?!er)~',$p["type"])&&!preg_match('~\[\]~',$p["full_type"])?" type='number'":"")." value='".h($Y)."'".($Jd?" data-maxlength='$Jd'":"").(preg_match('~char|binary~',$p["type"])&&$Jd>20?" size='40'":"")."$Ca>";}echo$b->editHint($_GET["edit"],$p,$Y);$mc=0;foreach($_c
as$z=>$X){if($z===""||!$X)break;$mc++;}if($mc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $mc), oninput: function () { this.onchange(); }});");}}function
process_input($p){global$b,$n;$v=bracket_escape($p["field"]);$s=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($s=="orig")return($p["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($p["field"]):false);if($s=="NULL")return"NULL";if($p["type"]=="set")return
array_sum((array)$Y);if($s=="json"){$s="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$jc=get_file("fields-$v");if(!is_string($jc))return
false;return$n->quoteBinary($jc);}return$b->processInput($p,$Y,$s);}function
fields_from_edit(){global$n;$J=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$C=bracket_escape($z,1);$J[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$n->primary),);}return$J;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$of="<ul>\n";foreach(table_status('',true)as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$I=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$I||$I->fetch_row()){$Ee="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>";echo"$of<li>".($I?$Ee:"<p class='error'>$Ee: ".error())."\n";$of="";}}}echo($of?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Oc,$Pd=false){global$b;$J=$b->dumpHeaders($Oc,$Pd);$ne=$_POST["output"];if($ne!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Oc).".$J".($ne!="file"&&!preg_match('~[^0-9a-z]~',$ne)?".$ne":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($s,$f){return($s?($s=="unixepoch"?"DATETIME($f, '$s')":($s=="count distinct"?"COUNT(DISTINCT ":strtoupper("$s("))."$f)"):$f);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$r=@tempnam("","");if(!$r)return
false;$J=dirname($r);unlink($r);}}return$J;}function
file_open_lock($r){$yc=@fopen($r,"r+");if(!$yc){$yc=@fopen($r,"w");if(!$yc)return;chmod($r,0660);}flock($yc,LOCK_EX);return$yc;}function
file_write_unlock($yc,$sb){rewind($yc);fwrite($yc,$sb);ftruncate($yc,strlen($sb));flock($yc,LOCK_UN);fclose($yc);}function
password_file($nb){$r=get_temp_dir()."/adminer.key";$J=@file_get_contents($r);if($J||!$nb)return$J;$yc=@fopen($r,"w");if($yc){chmod($r,0660);$J=rand_string();fwrite($yc,$J);fclose($yc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$p,$Vf){global$b;if(is_array($X)){$J="";foreach($X
as$id=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($id):"")."<td>".select_value($W,$A,$p,$Vf);return"<table cellspacing='0'>$J</table>";}if(!$A)$A=$b->selectLink($X,$p);if($A===null){if(is_mail($X))$A="mailto:$X";if(is_url($X))$A=$X;}$J=$b->editVal($X,$p);if($J!==null){if($J==="")$J="&nbsp;";elseif(!is_utf8($J))$J="\0";elseif($Vf!=""&&is_shortable($p))$J=shorten_utf8($J,max(0,+$Vf));else$J=h($J);}return$b->selectVal($J,$A,$p,$X);}function
is_mail($Mb){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Db='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$we="$_a+(\\.$_a+)*@($Db?\\.)+$Db";return
is_string($Mb)&&preg_match("(^$we(,\\s*$we)*\$)i",$Mb);}function
is_url($Q){$Db='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Db?\\.)+$Db(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($p){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$p["type"]);}function
count_rows($R,$Z,$gd,$Ac){global$y;$H=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($gd&&($y=="sql"||count($Ac)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Ac).")$H":"SELECT COUNT(*)".($gd?" FROM (SELECT 1$H GROUP BY ".implode(", ",$Ac).") x":$H));}function
slow_query($H){global$b,$gg;$m=$b->database();$Yf=$b->queryTimeout();if(support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$nd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$nd,'&token=',$gg,'\');
}, ',1000*$Yf,');
</script>
';}else$i=null;ob_flush();flush();$J=@get_key_vals($H,$i,$Yf,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$J;}function
get_token(){$Ne=rand(1,1e6);return($Ne^$_SESSION["token"]).":$Ne";}function
verify_token(){list($gg,$Ne)=explode(":",$_POST["token"]);return($Ne^$_SESSION["token"])==$gg;}function
lzw_decompress($La){$Bb=256;$Ma=8;$ab=array();$Ze=0;$af=0;for($t=0;$t<strlen($La);$t++){$Ze=($Ze<<8)+ord($La[$t]);$af+=8;if($af>=$Ma){$af-=$Ma;$ab[]=$Ze>>$af;$Ze&=(1<<$af)-1;$Bb++;if($Bb>>$Ma)$Ma++;}}$Ab=range("\0","\xFF");$J="";foreach($ab
as$t=>$Za){$Lb=$Ab[$Za];if(!isset($Lb))$Lb=$Ug.$Ug[0];$J.=$Lb;if($t)$Ab[]=$Ug.$Lb[0];$Ug=$Lb;}return$J;}function
on_help($fb,$vf=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $fb, $vf) }, onmouseout: helpMouseout});","");}function
edit_form($a,$q,$K,$_g){global$b,$y,$gg,$o;$Pf=$b->tableName(table_status1($a,true));page_header(($_g?'Edit':'Insert'),$o,array("select"=>array($a,$Pf)),$Pf);if($K===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($q
as$C=>$p){echo"<tr><th>".$b->fieldName($p);$wb=$_GET["set"][bracket_escape($C)];if($wb===null){$wb=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$wb,$Se))$wb=$Se[1];}$Y=($K!==null?($K[$C]!=""&&$y=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($K[$C])?array_sum($K[$C]):+$K[$C]):$K[$C]):(!$_g&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$wb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$s=($_POST["save"]?(string)$_POST["function"][$C]:($_g&&$p["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$s="now";}input($p,$Y,$s);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($_g?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($_g?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."...', this); };"):"");}}echo($_g?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$q?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$gg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1Èä·ã`Â8(áÕ3M¨ó\"Ç39é?Ee=Ò¬ü~ù¾²ôÅîÓ¸7;ÉCÄÁ›ÍE\rd!)Âa*¯5ajo\0ª#`Ê38¶\0Êí]“eŒêˆÆ2¤	mk×øe]…Á­AZsÕStZ•Z!)BR¨G+Î#Jv2(ã öîc…4<¸#sB¯0éú‚6YL\r²=£…¿[×73Æğ<Ô:£Šbx”ßJ=	m_ ¾ÏÅfªlÙ×t‹åIªƒHÚ3x*€›á6`t6¾Ã%UÔLòeÙ‚˜<´\0ÉAQ<P<:š#u/¤:T\\> Ë-…xJˆÍQH\nj¡L+jİzğó°7£•«`İğ³\nkƒƒ'“NÓvX>îC-TË©¶œ¸†4*L”%Cj>7ß¨ŠŞ¨­õ™`ù®œ;yØûÆqÁrÊ3#¨Ù} :#ní\rã½^Å=CåAÜ¸İÆs&8£K&»ô*0ÑÒtİSÉÔÅ=¾[×ó:\\]ÃEİŒ/Oà>^]ØÃ¸Â<èØ÷gZÔV†éqº³ŠŒù ñËx\\­è•ö¹ßŞº´„\"J \\Ã®ˆû##Á¡½D†Îx6êœÚ5xÊÜ€¸¶†¨\rHøl ‹ñø°bú r¼7áÔ6†àöj|Á‰ô¢Û–*ôFAquvyO’½WeM‹Ö÷‰D.Fáö:RĞ\$-¡Ş¶µT!ìDS`°8D˜~ŸàA`(Çemƒ¦òı¢T@O1@º†X¦â“\nLpğ–‘PäşÁÓÂm«yf¸£)	‰«ÂˆÚGSEI‰¥xC(s(a?\$`tE¨n„ñ±­,÷Õ \$a‹U>,èĞ’\$ZñkDm,G\0å \\iú£%Ê¹¢ n¬¥¥±·ìİÜgÉ„b	y`’òÔ†ËWì· ä——¡_CÀÄT\niÏH%ÕdaÀÖiÍ7íAt°,Á®J†X4nˆ‘”ˆ0oÍ¹»9g\nzm‹M%`É'Iü€Ğ-èò©Ğ7:pğ3pÇQ—rEDš¤×ì àb2]…PF ı¥É>eÉú†3j\n€ß°t!Á?4ftK;£Ê\rÎĞ¸­!àoŠu?ÓúPhÒ0uIC}'~ÅÈ2‡vşQ¨ÒÎ8)ìÀ†7ìDIù=§éy&•¢eaàs*hÉ•jlAÄ(ê›\"Ä\\Óêm^i‘®M)‚°^ƒ	|~Õl¨¶#!YÍf81RS Áµ!‡†è62PÆC‘ôl&íûäxd!Œ| è9°`Ö_OYí=ğÑGà[EÉ-eLñCvT¬ )Ä@j-5¨¶œpSg».’G=”ĞZEÒö\$\0¢Ñ†KjíU§µ\$ ‚ÀG'IäP©Â~ûÚğ ;ÚhNÛG%*áRjñ‰X[œXPf^Á±|æèT!µ*NğğĞ†¸\rU¢Œ^q1V!ÃùUz,ÃI|7°7†r,¾¡¬7”èŞÄ¾BÖùÈ;é+÷¨©ß•ˆAÚpÍÎ½Ç^€¡~Ø¼W!3PŠI8]“½vÓJ’Áfñq£|,êè9Wøf`\0áq”ZÎp}[Jdhy­•NêµY|ï™Cy,ª<s A{eÍQÔŸòhd„ìÇ‡ ÌB4;ks&ƒ¬ñÄİÇaŞøÅûé”Ø;Ë¹}çSŒËJ…ïÍ)÷=dìÔ|ÎÌ®NdÒ·Iç*8µ¢dlÃÑ“E6~Ï¨F¦•Æ±X`˜M\rÊ/Ô%B/VÀIåN&;êùã0ÅUC cT&.E+ç•óƒÀ°Š›éÜ@²0`;ÅàËGè5ä±ÁŞ¦j'™›˜öàÆ»Yâ+¶‰QZ-iôœyvƒ–I™5Úó,O|­PÖ]FÛáòÓùñ\0üË2™49Í¢™¢n/Ï‡]Ø³&¦ªI^®=Ól©qfIÆÊ= Ö]x1GRü&¦e·7©º)Šó'ªÆ:B²B±>a¦z‡-¥‰Ñ2.¯ö¬¸bzø´Ü#„¥¼ñ“ÄUá“ÆL7-¼w¿tç3Éµñ’ôe§ŠöDä§\$²#÷±¤jÕ@ÕG—8Î “7púÜğR YCÁĞ~ÁÈ:À@ÆÖEU‰JÜÙ;67v]–J'ØÜäq1Ï³éElôQĞ†i¾ÍÃÎñ„/íÿ{k<àÖ¡MÜpoì}ĞèrÁ¢qŒØìcÕÃ¤™_mÒwï¾^ºu–´ÅùÚüù½«¶Çlnş”™	ı_‘~·Gønèæ‹Ö{kÜßwãŞù\rj~—K“\0Ïİü¦¾-îúÏ¢B€;œà›öb`}ÁCC,”¹-¶‹LĞ8\r,‡¿klıÇŒòn}-5Š3u›gm¸òÅ¸À*ß/äôÊùÏî×ô`Ë`½#xä+B?#öÛN;OR\r¨èø¯\$÷ÎúöÉkòÿÏ™\01\0kó\0Ğ8ôÍaèé/t úû#(&Ìl&­ù¥p¸Ïì‚…şâÎiM{¯zp*Ö-g¨Âèv‰Å6œkë	åˆğœd¬Ø‹¬Ü×ÄA`");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO“ÊerÙxî9*Åº°ºn3\rÑ‰vƒCÁ`õšİ2G%¨YãæáşŸ1™Ífô¹ÑÈ‚l¤Ã1‘\ny£*pC\r\$ÌnTª•3=\\‚r9O\"ã	Ààl<Š\rÇ\\€³I,—s\nA¤Æeh+Mâ‹!q0™ıf»`(¹N{c–—+wËñÁY£–pÙ§3Š3ú˜+I¦Ôj¹ºıÏk·²n¸qÜƒzi#^rØÀº´‹3èâÏ[èºo;®Ë(‹Ğ6#ÀÒ\":cz>ß£C2vÑCXÊ<P˜Ãc*5\nº¨è·/üP97ñ|F»°c0ƒ³¨°ä!ƒæ…!¨œƒ!‰Ã\nZ%ÃÄ‡#CHÌ!¨Òr8ç\$¥¡ì¯,ÈRÜ”2…Èã^0·á@¤2Œâ(ğ88P/‚à¸İ„á\\Á\$La\\å;càH„áHX„•\nÊƒtœ‡á8A<ÏsZô*ƒ;IĞÎ3¡Á@Ò2<Š¢¬!A8G<Ôj¿-Kƒ({*\r’Åa1‡¡èN4Tc\"\\Ò!=1^•ğİM9O³:†;jŒŠ\rãXÒàL#HÎ7ƒ#Tİª/-´‹£pÊ;B Â‹\n¿2!ƒ¥Ít]apÎİî\0RÛCËv¬MÂI,\rö§\0Hv°İ?kTŞ4£Š¼óuÙ±Ø;&’ò+&ƒ›ğ•µ\rÈXbu4İ¡i88Â2Bä/âƒ–4ƒ¡€N8AÜA)52íúøËåÎ2ˆ¨sã8ç“5¤¥¡pçWC@è:˜t…ã¾´Öešh\"#8_˜æcp^ãˆâI]OHşÔ:zdÈ3g£(„ˆ×Ã–k¸î“\\6´˜2ÚÚ–÷¹iÃä7²˜Ï]\rÃxO¾nºpè<¡ÁpïQ®UĞn‹ò|@çËó#G3ğÁ8bA¨Ê6ô2Ÿ67%#¸\\8\rıš2Èc\ræİŸk®‚.(’	’-—J;î›Ñó ÈéLãÏ ƒ¼Wâøã§“Ñ¥É¤â–÷·nû Ò§»æıMÎÀ9ZĞs]êz®¯¬ëy^[¯ì4-ºU\0ta ¶62^•˜.`¤‚â.Cßjÿ[á„ % Q\0`dëM8¿¦¼ËÛ\$O0`4²êÎ\n\0a\rA„<†@Ÿƒ›Š\r!À:ØBAŸ9Ù?h>¤Çº š~ÌŒ—6ÈˆhÜ=Ë-œA7XäÀÖ‡\\¼\r‘Q<èš§q’'!XÎ“2úT °!ŒD\r§Ò,K´\"ç%˜HÖqR\r„Ì ¢îC =í‚ æäÈ<c”\n#<€5Mø êEƒœyŒ¡”“‡°úo\"°cJKL2ù&£ØeRœÀWĞAÎTwÊÑ‘;åJˆâá\\`)5¦ÔŞœBòqhT3§àR	¸'\r+\":‚8¤ÀtV“Aß+]ŒÉS72Èğ¤YˆFƒ¼Z85àc,æô¶JÁ±/+S¸nBpoWÅdÖ\"§Qû¦a­ZKpèŞ§y\$›’ĞÏõ4I¢@L'@‰xCÑdfé~}Q*”ÒºAµàQ’\"BÛ*2\0œ.ÑÕkF©\"\r”‘° Øoƒ\\ëÔ¢™ÚVijY¦¥MÊôO‚\$Šˆ2ÒThH´¤ª0XHª5~kL©‰…T*:~P©”2¦tÒÂàB\0ıY…ÀÈÁœŸj†vDĞs.Ğ9“s¸¹Ì¤ÆP¥*xª•b¤o“õÿ¢PÜ\$¹W/“*ÃÉz';¦Ñ\$*ùÛÙédâmíÃƒÄ'b\rÑn%ÅÄ47Wì-Ÿ’àöÕ ¶K´µ³@<ÅgæÃ¨bBÑÿ[7§\\’|€VdR£¿6leQÌ`(Ô¢,Ñd˜å¹8\r¥]S:?š1¹`îÍYÀ`ÜAåÒ“%¾ÒZkQ”sMš*Ñ×È{`¯J*w¶×ÓŠ>îÕ¾ôDÏû›>ïeÓ¾·\"åt+poüüŸÊ=Ş*‚µApc7gæä ]ÓÊlî!×Ñ—+ÌûzsN¦îıàÀPÔšòia§y}U²ašÓù™`äãA¥­Á½Áw\n¡óÊ›Øj“ÿ<­:+Ÿ7;\"°ÕN3tqd4Åºg”ƒ¦T‹x€ªPH¨—FvWõV\nÕh;¢”BáD°Ø³/öbJ³İ\\Ê+ %¥ñ–÷îá]úúÑŠ½£wa×İ«¹Š¦»á¦ğèE‘­(iÉ!îô7ë×x±†z¤×Ò÷çÅHÉ³¸d´êmdéìèQ±r@§a•î¤ja?¤\r”\ryë4-4µfPáÒ‰WÃÊ`,¼x@§ƒİx¼ˆèA’¦K.€OÁi€¯o²;ê©ö–)±Ğ¨ºä’É†SÙdÙÓeOı™%ÙNĞåL78í¦Fãª›§SîáÒùöIÁÂ\rîÛZ˜²r^‰>ıĞì*‚d\ri°YüëYd‹uÃës‡*œ	ÌèE ¡Ê½éD§9æë!Â>ùkCá€›A‡Ád®åâ°!WWì1ğğÿQAæœÛk½°d%¦Ü# ïy†°{›–`}Té_YY‹R®ğ-¹MôºO–2ÖâÊ,Ë,Å É`ú-2ÓÀ÷¨+]L•È7E¤Ôç{`¢ƒË•­ñ~wì-…×ı ©M6¥¤]Fóûƒ¦@™§Ìe`°/˜8¹@‡e¦ÍØ\\ap.‚H¥ûĞC´Àæ*EAoz2¹Æçg0úˆ?]Í~Ÿs°ñÏ`ŒhJ`†êç®¤`û}‡áÍ^`èÑÃ>§ÈOñ5\rğW^Iœõõ\n³ù¬ı;ñ¸´ğ:ŸäÏ_h›n±µŒ´ßYP4®ğˆ)û *ı¸îÉõ¯æÑ6vÖä[Ë¤­C;ûö³ïã»¶näW/jº<\$J*qÄ¢ûä°ú-LôŒ\0µ¯ãï÷\0Oš\$ëZW zş	\0}Ú.4F„\rnu\0âàØÀä‹’éLŞ ÷IA\nz›©*–©ªŠjJ˜Ì…PŠ¢ë‚Ğp…Â6€Ø¦NšDÈBf\\	\0¨	 ˜W@L\rÀÄ`àg'Bd¯	Bi	œ°‚‰*|r%|\nr\r#°„@w®»î(T.¬vâ8ñÊâ\nm˜¥ğ<pØÔ`úY0ØÔâğÀÊö\0Ğ#€Ì‘}.I œx¢T\\âôÑ\n ÍQ‘æ@bR MFÙÇ|¢è%0SDr§ÂÈ f/b–àÂá¢:áík/şã	f%äĞ¨®e\nx\0Âl\0ÌÅÚ	‘0€W`ß¥Ú\nç8\r\0}p²‘›Â;\0È.Bè¤Vù§,z&Àf Ì\röWOcKƒ\nì» ’åÒkªz2\rñÉÀîW@Â’ç%\n~1€‚X ¤ßqâD¢!°^ù¦t<§\$²{0<E¦ÊÑª³2&ÜNÒ\r\næ^iÀ\"è³#nı ì­#2D§ˆüË®Dâæo!¬zK6Âë:ïìÃÏğ#RlÓ%q'kŞ¾*¸«Ã€à¶ Z@ºòJÌ`^PàHÀbSR|§	%|öôì.ÿ¯Âµ²^ßrc&oæÑk<ÿ­şí&ş²xK²Õ'æüLÄ‚«ò‹(ò’òmE)¥*–ÿ¬`R¥bWGbTRø½î`VNf¢®jæğ´woVèè˜(\"­’Ú§ô&s\0§².²¦Ş³8=h®ë Q&üân*hø\0òv¢BèGØè@\\F\n‚WÅr f\$óe6‘6àaã¤¥¢5H•ñâ°bYĞfÓRF€Ñ9¨(Òº³.EQå*Êî¸ë(Ú1‰*Â/+,º\"ˆö\r Ü	ªâ8ı\0ˆü3@İ%lå­ã¥,+¼¼å&í#-\$¦óÈ%†ÌÅgF!sİ1³Ö%¯Ôsó/¥nKªq”\0O\"EA©8…2ÀŠ}5\0Ë8‹ŸA\n¯ÅRrH…Ú³‡9Å4UìdW3!b¨z`í>ãF>Òi,”a?L>°´`´r¾±r ta;L¦ëÅ%ÀRxîŒ‰R†ëtŠÊ¥HW/m7Dr¶EsG2Î.B5Iî°ëÉQ3â_€ÒÔˆë´¤§24.ì‰ÅRkâ€z@¶@ºNì[4Î&<%b>n¦YPWÎŸâ“6n\$bK5“t‡âZB³YI Lê~G³YÎÖñcQc	6DXÖµ\"}ÆfŠĞ¢IÎj€ó5“\\ö XÙ¢td®„\nbtNaEÀTb;lâp‚Õ|\0Ô¯x\n‚ådVÖíŒÖà]Xõ“Yf„÷%D`‡QbØsvDsk0ÓqT¥ÿ7“l c7ç€ä ÖôÎSZ”6äï¾ãµŠÄ#êx‚Õh Õšâ¬£`·_`Ü¾ÎÚ§±•ê¥œ·+w`Ö%U§…’ï©è™¯¶ïÌ»U òöD‹Xl#µ†Ju¯[ åQ'×\\Hğ÷„¤÷äGRÕë0«oaĞõÓCÃX¥+ÔaícàNä®`ÖreÚ\n€Ò%¤4šS_­k_àÚš!3({7ó’bI\rV\r÷5ç×\0µ\\“€aeSg[Óz f-PöO,ju;XUvĞîıÖÃmËl…\"\\B1ÄİÅ0æ µ‘pğå4á•ë;2*‘î.b£\0ØØuÔãJ\"NV‰ÛrrOÕfî2äW3[‰Ø¢”¤³	€ËÆ5\r7²Ë0,ytÉÛwS	W	]kGÓX·iA*=P\rbs\"®\\÷o{eÀòœ¶5k€ïkÆ<±‚;®;xÕ¶-ö0§É_\$4İ ²¶´™8*i\0f›.Ñ(`¼•òñD`æP·&Œô˜ŒÄA+eB\"ZÀ¨¶³¢WÌ¢\\M>¶wö÷ú¶Ëg0¦ãGààš…‘Òø´\rÆÜ©*İf\\òŒp\0ğ¼‚åKf#€ÛÀËƒ\rÎÙÍ¡ƒØ@\r÷‚Öd ¢Ÿ\nó&D°%‚Ø3­wı‚©.}÷ùÏÿÅ­‚ ñ‚kHÆk1x~]¸PÙ­Óƒ€[…Œ;…ÀY€ØˆØ‘KÅ6 ËZäÖàtµ©>gL\r€àHsMìºe¤\0Ÿä&3²\$ë‰n3íü wÊ“7Õ—®·\"ôÒë+İ;¢s;é” *1™ y*îË®;TG|ç|B©! {!åÅ\"/Ê–oÎãj÷Wë+µæ“LşDJş’Í…´w2´ÆVTZ¹Gg/šıÖŠƒ]4n½4²À¿±Á‹Ï÷i©=ÈT…ˆ]dâ&¦ÀÄM\0Ö[88‡È®Eæ–â8&LXVmôvÀ±	Ê”j„×›‡FåÄ\\™Â	™ÆÊ&t\0Q›à\\\"òb€°	àÄ\rBs	wÂ	ŸõŸ‚N š7ÇC/|Ù×	€¨\n\nNúıK›yà*A™`ñWÏYvUZ4tz;~0}šñJ?hW£d*#É3€åĞàyF\nKTë¤Åæ@|„gy›\0ÊOÀxôa§`w£Z9¥ŒbO„»¨ÚWY’RÄÉ}J¾ˆXÊÚPñU2`÷©šG©åbeuª…zWö+œÈğ\rè¬\$4ƒ…\"\n\0\n`¨X@Nà‹®%d|‚hé¬ÈÚ™ŞÅ‡egÄê‚+âH¸t™(ªŞÑ( À^\0Zk@îªP¦@%Â(WÍ{¬º/¯ºşt{o\$â\0[³èŞ±¡„%¡§ë´É™¯‚hU]¤B,€rDèğe:D§¢ÌX«†V&ÚWll@ÀdòìY4 Ë¯›iYy¡š[‘¬Ã+«Z¹©]¦g·‡FrÚFû´wŞµ”#1¦tÏ¦¤ÃN¢hq`å§Dóğğ§v|º¦Z…Lúv…:S¨ú@åeº»ÿB’ƒ.2‡¬EŠ%Ú¯Bè’@[”ŠúÖB£*Y;¿™[ú#ª”©™›µ@:5Ã`Y8Û¾–è&¹è	@¦	àœüQÅS8!›£³»Â Â¼¢2MY„äO;¾«©Æ›È)êõFÂ¨FZõA\\1 PF¨B¤lF+šó”<ÚRÊ><J?šÚ{µf’õkÄ˜8®ëW‚¬èë®ºM\r•Í¼Û–RsC÷NÍô€î”%©ÊJë~Á˜?·Úâ¯,\r4×k0µ,Jóª•b—öo\0Ê!1 ø5'¦\ràø·u\r\0øÊ\$¡Ğ=š}\r7NÌÔ=DW6Kø8võ\r³ Ê\n ¤	*‚\r»Ä7)¦ÏDüm›1	aÖ@ßÖ‡°¨w.äT”Èİ~©Ç¼pV½ÀœJ‚u¢\rä&N MqcÊdĞĞdĞ8îğØ€_ĞK×aU&®H#]°d}`P¬\0~ÀU/ª…ñƒ…ùÌynY<>dC·<GÉ@éÃ\"’eZS¹wã•›“ÆGy¼\\j)ğ}•¤\r5â1,pª^u\0èéˆÕÆnÌÚC©ºHPÖ¬G<Ÿšp‹ô2¨\nèFDÜ\rÖ\$°­yuycöçõv6İe)ÖpÛYHÏÄ’õŞ#VP¾€üÕØeW®Ş=mÙæc:&‰¥æ-ÛÄPv.£Ë€øæºğš	‹úØ£\0\$êÁ@+×ì¹Pÿl&_çCb-U&0\"åF…®Vy¸p\rÄa5Ûq9U>5è\\LBg†èU­[¶7m düóyV[5Ÿ*}Õ4ø5/ç¶àÒ¾HöD60 ¿­Åì¿íÃ:Suy\r„¼‡ãSMÀŸÂ;W“ªØÎµL4ÖG¢NØã°§–Ÿõ ÜeÜmğšt„Èsq¶€˜\".Fÿ™§CsQ¸ h€e7äünØ>°²*àc!iSİj¾†Ì­Ù‘ü°ø‚°ü {üµ­÷%t€ê\0`&lrÅ“,Ü!0ahy	RµB=ÍegWãùo\0¦H‡h/v(’N4‘\rı„ÀTz„&q÷?X\$€X!ôJ^,Ÿ­öbó“ı`2@:†¼7ÃCX’H€e¡Š@qïÛ\ny¶ 0¦è‹´£´€ñPÀO02@èv‰/IPa°2ÀÜ0\n]-(^Æüt.½•3&Ç\"«0¤˜\"Ğ\0]°1šÍñaÂ˜´°E³SúÄP|\\€ÉÑAõpú9›\$K˜ˆByuØ¯zë7Z•\rìb¤uÉ_ïò8õÆmãq³ğû˜E<-ÈÉ@\0®!)³Ä )÷)Õ~Qå	rÙ‘Ü/MèPÿ\nº	¦É`à!\n(ˆ‚\n\n>X€Ğ!` WºËáø¼àp4AÚ	Å¶Á©d‘Ç\0XÒÙ§V\n€+Cd/EØFåâ¯m+`\0Ş2´ôp/-ØÌ2·™´eæËC@C„\0pX,4½ìª¼ƒÌ9àòÔXt!.Pß˜\\ı•q„£b{…vˆbfMÃÍ)D]ûw„˜°ŸË… XàB4'»—fÀtXĞ¦¢(O Õ¾©	ğ‘qü#³3¸«p]¢i\".ªè7¬iw[T\0y\rÄ4Cå;,\$a2i(™\$µmÈ†DÒ&Ô”4¥Z â;E#6UAÄR€­üìeFFUŒ1•h2\n¨÷UpÖ‡ÃéTÊ¹€âÏØÕ[î+‘^ôXÕ¤Ù78 A\rnK‚‚d1´>€pƒ+¦`Î:‡‹Iƒo<ÚL„@äa	¾€´\0:ˆ†İG—½ hQ„\$ùjR¸Ç'ÉÈŒ¯K!ı`¨£¸1ÅÒÀHƒCÆâZ0\$ÀeÉyXG£5hÎEâ\r1ŸG‚\nº`·g'\0¼İ6qVã(\r‡„VPHöÇŒëbÖŠ\r¯-k–\0B‘bÆıØGß:½áŒZ×Ñ|¹>*ÄXXÙ!¡’£´\"&öÀ:EÕa«÷,vB P‰h!pf;\0£¾[Á‘/r:qTƒèÙ8\"x3Gl‘İ\"Xm#Ã`è5ÑæÜx\n¨óG¶;ÑşEQ—X¹Ç‚<HhAúå¢ê·+1Nsº´ã¡µk•jsH{€Øõãï&1•GãaIÊ?76š22Îp4™ş—È™V!°Á‡¢º2ÍŸ:€¤z	IàÄ‰ZÔ1ER7Ãİ%£¶ÂôÅ6!Á?@(•ä–‘ï,&…2’¸ò”>™I8 ÒP+œ”‚hâ&7N'2V˜š\0Ñ¢i\0œ‡ËÜ™i%8ù¹V8e„Z:Ò@Ê´°ñ6ä¦R{¨JzÔs2…	j(C`Z*ôˆJ-bçë#¸DEu\$¹WŒ*Œ¥*#9ˆ”D3y¥?\"Ø9ı,Q”/§ßw8ˆ‚UÀ=•qÿ™]\0ƒÊ¹¸mtøŒ-*ç(˜ğdÒ‰•!åƒ+FX\$IŒÌ„âîˆ¼ºU\$õ`‚‚Ìeò'c¦¿Vr¨n«Æ1l€Šõ5¬?XTÅ&*@ òIBÖtyt–fêõN¨ğ%ÂÅS™H˜xô\$Ü\0}/sH]]˜â»ôãÃP')HC&…ìIá1\ri.äU&\$…dIı<)ôÅÓÓ(	EPâˆT^\n¢7›(ˆ™T'&TÇÔ:.,µdªBjõ¸:D…ğ}u{¬a\0ì¦&mÑ1CCH\n˜5!ª²hÀlš@¸ÒÁàL©€â¹™i&Ä:™µ¿G†fqNš\\Ó\\|ğÇ „`»“X\nzâÌ–üz©™‡Ê¦³6`¸=\rJEƒ\n0¦äegÌÔÊÎ‰ÜË×\n‡Y™¾äWÎ®ƒû¯áM\$aÁæ'îíwZ°ÑDa¸L÷É\\¨1)‘‘Z=&«ZúA’.Ç´91úpŸ;™‰Øó•‘<ìãïA8ÑË,F¬	lË,=ò¤\0ø›'Íåè&yğKÔ5X”e÷“xw´ß§E3)ÒLÒpn¼™ôá¦€M9Å5I(sw“E&İ6Y™ÉˆÔõ€N9qM{I2èëÀÂeT„:aÈñ.ªI”ÜøX¢òtÓ •De&f§fniØ]’hbHE†`˜");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$yc=file_open_lock(get_temp_dir()."/adminer.version");if($yc)file_write_unlock($yc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$Eb,$Jb,$Rb,$o,$_c,$Dc,$aa,$ad,$y,$ba,$qd,$be,$xe,$If,$Hc,$gg,$kg,$sg,$zg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$F=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$F[]=true;call_user_func_array('session_set_cookie_params',$F);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$lc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($jg,$Xd=null){if(is_array($jg)){$_e=($Xd==1?0:1);$jg=$jg[$_e];}$jg=str_replace("%d","%s",$jg);$Xd=format_number($Xd);return
sprintf($jg,$Xd);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$_e=array_search("SQL",$b->operators);if($_e!==false)unset($b->operators[$_e]);}function
dsn($Hb,$V,$G,$D=array()){try{parent::__construct($Hb,$V,$G,$D);}catch(Exception$Vb){auth_error(h($Vb->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($H,$tg=false){$I=parent::query($H);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($I);return$I;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($H,$p=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch();return$K[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Eb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($R,$M,$Z,$Ac,$je=array(),$_=1,$E=0,$Ee=false){global$b,$y;$gd=(count($Ac)<count($M));$H=$b->selectQueryBuild($M,$Z,$Ac,$je,$_,$E);if(!$H)$H="SELECT".limit(($_GET["page"]!="last"&&$_!=""&&$Ac&&$gd&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Ac&&$gd?"\nGROUP BY ".implode(", ",$Ac):"").($je?"\nORDER BY ".implode(", ",$je):""),($_!=""?+$_:null),($E?$_*$E:0),"\n");$Ef=microtime(true);$J=$this->_conn->query($H);if($Ee)echo$b->selectQuery($H,$Ef,!$J);return$J;}function
delete($R,$Le,$_=0){$H="FROM ".table($R);return
queries("DELETE".($_?limit1($R,$H,$Le):" $H$Le"));}function
update($R,$P,$Le,$_=0,$N="\n"){$Gg=array();foreach($P
as$z=>$X)$Gg[]="$z = $X";$H=table($R)." SET$N".implode(",$N",$Gg);return
queries("UPDATE".($_?limit1($R,$H,$Le,$N):" $H$Le"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$L,$Ce){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
convertSearch($v,$X,$p){return$v;}function
value($X,$p){return$X;}function
quoteBinary($ff){return
q($ff);}function
warnings(){return'';}function
tableHelp($C){}}$Eb["sqlite"]="SQLite 3";$Eb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Ae=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($r){$this->_link=new
SQLite3($r);$Ig=$this->_link->version();$this->server_info=$Ig["versionString"];}function
query($H){$I=@$this->_link->query($H);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($H,$p=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$f=$this->_offset++;$U=$this->_result->columnType($f);return(object)array("name"=>$this->_result->columnName($f),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($r){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($r);}function
query($H,$tg=false){$Nd=($tg?"unbufferedQuery":"query");$I=@$this->_link->$Nd($H,SQLITE_BOTH,$o);$this->error="";if(!$I){$this->error=$o;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($H,$p=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$z=>$X)$J[($z[0]=='"'?idf_unescape($z):$z)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$we='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($we\\.)?$we\$~",$C,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($r){$this->dsn(DRIVER.":$r","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($r){if(is_readable($r)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$r)?$r:dirname($_SERVER["SCRIPT_FILENAME"])."/$r")." AS a")){parent::__construct($r);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($H){return$this->_result=$this->query($H);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ce){$Gg=array();foreach($L
as$P)$Gg[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Gg));}function
tableHelp($C){if($C=="sqlite_sequence")return"fileformat2.html#seqtab";if($C=="sqlite_master")return"fileformat2.html#$C";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($H,$Z,$_,$Zd=0,$N=" "){return" $H$Z".($_!==null?$N."LIMIT $_".($Zd?" OFFSET $Zd":""):"");}function
limit1($R,$H,$Z,$N="\n"){global$h;return(preg_match('~^INTO~',$H)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($H,$Z,1,0,$N):" $H WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($m,$cb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($l){return
array();}function
table_status($C=""){global$h;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){$K["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($C!=""?$J[$C]:$J);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$J=array();$Ce="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$K){$C=$K["name"];$U=strtolower($K["type"]);$wb=$K["dflt_value"];$J[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$wb,$B)?str_replace("''","'",$B[1]):($wb=="NULL"?null:$wb)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Ce!="")$J[$Ce]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$C]["auto_increment"]=true;$Ce=$C;}}$Bf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Bf,$Ed,PREG_SET_ORDER);foreach($Ed
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($J[$C])$J[$C]["collation"]=trim($B[3],"'");}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Bf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Bf,$B)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$Ed,PREG_SET_ORDER);foreach($Ed
as$B){$J[""]["columns"][]=idf_unescape($B[2]).$B[4];$J[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$J){foreach(fields($R)as$C=>$p){if($p["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$Cf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$K){$C=$K["name"];$w=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$i)as$ef){$w["columns"][]=$ef["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Cf[$C],$Se)){preg_match_all('/("[^"]*+")+( DESC)?/',$Se[2],$Ed);foreach($Ed[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$J[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$J[""]["columns"]||$w["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$C))$J[$C]=$w;}return$J;}function
foreign_keys($R){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$K){$uc=&$J[$K["id"]];if(!$uc)$uc=$K;$uc["source"][]=$K["from"];$uc["target"][]=$K["to"];}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($C){global$h;$cc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($cc)\$~",$C)){$h->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$cc));return
false;}return
true;}function
create_database($m,$e){global$h;if(file_exists($m)){$h->error='File exists.';return
false;}if(!check_sqlite_name($m))return
false;try{$A=new
Min_SQLite($m);}catch(Exception$Vb){$h->error=$Vb->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error='File exists.';return
false;}}return
true;}function
rename_database($C,$e){global$h;if(!check_sqlite_name($C))return
false;$h->__construct(":memory:");$h->error='File exists.';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){$Dg=($R==""||$rc);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Dg=true;break;}}$c=array();$me=array();foreach($q
as$p){if($p[1]){$c[]=($Dg?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$me[$p[0]]=$p[1][0];}}if(!$Dg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$C&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($R,$C,$c,$me,$rc))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($C));return
true;}function
recreate_table($R,$C,$q,$me,$rc,$x=array()){if($R!=""){if(!$q){foreach(fields($R)as$z=>$p){if($x)$p["auto_increment"]=0;$q[]=process_field($p,$p);$me[$z]=idf_escape($z);}}$De=false;foreach($q
as$p){if($p[6])$De=true;}$Gb=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$Gb[$X[1]]=true;unset($x[$z]);}}foreach(indexes($R)as$ld=>$w){$g=array();foreach($w["columns"]as$z=>$f){if(!$me[$f])continue
2;$g[]=$me[$f].($w["descs"][$z]?" DESC":"");}if(!$Gb[$ld]){if($w["type"]!="PRIMARY"||!$De)$x[]=array($w["type"],$ld,$g);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$rc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$ld=>$uc){foreach($uc["source"]as$z=>$f){if(!$me[$f])continue
2;$uc["source"][$z]=idf_unescape($me[$f]);}if(!isset($rc[" $ld"]))$rc[]=" ".format_foreign_key($uc);}queries("BEGIN");}foreach($q
as$z=>$p)$q[$z]="  ".implode($p);$q=array_merge($q,array_filter($rc));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$C":$C)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($me&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$me).") SELECT ".implode(", ",array_map('idf_escape',array_keys($me)))." FROM ".table($R)))return
false;$qg=array();foreach(triggers($R)as$og=>$Zf){$ng=trigger($og);$qg[]="CREATE TRIGGER ".idf_escape($og)." ".implode(" ",$Zf)." ON ".table($C)."\n$ng[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$x))return
false;foreach($qg
as$ng){if(!queries($ng))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$C,$g){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($R."_"))." ON ".table($R)." $g";}function
alter_indexes($R,$c){foreach($c
as$Ce){if($Ce[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Kg){return
apply_queries("DROP VIEW",$Kg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Kg,$Sf){return
false;}function
trigger($C){global$h;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$pg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$pg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$Yd=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Yd?" OF":""),"Of"=>($Yd[0]=='`'||$Yd[0]=='"'?idf_unescape($Yd):$Yd),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($R){$J=array();$pg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$K){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$pg["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$K["sql"],$B);$J[$K["name"]]=array($B[1],$B[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$H){return$h->query("EXPLAIN QUERY PLAN $H");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($hf){return
true;}function
create_sql($R,$Ea,$Jf){global$h;$J=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$C=>$w){if($C=='')continue;$J.=";\n\n".index_sql($R,$w['type'],$C,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$J;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$J[$z]=$h->result("PRAGMA $z");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$he){list($z,$X)=explode("=",$he,2);$J[$z]=$X;}return$J;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($gc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$gc);}$y="sqlite";$sg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$If=array_keys($sg);$zg=array();$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$_c=array("hex","length","lower","round","unixepoch","upper");$Dc=array("avg","count","count distinct","group_concat","max","min","sum");$Jb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Eb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Ae=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Tb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$G){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($G,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Ig=pg_version($this->_link);$this->server_info=$Ig["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$p){return($p["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($H,$tg=false){$I=@pg_query($this->_link,$H);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$p=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$p);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$f=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$f);$J->name=pg_field_name($this->_result,$f);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$f);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($O,$V,$G){global$b;$m=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$G);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
value($X,$p){return$X;}function
quoteBinary($ff){return
q($ff);}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ce){global$h;foreach($L
as$P){$_g=array();$Z=array();foreach($P
as$z=>$X){$_g[]="$z = $X";if(isset($Ce[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$_g)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}function
convertSearch($v,$X,$p){return(preg_match('~char|text'.(is_numeric($X["val"])&&!preg_match('~LIKE~',$X["op"])?'|'.number_type():'').'~',$p["type"])?$v:"CAST($v AS text)");}function
value($X,$p){return$this->_conn->value($X,$p);}function
quoteBinary($ff){return$this->_conn->quoteBinary($ff);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($C){$xd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$A=$xd[$_GET["ns"]];if($A)return"$A-".str_replace("_","-",$C).".html";}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b,$sg,$If;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$If['Strings'][]="json";$sg["json"]=4294967295;if(min_version(9.4,0,$h)){$If['Strings'][]="jsonb";$sg["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($H,$Z,$_,$Zd=0,$N=" "){return" $H$Z".($_!==null?$N."LIMIT $_".($Zd?" OFFSET $Zd":""):"");}function
limit1($R,$H,$Z,$N="\n"){return(preg_match('~^INTO~',$H)?limit($H,$Z,1,0,$N):" $H WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($m,$cb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$H="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$H.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$H.="
ORDER BY 1";return
get_key_vals($H);}function
count_tables($l){return
array();}function
table_status($C=""){$J=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", CASE WHEN c.relhasoids THEN 'oid' ELSE '' END AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($C!=""?$J[$C]:$J);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$J=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$B);list(,$U,$ud,$K["length"],$ra,$ya)=$B;$K["length"].=$ya;$Ua=$U.$ra;if(isset($wa[$Ua])){$K["type"]=$wa[$Ua];$K["full_type"]=$K["type"].$ud.$ya;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$ud.$ra.$ya;}$K["null"]=!$K["attnotnull"];$K["auto_increment"]=preg_match('~^nextval\\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$B))$K["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$J[$K["field"]]=$K;}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Qf=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$g=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Qf AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Qf AND ci.oid = i.indexrelid",$i)as$K){$Te=$K["relname"];$J[$Te]["type"]=($K["indispartial"]?"INDEX":($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX")));$J[$Te]["columns"]=array();foreach(explode(" ",$K["indkey"])as$Wc)$J[$Te]["columns"][]=$g[$Wc];$J[$Te]["descs"]=array();foreach(explode(" ",$K["indoption"])as$Xc)$J[$Te]["descs"][]=($Xc&1?'1':null);$J[$Te]["lengths"]=array();}return$J;}function
foreign_keys($R){global$be;$J=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$B)){$K['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$Dd)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Dd[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Dd[4]));}$K['target']=array_map('trim',explode(',',$B[3]));$K['on_delete']=(preg_match("~ON DELETE ($be)~",$B[4],$Dd)?$Dd[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($be)~",$B[4],$Dd)?$Dd[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($C){global$h;return
array("select"=>trim($h->result("SELECT view_definition
FROM information_schema.views
WHERE table_schema = current_schema() AND table_name = ".q($C))));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$J=h($h->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$J,$B))$J=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($J);}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).($e?" ENCODING ".idf_escape($e):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($C,$e){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){$c=array();$Ke=array();foreach($q
as$p){$f=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $f";else{$Fg=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($f!=$X[0])$Ke[]="ALTER TABLE ".table($R)." RENAME $f TO $X[0]";$c[]="ALTER $f TYPE$X[1]";if(!$X[6]){$c[]="ALTER $f ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $f ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Fg!="")$Ke[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Fg!=""?substr($Fg,9):"''");}}$c=array_merge($c,$rc);if($R=="")array_unshift($Ke,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Ke,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$C)$Ke[]="ALTER TABLE ".table($R)." RENAME TO ".table($C);if($R!=""||$gb!="")$Ke[]="COMMENT ON TABLE ".table($C)." IS ".q($gb);if($Ea!=""){}foreach($Ke
as$H){if(!queries($H))return
false;}return
true;}function
alter_indexes($R,$c){$nb=array();$Fb=array();$Ke=array();foreach($c
as$X){if($X[0]!="INDEX")$nb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Fb[]=idf_escape($X[1]);else$Ke[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($nb)array_unshift($Ke,"ALTER TABLE ".table($R).implode(",",$nb));if($Fb)array_unshift($Ke,"DROP INDEX ".implode(", ",$Fb));foreach($Ke
as$H){if(!queries($H))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Kg){return
drop_tables($Kg);}function
drop_tables($T){foreach($T
as$R){$Gf=table_status($R);if(!queries("DROP ".strtoupper($Gf["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Kg,$Sf){foreach(array_merge($T,$Kg)as$R){$Gf=table_status($R);if(!queries("ALTER ".strtoupper($Gf["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($Sf)))return
false;}return
true;}function
trigger($C,$R=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$L=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($C));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$K)$J[$K["trigger_name"]]=array($K["action_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($C,$U){$L=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($C));$J=$L[0];$J["returns"]=array("type"=>$J["type_udt_name"]);$J["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($C).'
ORDER BY ordinal_position');return$J;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($C,$K){$J=array();foreach($K["fields"]as$p)$J[]=$p["type"];return
idf_escape($C)."(".implode(", ",$J).")";}function
last_id(){return
0;}function
explain($h,$H){return$h->query("EXPLAIN $H");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Se))return$Se[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($gf){global$h,$sg,$If;$J=$h->query("SET search_path TO ".idf_escape($gf));foreach(types()as$U){if(!isset($sg[$U])){$sg[$U]=0;$If['User types'][]=$U;}}return$J;}function
create_sql($R,$Ea,$Jf){global$h;$J='';$cf=array();$qf=array();$Gf=table_status($R);$q=fields($R);$x=indexes($R);ksort($x);$pc=foreign_keys($R);ksort($pc);if(!$Gf||empty($q))return
false;$J="CREATE TABLE ".idf_escape($Gf['nspname']).".".idf_escape($Gf['Name'])." (\n    ";foreach($q
as$hc=>$p){$se=idf_escape($p['field']).' '.$p['full_type'].default_value($p).($p['attnotnull']?" NOT NULL":"");$cf[]=$se;if(preg_match('~nextval\(\'([^\']+)\'\)~',$p['default'],$Ed)){$pf=$Ed[1];$Af=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($pf):"SELECT * FROM $pf"));$qf[]=($Jf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $pf;\n":"")."CREATE SEQUENCE $pf INCREMENT $Af[increment_by] MINVALUE $Af[min_value] MAXVALUE $Af[max_value] START ".($Ea?$Af['last_value']:1)." CACHE $Af[cache_value];";}}if(!empty($qf))$J=implode("\n\n",$qf)."\n\n$J";foreach($x
as$Rc=>$w){switch($w['type']){case'UNIQUE':$cf[]="CONSTRAINT ".idf_escape($Rc)." UNIQUE (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;case'PRIMARY':$cf[]="CONSTRAINT ".idf_escape($Rc)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$w['columns'])).")";break;}}foreach($pc
as$oc=>$nc)$cf[]="CONSTRAINT ".idf_escape($oc)." $nc[definition] ".($nc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$J.=implode(",\n    ",$cf)."\n) WITH (oids = ".($Gf['Oid']?'true':'false').");";foreach($x
as$Rc=>$w){if($w['type']=='INDEX')$J.="\n\nCREATE INDEX ".idf_escape($Rc)." ON ".idf_escape($Gf['nspname']).".".idf_escape($Gf['Name'])." USING btree (".implode(', ',array_map('idf_escape',$w['columns'])).");";}if($Gf['Comment'])$J.="\n\nCOMMENT ON TABLE ".idf_escape($Gf['nspname']).".".idf_escape($Gf['Name'])." IS ".q($Gf['Comment']).";";foreach($q
as$hc=>$p){if($p['comment'])$J.="\n\nCOMMENT ON COLUMN ".idf_escape($Gf['nspname']).".".idf_escape($Gf['Name']).".".idf_escape($hc)." IS ".q($p['comment']).";";}return
rtrim($J,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$Gf=table_status($R);$J="";foreach(triggers($R)as$mg=>$lg){$ng=trigger($mg,$Gf['Name']);$J.="\nCREATE TRIGGER ".idf_escape($ng['Trigger'])." $ng[Timing] $ng[Events] ON ".idf_escape($Gf["nspname"]).".".idf_escape($Gf['Name'])." $ng[Type] $ng[Statement];;\n";}return$J;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($gc){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$gc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$y="pgsql";$sg=array();$If=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$sg+=$X;$If[$z]=array_keys($X);}$zg=array();$ge=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$_c=array("char_length","lower","round","to_hex","to_timestamp","upper");$Dc=array("avg","count","count distinct","max","min","sum");$Jb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Eb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Ae=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Tb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$G){$this->_link=@oci_new_connect($V,$G,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($H,$tg=false){$I=oci_parse($this->_link,$H);$this->error="";if(!$I){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$p=1){$I=$this->query($H);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$z=>$X){if(is_a($X,'OCI-Lob'))$K[$z]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$f=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$f);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$f);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$G){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$G);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($H,$Z,$_,$Zd=0,$N=" "){return($Zd?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $H$Z) t WHERE rownum <= ".($_+$Zd).") WHERE rnum > $Zd":($_!==null?" * FROM (SELECT $H$Z) WHERE rownum <= ".($_+$Zd):" $H$Z"));}function
limit1($R,$H,$Z,$N="\n"){return" $H$Z";}function
db_collation($m,$cb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($C=""){$J=array();$if=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $if":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $if":"")."
ORDER BY 1")as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$ud="$K[DATA_PRECISION],$K[DATA_SCALE]";if($ud==",")$ud=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($ud?"($ud)":""),"type"=>strtolower($U),"length"=>$ud,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$K){$Rc=$K["INDEX_NAME"];$J[$Rc]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$Rc]["columns"][]=$K["COLUMN_NAME"];$J[$Rc]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$Rc]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($C){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($L);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$H){$h->query("EXPLAIN PLAN FOR $H");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){$c=$Fb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Fb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Fb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Fb).")"))&&($R==$C||queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)));}function
foreign_keys($R){$J=array();$H="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($H)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Kg){return
apply_queries("DROP VIEW",$Kg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($hf){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($hf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($gc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$gc);}$y="oracle";$sg=array();$If=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$sg+=$X;$If[$z]=array_keys($X);}$zg=array();$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$_c=array("length","lower","round","upper");$Dc=array("avg","count","count distinct","max","min","sum");$Jb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Eb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Ae=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$G){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$G,"CharacterSet"=>"UTF-8"));if($this->_link){$Yc=sqlsrv_server_info($this->_link);$this->server_info=$Yc['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($H,$tg=false){$I=sqlsrv_query($this->_link,$H);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($H){$this->_result=sqlsrv_query($this->_link,$H);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($H,$p=0){$I=$this->query($H);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$z=>$X){if(is_a($X,'DateTime'))$K[$z]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$p["Name"];$J->orgname=$p["Name"];$J->type=($p["Type"]==1?254:0);return$J;}function
seek($Zd){for($t=0;$t<$Zd;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$G){$this->_link=@mssql_connect($O,$V,$G);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($H,$tg=false){$I=@mssql_query($H,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($H,$p=0){$I=$this->query($H);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($Zd){mssql_data_seek($this->_result,$Zd);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($O,$V,$G){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$O)),$V,$G);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ce){foreach($L
as$P){$_g=array();$Z=array();foreach($P
as$z=>$X){$_g[]="$z = $X";if(isset($Ce[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$_g)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($H,$Z,$_,$Zd=0,$N=" "){return($_!==null?" TOP (".($_+$Zd).")":"")." $H$Z";}function
limit1($R,$H,$Z,$N="\n"){return
limit($H,$Z,1,0,$N);}function
db_collation($m,$cb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$J=array();foreach($l
as$m){$h->select_db($m);$J[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($C=""){$J=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$K){if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$K){$U=$K["type"];$ud=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($ud?"($ud)":""),"type"=>$U,"length"=>$ud,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$K){$C=$K["name"];$J[$C]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$C]["lengths"]=array();$J[$C]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$C]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$e)$J[preg_replace('~_.*~','',$e)][]=$e;return$J;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$h->error)));}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$e)?" COLLATE $e":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($C,$e){if(preg_match('~^[a-z0-9_]+$~i',$e))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $e");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){$c=array();foreach($q
as$p){$f=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $f";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($rc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($f!=$X[0])queries("EXEC sp_rename ".q(table($R).".$f").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$C)queries("EXEC sp_rename ".q(table($R)).", ".q($C));if($rc)$c[""]=$rc;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $z".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$w=array();$Fb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Fb[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$Fb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Fb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$H){$h->query("SET SHOWPLAN_ALL ON");$J=$h->query($H);$h->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($S,$Z){}function
foreign_keys($R){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$K){$uc=&$J[$K["FK_NAME"]];$uc["table"]=$K["PKTABLE_NAME"];$uc["source"][]=$K["FKCOLUMN_NAME"];$uc["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Kg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Kg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Kg,$Sf){return
apply_queries("ALTER SCHEMA ".idf_escape($Sf)." TRANSFER",array_merge($T,$Kg));}function
trigger($C){if($C=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$J["text"]);return$J;}function
triggers($R){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($gf){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($gc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$gc);}$y="mssql";$sg=array();$If=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$sg+=$X;$If[$z]=array_keys($X);}$zg=array();$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$_c=array("len","lower","round","upper");$Dc=array("avg","count","count distinct","max","min","sum");$Jb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Eb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Ae=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$G){$this->_link=ibase_connect($O,$V,$G);if($this->_link){$Cg=explode(':',$O);$this->service_link=ibase_service_attach($Cg[0],$V,$G);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($H,$tg=false){$I=ibase_query($H,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$p=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$p=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$p['name'],'orgname'=>$p['name'],'type'=>$p['type'],'charsetnr'=>$p['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($qc){return
array("domain");}function
limit($H,$Z,$_,$Zd=0,$N=" "){$J='';$J.=($_!==null?$N."FIRST $_".($Zd?" SKIP $Zd":""):"");$J.=" $H$Z";return$J;}function
limit1($R,$H,$Z,$N="\n"){return
limit($H,$Z,1,0,$N);}function
db_collation($m,$cb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$H='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($h->_link,$H);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($C="",$fc=false){global$h;$J=array();$sb=tables_list();foreach($sb
as$w=>$X){$w=trim($w);$J[$w]=array('Name'=>$w,'Engine'=>'standard',);if($C==$w)return$J[$w];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$J=array();$H='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($h->_link,$H);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($R,$i=null){$J=array();return$J;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($gf){return
true;}function
support($gc){return
preg_match("~^(columns|sql|status|table)$~",$gc);}$y="firebird";$ge=array("=");$_c=array();$Dc=array();$Jb=array();}$Eb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Ae=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($H,$tg=false){$F=array('SelectExpression'=>$H,'ConsistentRead'=>'true');if($this->next)$F['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$F,$this->timeout);if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$H)){$Mf=0;foreach($I
as$hd)$Mf+=$hd->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Mf,))));}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$hd){$K=array();if($hd->Name!='')$K['itemName()']=(string)$hd->Name;foreach($hd->Attribute
as$Ba){$C=$this->_processValue($Ba->Name);$Y=$this->_processValue($Ba->Value);if(isset($K[$C])){$K[$C]=(array)$K[$C];$K[$C][]=$Y;}else$K[$C]=$Y;}$this->_rows[]=$K;foreach($K
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Lb){return(is_object($Lb)&&$Lb['encoding']=='base64'?base64_decode($Lb):(string)$Lb);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$z=>$X)$J[$z]=$K[$z];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$md=array_keys($this->_rows[0]);return(object)array('name'=>$md[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Ce="itemName()";function
_chunkRequest($Pc,$qa,$F,$Yb=array()){global$h;foreach(array_chunk($Pc,25)as$Xa){$re=$F;foreach($Xa
as$t=>$u){$re["Item.$t.ItemName"]=$u;foreach($Yb
as$z=>$X)$re["Item.$t.$z"]=$X;}if(!sdb_request($qa,$re))return
false;}$h->affected_rows=count($Pc);return
true;}function
_extractIds($R,$Le,$_){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$Le,$Ed))$J=array_map('idf_unescape',$Ed[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$Le.($_?" LIMIT 1":"")))as$hd)$J[]=$hd->Name;}return$J;}function
select($R,$M,$Z,$Ac,$je=array(),$_=1,$E=0,$Ee=false){global$h;$h->next=$_GET["next"];$J=parent::select($R,$M,$Z,$Ac,$je,$_,$E,$Ee);$h->next=0;return$J;}function
delete($R,$Le,$_=0){return$this->_chunkRequest($this->_extractIds($R,$Le,$_),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$Le,$_=0,$N="\n"){$xb=array();$cd=array();$t=0;$Pc=$this->_extractIds($R,$Le,$_);$u=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$z=>$X){$z=idf_unescape($z);if($X=="NULL"||($u!=""&&array($u)!=$Pc))$xb["Attribute.".count($xb).".Name"]=$z;if($X!="NULL"){foreach((array)$X
as$id=>$W){$cd["Attribute.$t.Name"]=$z;$cd["Attribute.$t.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$id)$cd["Attribute.$t.Replace"]="true";$t++;}}}$F=array('DomainName'=>$R);return(!$cd||$this->_chunkRequest(($u!=""?array($u):$Pc),'BatchPutAttributes',$F,$cd))&&(!$xb||$this->_chunkRequest($Pc,'BatchDeleteAttributes',$F,$xb));}function
insert($R,$P){$F=array("DomainName"=>$R);$t=0;foreach($P
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$F["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$F["Attribute.$t.Name"]=$C;$F["Attribute.$t.Value"]=(is_array($Y)?$X:idf_unescape($Y));$t++;}}}}return
sdb_request('PutAttributes',$F);}function
insertUpdate($R,$L,$Ce){foreach($L
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($gc){return
preg_match('~sql~',$gc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$cb){}function
tables_list(){global$h;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$J[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($C="",$fc=false){$J=array();foreach(($C!=""?array($C=>true):tables_list())as$R=>$U){$K=array("Name"=>$R,"Auto_increment"=>"");if(!$fc){$Md=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Md){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$z=>$X)$K[$z]=(string)$Md->$X;}}if($C!="")return$K;$J[$R]=$K;}return$J;}function
explain($h,$H){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($v){return
idf_escape($v);}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
limit($H,$Z,$_,$Zd=0,$N=" "){return" $H$Z".($_!==null?$N."LIMIT $_":"");}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($va,$sb,$z,$Pe=false){$Na=64;if(strlen($z)>$Na)$z=pack("H*",$va($z));$z=str_pad($z,$Na,"\0");$jd=$z^str_repeat("\x36",$Na);$kd=$z^str_repeat("\x5C",$Na);$J=$va($kd.pack("H*",$va($jd.$sb)));if($Pe)$J=pack("H*",$J);return$J;}function
sdb_request($qa,$F=array()){global$b,$h;list($Mc,$F['AWSAccessKeyId'],$jf)=$b->credentials();$F['Action']=$qa;$F['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$F['Version']='2009-04-15';$F['SignatureVersion']=2;$F['SignatureMethod']='HmacSHA1';ksort($F);$H='';foreach($F
as$z=>$X)$H.='&'.rawurlencode($z).'='.rawurlencode($X);$H=str_replace('%7E','~',substr($H,1));$H.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Mc)."\n/\n$H",$jf,true)));@ini_set('track_errors',1);$jc=@file_get_contents((preg_match('~^https?://~',$Mc)?$Mc:"http://$Mc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$H,'ignore_errors'=>1,))));if(!$jc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Vg=simplexml_load_string($jc);if(!$Vg){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($Vg->Errors){$o=$Vg->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$Rf=$qa."Result";return($Vg->$Rf?$Vg->$Rf:true);}function
sdb_request_all($qa,$Rf,$F=array(),$Yf=0){$J=array();$Ef=($Yf?microtime(true):0);$_=(preg_match('~LIMIT\s+(\d+)\s*$~i',$F['SelectExpression'],$B)?$B[1]:0);do{$Vg=sdb_request($qa,$F);if(!$Vg)break;foreach($Vg->$Rf
as$Lb)$J[]=$Lb;if($_&&count($J)>=$_){$_GET["next"]=$Vg->NextToken;break;}if($Yf&&microtime(true)-$Ef>$Yf)return
false;$F['NextToken']=$Vg->NextToken;if($_)$F['SelectExpression']=preg_replace('~\d+\s*$~',$_-count($J),$F['SelectExpression']);}while($Vg->NextToken);return$J;}$y="simpledb";$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$_c=array();$Dc=array("count");$Jb=array(array("json"));}$Eb["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Ae=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$G){global$b;$m=$b->database();$D=array();if($V!=""){$D["username"]=$V;$D["password"]=$G;}if($m!="")$D["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$O",$D);return
true;}catch(Exception$Vb){$this->error=$Vb->getMessage();return
false;}}function
query($H){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Vb){$this->error=$Vb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$hd){$K=array();foreach($hd
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$K[$z]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$z=>$X)$J[$z]=$K[$z];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$md=array_keys($this->_rows[0]);$C=$md[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$Ce="_id";function
select($R,$M,$Z,$Ac,$je=array(),$_=1,$E=0,$Ee=false){$M=($M==array("*")?array():array_fill_keys($M,true));$yf=array();foreach($je
as$X){$X=preg_replace('~ DESC$~','',$X,1,$mb);$yf[$X]=($mb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$M)->sort($yf)->limit($_!=""?+$_:0)->skip($E*$_));}function
insert($R,$P){try{$J=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$P['_id'];return!$J['err'];}catch(Exception$Vb){$this->_conn->error=$Vb->getMessage();return
false;}}}function
get_databases($qc){global$h;$J=array();$ub=$h->_link->listDBs();foreach($ub['databases']as$m)$J[]=$m['name'];return$J;}function
count_tables($l){global$h;$J=array();foreach($l
as$m)$J[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$J;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$h;foreach($l
as$m){$Ye=$h->_link->selectDB($m)->drop();if(!$Ye['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$J=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$w){$_b=array();foreach($w["key"]as$f=>$U)$_b[]=($U==-1?'1':null);$J[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$_b,);}return$J;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$ge=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$error,$last_id;var$_link;var$_db,$_db_name;function
connect($O,$V,$G){global$b;$m=$b->database();$D=array();if($V!=""){$D["username"]=$V;$D["password"]=$G;}if($m!="")$D["db"]=$m;try{$d='MongoDB\Driver\Manager';$this->_link=new$d("mongodb://$O",$D);return
true;}catch(Exception$Vb){$this->error=$Vb->getMessage();return
false;}}function
query($H){return
false;}function
select_db($k){try{$this->_db_name=$k;return
true;}catch(Exception$Vb){$this->error=$Vb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$hd){$K=array();foreach($hd
as$z=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$z]=63;$K[$z]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$K;foreach($K
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=$I->count;}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$z=>$X)$J[$z]=$K[$z];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$md=array_keys($this->_rows[0]);$C=$md[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$Ce="_id";function
select($R,$M,$Z,$Ac,$je=array(),$_=1,$E=0,$Ee=false){global$h;$M=($M==array("*")?array():array_fill_keys($M,1));if(count($M)&&!isset($M['_id']))$M['_id']=0;$Z=where_to_query($Z);$yf=array();foreach($je
as$X){$X=preg_replace('~ DESC$~','',$X,1,$mb);$yf[$X]=($mb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$_=$_GET['limit'];$_=min(200,max(1,(int)$_));$wf=$E*$_;$d='MongoDB\Driver\Query';$H=new$d($Z,array('projection'=>$M,'limit'=>$_,'skip'=>$wf,'sort'=>$yf));$bf=$h->_link->executeQuery("$h->_db_name.$R",$H);return
new
Min_Result($bf);}function
update($R,$P,$Le,$_=0,$N="\n"){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($Le);$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());if(isset($P['_id']))unset($P['_id']);$Ue=array();foreach($P
as$z=>$Y){if($Y=='NULL'){$Ue[$z]=1;unset($P[$z]);}}$_g=array('$set'=>$P);if(count($Ue))$_g['$unset']=$Ue;$Ra->update($Z,$_g,array('upsert'=>false));$bf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$bf->getModifiedCount();return
true;}function
delete($R,$Le,$_=0){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($Le);$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());$Ra->delete($Z,array('limit'=>$_));$bf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$bf->getDeletedCount();return
true;}function
insert($R,$P){global$h;$m=$h->_db_name;$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());if(isset($P['_id'])&&empty($P['_id']))unset($P['_id']);$Ra->insert($P);$bf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$bf->getInsertedCount();return
true;}}function
get_databases($qc){global$h;$J=array();$d='MongoDB\Driver\Command';$fb=new$d(array('listDatabases'=>1));$bf=$h->_link->executeCommand('admin',$fb);foreach($bf
as$ub){foreach($ub->databases
as$m)$J[]=$m->name;}return$J;}function
count_tables($l){$J=array();return$J;}function
tables_list(){global$h;$d='MongoDB\Driver\Command';$fb=new$d(array('listCollections'=>1));$bf=$h->_link->executeCommand($h->_db_name,$fb);$db=array();foreach($bf
as$I)$db[$I->name]='table';return$db;}function
drop_databases($l){return
false;}function
indexes($R,$i=null){global$h;$J=array();$d='MongoDB\Driver\Command';$fb=new$d(array('listIndexes'=>$R));$bf=$h->_link->executeCommand($h->_db_name,$fb);foreach($bf
as$w){$_b=array();$g=array();foreach(get_object_vars($w->key)as$f=>$U){$_b[]=($U==-1?'1':null);$g[]=$f;}$J[$w->name]=array("type"=>($w->name=="_id_"?"PRIMARY":(isset($w->unique)?"UNIQUE":"INDEX")),"columns"=>$g,"lengths"=>array(),"descs"=>$_b,);}return$J;}function
fields($R){$q=fields_from_edit();if(!count($q)){global$n;$I=$n->select($R,array("*"),null,null,array(),10);while($K=$I->fetch_assoc()){foreach($K
as$z=>$X){$K[$z]=null;$q[$z]=array("field"=>$z,"type"=>"string","null"=>($z!=$n->primary),"auto_increment"=>($z==$n->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$q;}function
found_rows($S,$Z){global$h;$Z=where_to_query($Z);$d='MongoDB\Driver\Command';$fb=new$d(array('count'=>$S['Name'],'query'=>$Z));$bf=$h->_link->executeCommand($h->_db_name,$fb);$fg=$bf->toArray();return$fg[0]->n;}function
sql_query_where_parser($Le){$Le=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$Le));$Le=preg_replace('/\)\)\)$/',')',$Le);$Sg=explode(' AND ',$Le);$Tg=explode(') OR (',$Le);$Z=array();foreach($Sg
as$Qg)$Z[]=trim($Qg);if(count($Tg)==1)$Tg=array();elseif(count($Tg)>1)$Z=array();return
where_to_query($Z,$Tg);}function
where_to_query($Og=array(),$Pg=array()){global$ge;$sb=array();foreach(array('and'=>$Og,'or'=>$Pg)as$U=>$Z){if(is_array($Z)){foreach($Z
as$Zb){list($bb,$ee,$X)=explode(" ",$Zb,3);if($bb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$d='MongoDB\BSON\ObjectID';$X=new$d($X);}if(!in_array($ee,$ge))continue;if(preg_match('~^\(f\)(.+)~',$ee,$B)){$X=(float)$X;$ee=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$ee,$B)){$tb=new
DateTime($X);$d='MongoDB\BSON\UTCDatetime';$X=new$d($tb->getTimestamp()*1000);$ee=$B[1];}switch($ee){case'=':$ee='$eq';break;case'!=':$ee='$ne';break;case'>':$ee='$gt';break;case'<':$ee='$lt';break;case'>=':$ee='$gte';break;case'<=':$ee='$lte';break;case'regex':$ee='$regex';break;default:continue;}if($U=='and')$sb['$and'][]=array($bb=>array($ee=>$X));elseif($U=='or')$sb['$or'][]=array($bb=>array($ee=>$X));}}}return$sb;}$ge=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($v){return$v;}function
idf_escape($v){return$v;}function
table_status($C="",$fc=false){$J=array();foreach(tables_list()as$R=>$U){$J[$R]=array("Name"=>$R);if($C==$R)return$J[$R];}return$J;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$C,$P)=$X;if($P=="DROP")$J=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$C));else{$g=array();foreach($P
as$f){$f=preg_replace('~ DESC$~','',$f,1,$mb);$g[$f]=($mb?-1:1);}$J=$h->_db->selectCollection($R)->ensureIndex($g,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($J['errmsg']){$h->error=$J['errmsg'];return
false;}}return
true;}function
support($gc){return
preg_match("~database|indexes~",$gc);}function
db_collation($m,$cb){}function
information_schema(){}function
is_view($S){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){global$h;if($R==""){$h->_db->createCollection($C);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$Ye=$h->_db->selectCollection($R)->drop();if(!$Ye['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$Ye=$h->_db->selectCollection($R)->remove();if(!$Ye['ok'])return
false;}return
true;}$y="mongo";$_c=array();$Dc=array();$Jb=array(array("json"));}$Eb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Ae=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($ve,$kb=array(),$Nd='GET'){@ini_set('track_errors',1);$jc=@file_get_contents("$this->_url/".ltrim($ve,'/'),false,stream_context_create(array('http'=>array('method'=>$Nd,'content'=>$kb===null?$kb:json_encode($kb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$jc){$this->error=$php_errormsg;return$jc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$jc;return
false;}$J=json_decode($jc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$jb=get_defined_constants(true);foreach($jb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$J;}function
query($ve,$kb=array(),$Nd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($ve,'/'),$kb,$Nd);}function
connect($O,$V,$G){preg_match('~^(https?://)?(.*)~',$O,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$G@$B[2]";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($this->_rows);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$M,$Z,$Ac,$je=array(),$_=1,$E=0,$Ee=false){global$b;$sb=array();$H="$R/_search";if($M!=array("*"))$sb["fields"]=$M;if($je){$yf=array();foreach($je
as$bb){$bb=preg_replace('~ DESC$~','',$bb,1,$mb);$yf[]=($mb?array($bb=>"desc"):$bb);}$sb["sort"]=$yf;}if($_){$sb["size"]=+$_;if($E)$sb["from"]=($E*$_);}foreach($Z
as$X){list($bb,$ee,$X)=explode(" ",$X,3);if($bb=="_id")$sb["query"]["ids"]["values"][]=$X;elseif($bb.$X!=""){$Tf=array("term"=>array(($bb!=""?$bb:"_all")=>$X));if($ee=="=")$sb["query"]["filtered"]["filter"]["and"][]=$Tf;else$sb["query"]["filtered"]["query"]["bool"]["must"][]=$Tf;}}if($sb["query"]&&!$sb["query"]["filtered"]["query"]&&!$sb["query"]["ids"])$sb["query"]["filtered"]["query"]=array("match_all"=>array());$Ef=microtime(true);$if=$this->_conn->query($H,$sb);if($Ee)echo$b->selectQuery("$H: ".print_r($sb,true),$Ef,!$if);if(!$if)return
false;$J=array();foreach($if['hits']['hits']as$Lc){$K=array();if($M==array("*"))$K["_id"]=$Lc["_id"];$q=$Lc['_source'];if($M!=array("*")){$q=array();foreach($M
as$z)$q[$z]=$Lc['fields'][$z];}foreach($q
as$z=>$X){if($sb["fields"])$X=$X[0];$K[$z]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}function
update($U,$Qe,$Le){$ue=preg_split('~ *= *~',$Le);if(count($ue)==2){$u=trim($ue[1]);$H="$U/$u";return$this->_conn->query($H,$Qe,'POST');}return
false;}function
insert($U,$Qe){$u="";$H="$U/$u";$Ye=$this->_conn->query($H,$Qe,'POST');$this->_conn->last_id=$Ye['_id'];return$Ye['created'];}function
delete($U,$Le){$Pc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Pc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Ta){$ue=preg_split('~ *= *~',$Ta);if(count($ue)==2)$Pc[]=trim($ue[1]);}}$this->_conn->affected_rows=0;foreach($Pc
as$u){$H="{$U}/{$u}";$Ye=$this->_conn->query($H,'{}','DELETE');if(is_array($Ye)&&$Ye['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
support($gc){return
preg_match("~database|table|columns~",$gc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$J=$h->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($m,$cb){}function
engines(){return
array();}function
count_tables($l){global$h;$J=array();$I=$h->query('_stats');if($I&&$I['indices']){$Vc=$I['indices'];foreach($Vc
as$Uc=>$Ff){$Tc=$Ff['total']['indexing'];$J[$Uc]=$Tc['index_total'];}}return$J;}function
tables_list(){global$h;$J=$h->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$h->_db]["mappings"]),'table');return$J;}function
table_status($C="",$fc=false){global$h;$if=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$J=array();if($if){$T=$if["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$J[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($C!=""&&$C==$R["key"])return$J[$C];}}return$J;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$I=$h->query("$R/_mapping");$J=array();if($I){$Ad=$I[$R]['properties'];if(!$Ad)$Ad=$I[$h->_db]['mappings'][$R]['properties'];if($Ad){foreach($Ad
as$C=>$p){$J[$C]=array("field"=>$C,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($p["properties"]){unset($J[$C]["privileges"]["insert"]);unset($J[$C]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($R){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){global$h;$He=array();foreach($q
as$dc){$hc=trim($dc[1][0]);$ic=trim($dc[1][1]?$dc[1][1]:"text");$He[$hc]=array('type'=>$ic);}if(!empty($He))$He=array('properties'=>$He);return$h->query("_mapping/{$C}",$He,'PUT');}function
drop_tables($T){global$h;$J=true;foreach($T
as$R)$J=$J&&$h->query(urlencode($R),array(),'DELETE');return$J;}function
last_id(){global$h;return$h->last_id;}$y="elastic";$ge=array("=","query");$_c=array();$Dc=array();$Jb=array(array("json"));$sg=array();$If=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$z=>$X){$sg+=$X;$If[$z]=array_keys($X);}}$Eb=array("server"=>"MySQL")+$Eb;if(!defined("DRIVER")){$Ae=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($O="",$V="",$G="",$k=null,$ze=null,$xf=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Mc,$ze)=explode(":",$O,2);$Df=$b->connectSsl();if($Df)$this->ssl_set($Df['key'],$Df['cert'],$Df['ca'],'','');$J=@$this->real_connect(($O!=""?$Mc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$G!=""?$G:ini_get("mysqli.default_pw")),$k,(is_numeric($ze)?$ze:ini_get("mysqli.default_port")),(!is_numeric($ze)?$ze:$xf),($Df?64:0));return$J;}function
set_charset($Sa){if(parent::set_charset($Sa))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Sa");}function
result($H,$p=0){$I=$this->query($H);if(!$I)return
false;$K=$I->fetch_array();return$K[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$G){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$G"!=""?$G:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Sa){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Sa,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Sa");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($H,$tg=false){$I=@($tg?mysql_unbuffered_query($H,$this->_link):mysql_query($H,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($H){return$this->_result=$this->query($H);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($H,$p=0){$I=$this->query($H);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$G){global$b;$D=array();$Df=$b->connectSsl();if($Df)$D=array(PDO::MYSQL_ATTR_SSL_KEY=>$Df['key'],PDO::MYSQL_ATTR_SSL_CERT=>$Df['cert'],PDO::MYSQL_ATTR_SSL_CA=>$Df['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$O)),$V,$G,$D);return
true;}function
set_charset($Sa){$this->query("SET NAMES $Sa");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($H,$tg=false){$this->setAttribute(1000,!$tg);return
parent::query($H,$tg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$L,$Ce){$g=array_keys(reset($L));$Be="INSERT INTO ".table($R)." (".implode(", ",$g).") VALUES\n";$Gg=array();foreach($g
as$z)$Gg[$z]="$z = VALUES($z)";$Lf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Gg);$Gg=array();$ud=0;foreach($L
as$P){$Y="(".implode(", ",$P).")";if($Gg&&(strlen($Be)+$ud+strlen($Y)+strlen($Lf)>1e6)){if(!queries($Be.implode(",\n",$Gg).$Lf))return
false;$Gg=array();$ud=0;}$Gg[]=$Y;$ud+=strlen($Y)+2;}return
queries($Be.implode(",\n",$Gg).$Lf);}function
convertSearch($v,$X,$p){return(preg_match('~char|text|enum|set~',$p["type"])&&!preg_match("~^utf8~",$p["collation"])?"CONVERT($v USING ".charset($this->_conn).")":$v);}function
warnings(){$I=$this->_conn->query("SHOW WARNINGS");if($I&&$I->num_rows){ob_start();select($I);return
ob_get_clean();}}function
tableHelp($C){$Bd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Bd?"information-schema-$C-table/":str_replace("_","-",$C)."-table.html"));if(DB=="mysql")return($Bd?"mysql$C-table/":"system-database.html");}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b,$sg,$If;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$If['Strings'][]="json";$sg["json"]=4294967295;}return$h;}$J=$h->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($ff=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$ff;return$J;}function
get_databases($qc){$J=get_session("dbs");if($J===null){$H=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$J=($qc?slow_query($H):get_vals($H));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($H,$Z,$_,$Zd=0,$N=" "){return" $H$Z".($_!==null?$N."LIMIT $_".($Zd?" OFFSET $Zd":""):"");}function
limit1($R,$H,$Z,$N="\n"){return
limit($H,$Z,1,0,$N);}function
db_collation($m,$cb){global$h;$J=null;$nb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$nb,$B))$J=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$nb,$B))$J=$cb[$B[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$J=array();foreach($l
as$m)$J[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$J;}function
table_status($C="",$fc=false){$J=array();foreach(get_rows($fc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($C!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$K){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$K["Type"],$B);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$B[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$B)?$B[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$K){$C=$K["Key_name"];$J[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?($K["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$J[$C]["columns"][]=$K["Column_name"];$J[$C]["lengths"][]=($K["Index_type"]=="SPATIAL"?null:$K["Sub_part"]);$J[$C]["descs"][]=null;}return$J;}function
foreign_keys($R){global$h,$be;static$we='`(?:[^`]|``)+`';$J=array();$ob=$h->result("SHOW CREATE TABLE ".table($R),1);if($ob){preg_match_all("~CONSTRAINT ($we) FOREIGN KEY ?\\(((?:$we,? ?)+)\\) REFERENCES ($we)(?:\\.($we))? \\(((?:$we,? ?)+)\\)(?: ON DELETE ($be))?(?: ON UPDATE ($be))?~",$ob,$Ed,PREG_SET_ORDER);foreach($Ed
as$B){preg_match_all("~$we~",$B[2],$zf);preg_match_all("~$we~",$B[5],$Sf);$J[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$zf[0]),"target"=>array_map('idf_unescape',$Sf[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$J;}function
view($C){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$z=>$X)asort($J[$z]);return$J;}function
information_schema($m){return(min_version(5)&&$m=="information_schema")||(min_version(5.5)&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).($e?" COLLATE ".q($e):""));}function
drop_databases($l){$J=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($C,$e){$J=false;if(create_database($C,$e)){$Ve=array();foreach(tables_list()as$R=>$U)$Ve[]=table($R)." TO ".idf_escape($C).".".table($R);$J=(!$Ve||queries("RENAME TABLE ".implode(", ",$Ve)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Fa="";break;}if($w["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($R,$C,$q,$rc,$gb,$Qb,$e,$Ea,$te){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$rc);$Gf=($gb!==null?" COMMENT=".q($gb):"").($Qb?" ENGINE=".q($Qb):"").($e?" COLLATE ".q($e):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$Gf$te");if($R!=$C)$c[]="RENAME TO ".table($C);if($Gf)$c[]=ltrim($Gf);return($c||$te?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$te):true);}function
alter_indexes($R,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Kg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Kg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Kg,$Sf){$Ve=array();foreach(array_merge($T,$Kg)as$R)$Ve[]=table($R)." TO ".idf_escape($Sf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$Ve));}function
copy_tables($T,$Kg,$Sf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$C=($Sf==DB?table("copy_$R"):idf_escape($Sf).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R)))return
false;}foreach($Kg
as$R){$C=($Sf==DB?table("copy_$R"):idf_escape($Sf).".".table($R));$Jg=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Jg[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$h,$Rb,$ad,$sg;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$_f="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$rg="((".implode("|",array_merge(array_keys($sg),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Rb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$we="$_f*(".($U=="FUNCTION"?"":$ad).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$rg";$nb=$h->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$we\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$rg\\s+":"")."(.*)~is",$nb,$B);$q=array();preg_match_all("~$we\\s*,?~is",$B[1],$Ed,PREG_SET_ORDER);foreach($Ed
as$qe){$C=str_replace("``","`",$qe[2]).$qe[3];$q[]=array("field"=>$C,"type"=>strtolower($qe[5]),"length"=>preg_replace_callback("~$Rb~s",'normalize_enum',$qe[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$qe[8] $qe[7]"))),"null"=>1,"full_type"=>$qe[4],"inout"=>strtoupper($qe[1]),"collation"=>strtolower($qe[9]),);}if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$B[11]);return
array("fields"=>$q,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($C,$K){return
idf_escape($C);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$H){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$H);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($gf){return
true;}function
create_sql($R,$Ea,$Jf){global$h;$J=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ea)$J=preg_replace('~ AUTO_INCREMENT=\\d+~','',$J);return$J;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$K)$J.="\nCREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$J){if(preg_match("~binary~",$p["type"]))$J="UNHEX($J)";if($p["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$J=(min_version(8)?"ST_":"")."GeomFromText($J)";return$J;}function
support($gc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view"))."~",$gc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$y="sql";$sg=array();$If=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$sg+=$X;$If[$z]=array_keys($X);}$zg=array("unsigned","zerofill","unsigned zerofill");$ge=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$_c=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Dc=array("avg","count","count distinct","group_concat","max","min","sum");$Jb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.6.2";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($nb=false){return
password_file($nb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($O){}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($qc=true){return
get_databases($qc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$J=array();$r="adminer.css";if(file_exists($r))$J[]=$r;return$J;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>Username<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Password<td><input type="password" name="auth[password]">
</table>
',script("focus(qs('#username'));"),"<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($zd,$G){return
true;}function
tableName($Of){return
h($Of["Comment"]!=""?$Of["Comment"]:$Of["Name"]);}function
fieldName($p,$je=0){return
h(preg_replace('~\s+\[.*\]$~','',($p["comment"]!=""?$p["comment"]:$p["field"])));}function
selectLinks($Of,$P=""){$a=$Of["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'New item'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Nf){$J=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$K)$J[$K["TABLE_NAME"]]["keys"][$K["CONSTRAINT_NAME"]][$K["COLUMN_NAME"]]=$K["REFERENCED_COLUMN_NAME"];foreach($J
as$z=>$X){$C=$this->tableName(table_status($z,true));if($C!=""){$if=preg_quote($Nf);$N="(:|\\s*-)?\\s+";$J[$z]["name"]=(preg_match("(^$if$N(.+)|^(.+?)$N$if\$)iu",$C,$B)?$B[2].$B[3]:$C);}else
unset($J[$z]);}return$J;}function
backwardKeysPrint($Ia,$K){foreach($Ia
as$R=>$Ha){foreach($Ha["keys"]as$eb){$A=ME.'select='.urlencode($R);$t=0;foreach($eb
as$f=>$X)$A.=where_link($t++,$f,$K[$X]);echo"<a href='".h($A)."'>".h($Ha["name"])."</a>";$A=ME.'edit='.urlencode($R);foreach($eb
as$f=>$X)$A.="&set".urlencode("[".bracket_escape($f)."]")."=".urlencode($K[$X]);echo"<a href='".h($A)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($H,$Ef,$ec=false){return"<!--\n".str_replace("--","--><!-- ",$H)."\n(".format_time($Ef).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($L,$tc){$J=$L;foreach($L[0]as$z=>$X){if(list($R,$u,$C)=$this->_foreignColumn($tc,$z)){$Pc=array();foreach($L
as$K)$Pc[$K[$z]]=q($K[$z]);$zb=$this->_values[$R];if(!$zb)$zb=get_key_vals("SELECT $u, $C FROM ".table($R)." WHERE $u IN (".implode(", ",$Pc).")");foreach($L
as$Rd=>$K){if(isset($K[$z]))$J[$Rd][$z]=(string)$zb[$K[$z]];}}}return$J;}function
selectLink($X,$p){}function
selectVal($X,$A,$p,$le){$J=($X===null?"&nbsp;":$X);$A=h($A);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$J=lang(array('%d byte','%d bytes'),strlen($le));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$le))$J="<img src='$A' alt='$J'>";}if(like_bool($p)&&$J!="&nbsp;")$J=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?'yes':'no');if($A)$J="<a href='$A'".(is_url($A)?target_blank():"").">$J</a>";if(!$A&&!like_bool($p)&&preg_match(number_type(),$p["type"]))$J="<div class='number'>$J</div>";elseif(preg_match('~date~',$p["type"]))$J="<div class='datetime'>$J</div>";return$J;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~','$1-$3-$5',$X);return$X;}function
selectColumnsPrint($M,$g){}function
selectSearchPrint($Z,$g,$x){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$md=array();foreach($Z
as$z=>$X)$md[$X["col"]]=$z;$t=0;$q=fields($_GET["select"]);foreach($g
as$C=>$yb){$p=$q[$C];if(preg_match("~enum~",$p["type"])||like_bool($p)){$z=$md[$C];$t--;echo"<div>".h($yb)."<input type='hidden' name='where[$t][col]' value='".h($C)."'>:",(like_bool($p)?" <select name='where[$t][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$z]["val"],true)."</select>":enum_input("checkbox"," name='where[$t][val][]'",$p,(array)$Z[$z]["val"],($p["null"]?0:null))),"</div>\n";unset($g[$C]);}elseif(is_array($D=$this->_foreignKeyOptions($_GET["select"],$C))){if($q[$C]["null"])$D[0]='('.'empty'.')';$z=$md[$C];$t--;echo"<div>".h($yb)."<input type='hidden' name='where[$t][col]' value='".h($C)."'><input type='hidden' name='where[$t][op]' value='='>: <select name='where[$t][val]'>".optionlist($D,$Z[$z]["val"],true)."</select></div>\n";unset($g[$C]);}}$t=0;foreach($Z
as$X){if(($X["col"]==""||$g[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$t][col]'><option value=''>(".'anywhere'.")".optionlist($g,$X["col"],true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$t][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$t++;}}echo"<div><select name='where[$t][col]'><option value=''>(".'anywhere'.")".optionlist($g,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$t][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$t][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($je,$g,$x){$ke=array();foreach($x
as$z=>$w){$je=array();foreach($w["columns"]as$X)$je[]=$g[$X];if(count(array_filter($je,'strlen'))>1&&$z!="PRIMARY")$ke[$z]=implode(", ",$je);}if($ke){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$ke,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$_),"</div></fieldset>\n";}function
selectLengthPrint($Vf){}function
selectActionPrint($x){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Nb,$g){if($Nb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$g,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Nb)==1?'<input type="hidden" name="email_field" value="'.h(key($Nb)).'">':html_select("email_field",$Nb)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($g,$x){return
array(array(),array());}function
selectSearchProcess($q,$x){$J=array();foreach((array)$_GET["where"]as$z=>$Z){$bb=$Z["col"];$ee=$Z["op"];$X=$Z["val"];if(($z<0?"":$bb).$X!=""){$hb=array();foreach(($bb!=""?array($bb=>$q[$bb]):$q)as$C=>$p){if($bb!=""||is_numeric($X)||!preg_match(number_type(),$p["type"])){$C=idf_escape($C);if($bb!=""&&$p["type"]=="enum")$hb[]=(in_array(0,$X)?"$C IS NULL OR ":"")."$C IN (".implode(", ",array_map('intval',$X)).")";else{$Wf=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$ee&&$Wf&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$hb[]=$C.($Y=="NULL"?" IS".($ee==">="?" NOT":"")." $Y":(in_array($ee,$this->operators)||$ee=="="?" $ee $Y":($Wf?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($z<0&&$X=="0")$hb[]="$C IS NULL";}}}$J[]=($hb?"(".implode(" OR ",$hb).")":"1 = 0");}}return$J;}function
selectOrderProcess($q,$x){$Sc=$_GET["index_order"];if($Sc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Sc!=""?array($x[$Sc]):$x)as$w){if($Sc!=""||$w["type"]=="INDEX"){$Fc=array_filter($w["descs"]);$yb=false;foreach($w["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$yb=true;break;}}$J=array();foreach($w["columns"]as$z=>$X)$J[]=idf_escape($X).(($Fc?$w["descs"][$z]:$yb)?" DESC":"");return$J;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$tc){if($_POST["email_append"])return
true;if($_POST["email"]){$nf=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$Kf=$_POST["email_subject"];$Kd=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$Kf.$Kd",$Ed);$L=get_rows("SELECT DISTINCT $p".($Ed[1]?", ".implode(", ",array_map('idf_escape',array_unique($Ed[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($L,$tc)as$K){$We=array('{\\'=>'{');foreach($Ed[1]as$X)$We['{$'."$X}"]=$this->editVal($K[$X],$q[$X]);$Mb=$K[$_POST["email_field"]];if(is_mail($Mb)&&send_mail($Mb,strtr($Kf,$We),strtr($Kd,$We),$_POST["email_from"],$_FILES["email_files"]))$nf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$nf));}return
false;}function
selectQueryBuild($M,$Z,$Ac,$je,$_,$E){return"";}function
messageQuery($H,$Xf,$ec=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$H)."\n".($Xf?"($Xf)\n":"")."-->";}function
editFunctions($p){$J=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$J["NULL"]='empty';$J[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$J["now"]='now';if(preg_match('~_(md5|sha1)$~i',$p["field"],$B))$J[]=strtolower($B[1]);return$J;}function
editInput($R,$p,$Ca,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$Ca,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$D=$this->_foreignKeyOptions($R,$p["field"],$Y);if($D!==null)return(is_array($D)?"<select$Ca>".optionlist($D,$Y,true)."</select>":"<input value='".h($Y)."'$Ca class='hidden'>"."<input value='".h($D)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($p))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Ca>";$Kc="";if(preg_match('~time~',$p["type"]))$Kc='HH:MM:SS';if(preg_match('~date|timestamp~',$p["type"]))$Kc='[yyyy]-mm-dd'.($Kc?" [$Kc]":"");if($Kc)return"<input value='".h($Y)."'$Ca> ($Kc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Ca>";return'';}function
editHint($R,$p,$Y){return(preg_match('~\s+(\[.*\])$~',($p["comment"]!=""?$p["comment"]:$p["field"]),$B)?h(" $B[1]"):'');}function
processInput($p,$Y,$s=""){if($s=="now")return"$s()";$J=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$Y,$B))$J=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$J=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$J:q($J));if($Y==""&&like_bool($p))$J="0";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$J="NULL";elseif(preg_match('~^(md5|sha1)$~',$s))$J="$s($J)";return
unconvert_field($p,$J);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Jf,$H){global$h;$I=$h->query($H,1);if($I){while($K=$I->fetch_assoc()){if($Jf=="table"){dump_csv(array_keys($K));$Jf="INSERT";}dump_csv($K);}}}function
dumpFilename($Oc){return
friendly_url($Oc);}function
dumpHeaders($Oc,$Pd=false){$ac="csv";header("Content-Type: text/csv; charset=utf-8");return$ac;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Od){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Od=="auth"){$mc=true;foreach((array)$_SESSION["pwds"]as$Hg=>$sf){foreach($sf[""]as$V=>$G){if($G!==null){if($mc){echo"<p id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$mc=false;}echo"<a href='".h(auth_url($Hg,"",$V))."'>".($V!=""?h($V):"<i>".'empty'."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($Od);if($Od!="db"&&$Od!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Od){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$K){echo'<li>';$C=$this->tableName($K);if(isset($K["Engine"])&&$C!="")echo"<a href='".h(ME).'select='.urlencode($K["Name"])."'".bold($_GET["select"]==$K["Name"]||$_GET["edit"]==$K["Name"],"select")." title='".'Select data'."'>$C</a>\n";}echo"</ul>\n";}function
_foreignColumn($tc,$f){foreach((array)$tc[$f]as$sc){if(count($sc["source"])==1){$C=$this->rowDescription($sc["table"]);if($C!=""){$u=idf_escape($sc["target"][0]);return
array($sc["table"],$u,$C);}}}}function
_foreignKeyOptions($R,$f,$Y=null){global$h;if(list($Sf,$u,$C)=$this->_foreignColumn(column_foreign_keys($R),$f)){$J=&$this->_values[$Sf];if($J===null){$S=table_status($Sf);$J=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $u, $C FROM ".table($Sf)." ORDER BY 2"));}if(!$J&&$Y!==null)return$h->result("SELECT $C FROM ".table($Sf)." WHERE $u = ".q($Y));return$J;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($ag,$o="",$Qa=array(),$bg=""){global$ba,$ca,$b,$Eb,$y;page_headers();if(is_ajax()&&$o){page_messages($o);exit;}$cg=$ag.($bg!=""?": $bg":"");$dg=strip_tags($cg.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$dg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.6.2"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.6.2");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
';foreach($b->css()as$qb){echo'<link rel="stylesheet" type="text/css" href="',h($qb),'">
';}}echo'
<body class="ltr nojs">
';$r=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($r)&&filemtime($r)+86400>time()){$Ig=unserialize(file_get_contents($r));$Ie="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ig["version"],base64_decode($Ig["signature"]),$Ie)==1)$_COOKIE["adminer_version"]=$Ig["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$y,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Qa!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$Eb[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=$b->serverName(SERVER);$O=($O!=""?$O:'Server');if($Qa===false)echo"$O\n";else{echo"<a href='".($A?h($A):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Qa)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Qa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Qa
as$z=>$X){$yb=(is_array($X)?$X[1]:h($X));if($yb!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$yb</a> &raquo; ";}}echo"$ag\n";}}echo"<h2>$cg</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$pb){$Ic=array();foreach($pb
as$z=>$X)$Ic[]="$z $X";header("Content-Security-Policy: ".implode("; ",$Ic));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Vd;if(!$Vd)$Vd=base64_encode(rand_string());return$Vd;}function
page_messages($o){$Ag=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ld=$_SESSION["messages"][$Ag];if($Ld){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ld)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ag]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($Od=""){global$b,$gg;echo'</div>

';if($Od!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$gg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Od);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Rd){while($Rd>=2147483648)$Rd-=4294967296;while($Rd<=-2147483649)$Rd+=4294967296;return(int)$Rd;}function
long2str($W,$Mg){$ff='';foreach($W
as$X)$ff.=pack('V',$X);if($Mg)return
substr($ff,0,end($W));return$ff;}function
str2long($ff,$Mg){$W=array_values(unpack('V*',str_pad($ff,4*ceil(strlen($ff)/4),"\0")));if($Mg)$W[]=strlen($ff);return$W;}function
xxtea_mx($Xg,$Wg,$Mf,$id){return
int32((($Xg>>5&0x7FFFFFF)^$Wg<<2)+(($Wg>>3&0x1FFFFFFF)^$Xg<<4))^int32(($Mf^$Wg)+($id^$Xg));}function
encrypt_string($Hf,$z){if($Hf=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Hf,true);$Rd=count($W)-1;$Xg=$W[$Rd];$Wg=$W[0];$Je=floor(6+52/($Rd+1));$Mf=0;while($Je-->0){$Mf=int32($Mf+0x9E3779B9);$Ib=$Mf>>2&3;for($oe=0;$oe<$Rd;$oe++){$Wg=$W[$oe+1];$Qd=xxtea_mx($Xg,$Wg,$Mf,$z[$oe&3^$Ib]);$Xg=int32($W[$oe]+$Qd);$W[$oe]=$Xg;}$Wg=$W[0];$Qd=xxtea_mx($Xg,$Wg,$Mf,$z[$oe&3^$Ib]);$Xg=int32($W[$Rd]+$Qd);$W[$Rd]=$Xg;}return
long2str($W,false);}function
decrypt_string($Hf,$z){if($Hf=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Hf,false);$Rd=count($W)-1;$Xg=$W[$Rd];$Wg=$W[0];$Je=floor(6+52/($Rd+1));$Mf=int32($Je*0x9E3779B9);while($Mf){$Ib=$Mf>>2&3;for($oe=$Rd;$oe>0;$oe--){$Xg=$W[$oe-1];$Qd=xxtea_mx($Xg,$Wg,$Mf,$z[$oe&3^$Ib]);$Wg=int32($W[$oe]-$Qd);$W[$oe]=$Wg;}$Xg=$W[$Rd];$Qd=xxtea_mx($Xg,$Wg,$Mf,$z[$oe&3^$Ib]);$Wg=int32($W[0]-$Qd);$W[0]=$Wg;$Mf=int32($Mf-0x9E3779B9);}return
long2str($W,true);}$h='';$Hc=$_SESSION["token"];if(!$Hc)$_SESSION["token"]=rand(1,1e6);$gg=get_token();$xe=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$xe[$z]=$X;}}function
add_invalid_login(){global$b;$yc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$yc)return;$ed=unserialize(stream_get_contents($yc));$Xf=time();if($ed){foreach($ed
as$fd=>$X){if($X[0]<$Xf)unset($ed[$fd]);}}$dd=&$ed[$b->bruteForceKey()];if(!$dd)$dd=array($Xf+30*60,0);$dd[1]++;file_write_unlock($yc,serialize($ed));}function
check_invalid_login(){global$b;$ed=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$dd=$ed[$b->bruteForceKey()];$Ud=($dd[1]>29?$dd[0]-time():0);if($Ud>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Ud/60)));}$Da=$_POST["auth"];if($Da){session_regenerate_id();$Hg=$Da["driver"];$O=$Da["server"];$V=$Da["username"];$G=(string)$Da["password"];$m=$Da["db"];set_password($Hg,$O,$V,$G);$_SESSION["db"][$Hg][$O][$V][$m]=true;if($Da["permanent"]){$z=base64_encode($Hg)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$Fe=$b->permanentLogin(true);$xe[$z]="$z:".base64_encode($Fe?encrypt_string($G,$Fe):"");cookie("adminer_permanent",implode(" ",$xe));}if(count($_POST)==1||DRIVER!=$Hg||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Hg,$O,$V,$m));}elseif($_POST["logout"]){if($Hc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.sprintf('Thanks for using Adminer, consider <a href="%s">donating</a>.','https://sourceforge.net/donate/index.php?group_id=264133'));}}elseif($xe&&!$_SESSION["pwds"]){session_regenerate_id();$Fe=$b->permanentLogin();foreach($xe
as$z=>$X){list(,$Ya)=explode(":",$X);list($Hg,$O,$V,$m)=array_map('base64_decode',explode("-",$z));set_password($Hg,$O,$V,decrypt_string(base64_decode($Ya),$Fe));$_SESSION["db"][$Hg][$O][$V][$m]=true;}}function
unset_permanent(){global$xe;foreach($xe
as$z=>$X){list($Hg,$O,$V,$m)=array_map('base64_decode',explode("-",$z));if($Hg==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($xe[$z]);}cookie("adminer_permanent",implode(" ",$xe));}function
auth_error($o){global$b,$Hc;$tf=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$tf]||$_GET[$tf])&&!$Hc)$o='Session expired, please login again.';else{add_invalid_login();$G=get_password();if($G!==null){if($G===false)$o.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$tf]&&$_GET[$tf]&&ini_bool("session.use_only_cookies"))$o='Session support must be enabled.';$F=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$F["lifetime"]);page_header('Login',$o,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$Ae)),false);page_footer("auth");exit;}list($Mc,$ze)=explode(":",SERVER,2);if(is_numeric($ze)&&$ze<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$h=connect();$n=new
Min_Driver($h);}$zd=null;if(!is_object($h)||($zd=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($h)?h($h):(is_string($zd)?$zd:'Invalid credentials.')));if($Da&&$_POST["token"])$_POST["token"]=$gg;$o='';if($_POST){if(!verify_token()){$Zc="max_input_vars";$Id=ini_get($Zc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$Id||$X<$Id)){$Zc=$z;$Id=$X;}}}$o=(!$_POST["token"]&&$Id?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$Zc'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($Ic){return"=?UTF-8?B?".base64_encode($Ic)."?=";}function
send_mail($Mb,$Kf,$Kd,$zc="",$kc=array()){$Sb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Kd=str_replace("\n",$Sb,wordwrap(str_replace("\r","","$Kd\n")));$Pa=uniqid("boundary");$Aa="";foreach((array)$kc["error"]as$z=>$X){if(!$X)$Aa.="--$Pa$Sb"."Content-Type: ".str_replace("\n","",$kc["type"][$z]).$Sb."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$kc["name"][$z])."\"$Sb"."Content-Transfer-Encoding: base64$Sb$Sb".chunk_split(base64_encode(file_get_contents($kc["tmp_name"][$z])),76,$Sb).$Sb;}$Ka="";$Jc="Content-Type: text/plain; charset=utf-8$Sb"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Pa--$Sb";$Ka="--$Pa$Sb$Jc$Sb$Sb";$Jc="Content-Type: multipart/mixed; boundary=\"$Pa\"";}$Jc.=$Sb."MIME-Version: 1.0$Sb"."X-Mailer: Adminer Editor".($zc?$Sb."From: ".str_replace("\n","",$zc):"");return
mail($Mb,email_header($Kf),$Ka.$Kd.$Aa,$Jc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$be="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Eb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$n->select($a,$M,array(where($_GET,$q)),$M);$K=($I?$I->fetch_row():array());echo$n->value($K[0],$q[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$_g=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$C=>$p){if(!isset($p["privileges"][$_g?"update":"insert"])||$b->fieldName($p)=="")unset($q[$C]);}if($_POST&&!$o&&!isset($_GET["select"])){$yd=$_POST["referer"];if($_POST["insert"])$yd=($_g?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$yd))$yd=ME."select=".urlencode($a);$x=indexes($a);$vg=unique_array($_GET["where"],$x);$Me="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($yd,'Item has been deleted.',$n->delete($a,$Me,!$vg));else{$P=array();foreach($q
as$C=>$p){$X=process_input($p);if($X!==false&&$X!==null)$P[idf_escape($C)]=$X;}if($_g){if(!$P)redirect($yd);queries_redirect($yd,'Item has been updated.',$n->update($a,$P,$Me,!$vg));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$I=$n->insert($a,$P);$sd=($I?last_id():0);queries_redirect($yd,sprintf('Item%s has been inserted.',($sd?" $sd":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($q
as$C=>$p){if(isset($p["privileges"]["select"])){$za=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$za="''";if($y=="sql"&&preg_match("~enum|set~",$p["type"]))$za="1*".idf_escape($C);$M[]=($za?"$za AS ":"").idf_escape($C);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$n->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));if(!$I)$o=error();else{$K=$I->fetch_assoc();if(!$K)$K=false;}if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$q){if(!$Z){$I=$n->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($n->primary=>"");}if($K){foreach($K
as$z=>$X){if(!$Z)$K[$z]=null;$q[$z]=array("field"=>$z,"null"=>($z!=$n->primary),"auto_increment"=>($z==$n->primary));}}}edit_form($a,$q,$K,$_g);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$x=indexes($a);$q=fields($a);$vc=column_foreign_keys($a);$ae=$S["Oid"];parse_str($_COOKIE["adminer_import"],$sa);$df=array();$g=array();$Vf=null;foreach($q
as$z=>$p){$C=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$C!=""){$g[$z]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($p))$Vf=$b->selectLengthProcess();}$df+=$p["privileges"];}list($M,$Ac)=$b->selectColumnsProcess($g,$x);$gd=count($Ac)<count($M);$Z=$b->selectSearchProcess($q,$x);$je=$b->selectOrderProcess($q,$x);$_=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$wg=>$K){$za=convert_field($q[key($K)]);$M=array($za?$za:idf_escape(key($K)));$Z[]=where_check($wg,$q);$J=$n->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}$Ce=$yg=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$Ce=array_flip($w["columns"]);$yg=($M?$Ce:array());foreach($yg
as$z=>$X){if(in_array(idf_escape($z),$M))unset($yg[$z]);}break;}}if($ae&&!$Ce){$Ce=$yg=array($ae=>0);$x[]=array("type"=>"PRIMARY","columns"=>array($ae));}if($_POST&&!$o){$Rg=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Wa=array();foreach($_POST["check"]as$Ta)$Wa[]=where_check($Ta,$q);$Rg[]="((".implode(") OR (",$Wa)."))";}$Rg=($Rg?"\nWHERE ".implode(" AND ",$Rg):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$zc=($M?implode(", ",$M):"*").convert_fields($g,$q,$M)."\nFROM ".table($a);$Cc=($Ac&&$gd?"\nGROUP BY ".implode(", ",$Ac):"").($je?"\nORDER BY ".implode(", ",$je):"");if(!is_array($_POST["check"])||$Ce)$H="SELECT $zc$Rg$Cc";else{$ug=array();foreach($_POST["check"]as$X)$ug[]="(SELECT".limit($zc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$Cc,1).")";$H=implode(" UNION ALL ",$ug);}$b->dumpData($a,"table",$H);exit;}if(!$b->selectEmailProcess($Z,$vc)){if($_POST["save"]||$_POST["delete"]){$I=true;$ta=0;$P=array();if(!$_POST["delete"]){foreach($g
as$C=>$X){$X=process_input($q[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$P){if($_POST["clone"])$H="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Ce&&is_array($_POST["check"]))||$gd){$I=($_POST["delete"]?$n->delete($a,$Rg):($_POST["clone"]?queries("INSERT $H$Rg"):$n->update($a,$P,$Rg)));$ta=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Ng="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$I=($_POST["delete"]?$n->delete($a,$Ng,1):($_POST["clone"]?queries("INSERT".limit1($a,$H,$Ng)):$n->update($a,$P,$Ng,1)));if(!$I)break;$ta+=$h->affected_rows;}}}$Kd=lang(array('%d item has been affected.','%d items have been affected.'),$ta);if($_POST["clone"]&&$I&&$ta==1){$sd=last_id();if($sd)$Kd=sprintf('Item%s has been inserted.'," $sd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Kd,$I);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o='Ctrl+click on a value to modify it.';else{$I=true;$ta=0;foreach($_POST["val"]as$wg=>$K){$P=array();foreach($K
as$z=>$X){$z=bracket_escape($z,1);$P[idf_escape($z)]=(preg_match('~char|text~',$q[$z]["type"])||$X!=""?$b->processInput($q[$z],$X):"NULL");}$I=$n->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($wg,$q),!$gd&&!$Ce," ");if(!$I)break;$ta+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ta),$I);}}elseif(!is_string($jc=get_file("csv_file",true)))$o=upload_error($jc);elseif(!preg_match('~~u',$jc))$o='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($sa["output"])."&format=".urlencode($_POST["separator"]));$I=true;$eb=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$jc,$Ed);$ta=count($Ed[0]);$n->begin();$N=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Ed[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$N]*)$N~",$X.$N,$Fd);if(!$z&&!array_diff($Fd[1],$eb)){$eb=$Fd[1];$ta--;}else{$P=array();foreach($Fd[1]as$t=>$bb)$P[idf_escape($eb[$t])]=($bb==""&&$q[$eb[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$bb))));$L[]=$P;}}$I=(!$L||$n->insertUpdate($a,$L,$Ce));if($I)$I=$n->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ta),$I);$n->rollback();}}}$Pf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Pf",$o);$P=null;if(isset($df["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if($vc[$X["col"]]&&count($vc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$g&&support("table"))echo"<p class='error'>".'Unable to select the table'.($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$g);$b->selectSearchPrint($Z,$g,$x);$b->selectOrderPrint($je,$g,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($Vf);$b->selectActionPrint($x);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$xc=$h->result(count_rows($a,$Z,$gd,$Ac));$E=floor(max(0,$xc-1)/$_);}$kf=$M;$Bc=$Ac;if(!$kf){$kf[]="*";$lb=convert_fields($g,$q,$M);if($lb)$kf[]=substr($lb,2);}foreach($M
as$z=>$X){$p=$q[idf_unescape($X)];if($p&&($za=convert_field($p)))$kf[$z]="$za AS $X";}if(!$gd&&$yg){foreach($yg
as$z=>$X){$kf[]=idf_escape($z);if($Bc)$Bc[]=idf_escape($z);}}$I=$n->select($a,$kf,$Z,$Bc,$je,$_,$E,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$E)$I->seek($_*$E);$Ob=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($E&&$y=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&$_!=""&&$Ac&&$gd&&$y=="sql")$xc=$h->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".'No rows.'."\n";else{$Ja=$b->backwardKeys($a,$Pf);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Ac&&$M?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Sd=array();$_c=array();reset($M);$Oe=1;foreach($L[0]as$z=>$X){if(!isset($yg[$z])){$X=$_GET["columns"][key($M)];$p=$q[$M?($X?$X["col"]:current($M)):$z];$C=($p?$b->fieldName($p,$Oe):($X["fun"]?"*":$z));if($C!=""){$Oe++;$Sd[$z]=$C;$f=idf_escape($z);$Nc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$yb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Nc.($je[0]==$f||$je[0]==$z||(!$je&&$gd&&$Ac[0]==$f)?$yb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($Nc.$yb)."' title='".'descending'."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($z)."');");}echo"</span>";}$_c[$z]=$X["fun"];next($M);}}$vd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$z=>$X)$vd[$z]=max($vd[$z],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($_%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$vc)as$Rd=>$K){$vg=unique_array($L[$Rd],$x);if(!$vg){$vg=array();foreach($L[$Rd]as$z=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$z))$vg[$z]=$X;}}$wg="";foreach($vg
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&preg_match('~char|text|enum|set~',$q[$z]["type"])&&strlen($X)>64){$z=(strpos($z,'(')?$z:idf_escape($z));$z="MD5(".($y!='sql'||preg_match("~^utf8~",$q[$z]["collation"])?$z:"CONVERT($z USING ".charset($h).")").")";$X=md5($X);}$wg.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$Ac&&$M?"":"<td>".checkbox("check[]",substr($wg,1),in_array(substr($wg,1),(array)$_POST["check"])).($gd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$wg)."' class='edit'>".'edit'."</a>"));foreach($K
as$z=>$X){if(isset($Sd[$z])){$p=$q[$z];$X=$n->value($X,$p);if($X!=""&&(!isset($Ob[$z])||$Ob[$z]!=""))$Ob[$z]=(is_mail($X)?$Sd[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$wg;if(!$A&&$X!==null){foreach((array)$vc[$z]as$uc){if(count($vc[$z])==1||end($uc["source"])==$z){$A="";foreach($uc["source"]as$t=>$zf)$A.=where_link($t,$uc["target"][$t],$L[$Rd][$zf]);$A=($uc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($uc["db"]),ME):ME).'select='.urlencode($uc["table"]).$A;if($uc["ns"])$A=preg_replace('~([?&]ns=)[^&]+~','\\1'.urlencode($uc["ns"]),$A);if(count($uc["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$vg))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($vg
as$id=>$W)$A.=where_link($t++,$id,$W);}$X=select_value($X,$A,$p,$Vf);$u=h("val[$wg][".bracket_escape($z)."]");$Y=$_POST["val"][$wg][bracket_escape($z)];$Kb=!is_array($K[$z])&&is_utf8($X)&&$L[$Rd][$z]==$K[$z]&&!$_c[$z];$Uf=preg_match('~text|lob~',$p["type"]);if(($_GET["modify"]&&$Kb)||$Y!==null){$Ec=h($Y!==null?$Y:$K[$z]);echo"<td>".($Uf?"<textarea name='$u' cols='30' rows='".(substr_count($K[$z],"\n")+1)."'>$Ec</textarea>":"<input name='$u' value='$Ec' size='$vd[$z]'>");}else{$_d=strpos($X,"<i>...</i>");echo"<td id='$u' data-text='".($_d?2:($Uf?1:0))."'".($Kb?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$L[$Rd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(!is_ajax()){if($L||$E){$Wb=true;if($_GET["page"]!="last"){if($_==""||(count($L)<$_&&($L||!$E)))$xc=($E?$E*$_:0)+count($L);elseif($y!="sql"||!$gd){$xc=($gd?false:found_rows($S,$Z));if($xc<max(1e4,2*($E+1)*$_))$xc=reset(slow_query(count_rows($a,$Z,$gd,$Ac)));else$Wb=false;}}$pe=($_!=""&&($xc===false||$xc>$_||$E));if($pe){echo(($xc===false?count($L)+1:$xc-$E*$_)>$_?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$_).", '".'Loading'."...');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($L||$E){if($pe){$Gd=($xc===false?$E+(count($L)>=$_?2:1):floor(($xc-1)/$_));echo"<fieldset>";if($y!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" ...":"");for($t=max(1,$E-4);$t<min($Gd,$E+5);$t++)echo
pagination($t,$E);if($Gd>0){echo($E+5<$Gd?" ...":""),($Wb&&$xc!==false?pagination($Gd,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Gd'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($Gd>$E?pagination($E+1,$E).($Gd>$E+1?" ...":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$Cb=($Wb?"":"~ ").$xc;echo
checkbox("all",1,0,($xc!==false?($Wb?"":"~ ").lang(array('%d row','%d rows'),$xc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Cb' : checked); selectCount('selected2', this.checked || !checked ? '$Cb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$wc=$b->dumpFormat();foreach((array)$_GET["columns"]as$f){if($f["fun"]){unset($wc['sql']);break;}}if($wc){print_fieldset("export",'Export'." <span id='selected2'></span>");$ne=$b->dumpOutput();echo($ne?html_select("output",$ne,$sa["output"])." ":""),html_select("format",$wc,$sa["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Ob,'strlen'),$g);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$sa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$gg'>\n","</form>\n",(!$Ac&&$M?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$u,$C)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$_=11;$I=$h->query("SELECT $u, $C FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$u = $_GET[value] OR ":"")."$C LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $_");for($t=1;($K=$I->fetch_row())&&$t<$_;$t++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($u))."]")."=".urlencode($K[0]))."'>".h($K[1])."</a><br>\n";if($K)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$R=>$K){$C=$b->tableName($K);if(isset($K["Engine"])&&$C!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$C</a>";$X=format_number($K["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($K["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</form>\n",script("tableCheck();");}}page_footer();