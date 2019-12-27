<?php  
  include_once('grid_postagem_session.php');
  session_start() ;
  class grid_postagem_form_teste
  {
  function grid_postagem_teste()
  {
    include("../_lib/lang/pt_br.lang.php");
    $_SESSION['scriptcase']['charset'] = "UTF-8";
?> 
<html> 
<HEAD>
 <title>grid_postagem</title> 
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
</HEAD>
<body> 
<?php  
  $str_path_web = $_SERVER['PHP_SELF'];
  $str_path_web = str_replace("\\", '/', $str_path_web);
  $str_path_web = str_replace('//', '/', $str_path_web);
  $path_img     = substr($str_path_web, 0, strrpos($str_path_web, '/'));
  $path_img     = substr($path_img, 0, strrpos($path_img, '/')) . '/';
  $path_img     = $path_img . "_lib/img";
  if (!isset($_SESSION['scriptcase']['sc_outra_jan']) || $_SESSION['scriptcase']['sc_outra_jan'] != 'grid_postagem')
  {
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
      {
          echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'>" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "</a> \n" ; 
      }
      else 
      {
          echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' target='_self'>" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "</a> \n" ; 
      }
  }
?> 
<br> 
<B><FONT SIZE="4">grid_postagem</FONT></B> 
<br> 
<br> 
<form name="FCons" method=post 
               action="grid_postagem.php" 
               target="_self"> 
<input type="hidden" name="script_case_session" value="<?php echo session_id() ?>"/>
<input type="hidden" name="nmgp_outra_jan" value="true"/>
<input type="hidden" name="nmgp_start" value="SC"/>
<input type=hidden name="NM_contr_var_session" value="Yes"> 
<input type=submit value="grid_postagem.php"> 
</form> 
<script language=javascript> 
</script> 
</body> 
</html> 
<?php
  }
 }
  $frm_teste = new grid_postagem_form_teste();
  $frm_teste->grid_postagem_teste();
?>
