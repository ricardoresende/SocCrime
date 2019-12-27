<?php
/**
 * $Id: nm_gp_config_pdf.php,v 1.15 2010-10-20 16:58:32 sergio Exp $
 */
    include_once('grid_postagem_session.php');
    session_start();

    $opc        = (isset($_GET['nm_opc']))     ? $_GET['nm_opc'] : "";
    $target     = (isset($_GET['nm_target']))  ? $_GET['nm_target'] : "";
    $cor        = (isset($_GET['nm_cor']))     ? $_GET['nm_cor'] : "";
    $papel      = (isset($_GET['papel']))      ? $_GET['papel'] : "";
    $orientacao = (isset($_GET['orientacao'])) ? $_GET['orientacao'] : "";
    $bookmarks  = (isset($_GET['bookmarks']))  ? $_GET['bookmarks'] : "";
    $largura    = (isset($_GET['largura']))    ? $_GET['largura'] : "";
    $conf_larg  = (isset($_GET['conf_larg']))  ? $_GET['conf_larg'] : "N";
    $fonte      = (isset($_GET['conf_fonte'])) ? $_GET['conf_fonte'] : "0";
    $grafico    = (isset($_GET['grafico']))    ? $_GET['grafico'] : "";
    $language   = (isset($_GET['language']))   ? $_GET['language'] : "port";
    $conf_socor = (isset($_GET['conf_socor'])) ? $_GET['conf_socor'] : "N";
    $apapel     = (isset($_GET['apapel']))     ? $_GET['apapel'] : "";
    $lpapel     = (isset($_GET['lpapel']))     ? $_GET['lpapel'] : "";

    $tradutor = array();
    if (isset($_SESSION['scriptcase']['sc_idioma_pdf']))
    {
        $tradutor = $_SESSION['scriptcase']['sc_idioma_pdf'];
    }
   $tp_papel = array();
   $tp_papel[1]  = "LETTER";
   $tp_papel[2]  = "LEGAL";
   $tp_papel[3]  = "LEDGER";
   $tp_papel[4]  = "A0";
   $tp_papel[5]  = "A1";
   $tp_papel[6]  = "A2";
   $tp_papel[7]  = "A3";
   $tp_papel[8]  = "A4";
   $tp_papel[9]  = "A5";
   $tp_papel[10] = "A6";
   $tp_papel[11] = "ISOB5";
   $tp_papel[12] = "TABLOID";
   $tp_papel[13] = "TABLOID ";
   $tp_papel[14] = "A4";
   $tp_papel[15] = "A4";
   $tp_papel[16] = "A7";
   $tp_papel[17] = "A8";
   $tp_papel[18] = "A9";
   $tp_papel[19] = "A10";
   $tp_papel[20] = "ISOB0";
   $tp_papel[21] = "ISOB1";
   $tp_papel[22] = "ISOB2";
   $tp_papel[23] = "ISOB3";
   $tp_papel[24] = "ISOB4";
   $tp_papel[25] = "NOTE";
   $tp_papel[26] = "HALFLETTER";
?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset']; ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $_SESSION['scriptcase']['css_popup'] ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup'] ?>" />
</head>
<body class="scGridPage" style="margin: 0px; overflow-x: hidden">

<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/jquery/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $_SESSION['sc_session']['path_third'] ?>/tigra_color_picker/picker.js"></script>

<form name="config_pdf" method="post">
<table class="scGridBorder" id="main_table" style="position: relative; top: 20px; left: 20px">
<tr>
 <td class="scGridTabelaTd">
  <table class="scGridTabela">
   <tr class="scGridLabelVert">
    <td align="middle" nowrap>
      <b><?php echo $tradutor[$language]['titulo']; ?></b>
    </td>
   </tr>

 <tr><td>
 <table style="border-collapse: collapse; border-width: 0px">
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['tp_imp']; ?>
   </td>
   <td>
     <select  name="cor_imp"  size=1>
       <option value="cor"      <?php if ($cor == "cor")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['color']; ?></option>
       <option value="pb"       <?php if ($cor == "pb")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['econm']; ?></option>
     </select>
   </td>
 </tr>
<?php
if ($conf_socor == "N")
{
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['tp_pap']; ?>
   </td>
   <td>
<?php
//  echo "     <select  name=\"papel\" size=1 onchange=custom_paper()>\r\n";
  echo "     <select  name=\"papel\" size=1>\r\n";
  echo "       <option value=\"" . $tp_papel[1]  . "\""; if ($papel == "1")   { echo " selected" ;} echo ">" . $tradutor[$language]['carta'] . " (216 x 279 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[2]  . "\""; if ($papel == "2")   { echo " selected" ;} echo ">" . $tradutor[$language]['oficio'] . " (216 x 356 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[3]  . "\""; if ($papel == "3")   { echo " selected" ;} echo ">Ledger (432 x 279 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[4]  . "\""; if ($papel == "4")   { echo " selected" ;} echo ">A0 (841 X 1189 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[5]  . "\""; if ($papel == "5")   { echo " selected" ;} echo ">A1 (594 x 841  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[6]  . "\""; if ($papel == "6")   { echo " selected" ;} echo ">A2 (420 x 594  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[7]  . "\""; if ($papel == "7")   { echo " selected" ;} echo ">A3 (297 x 420  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[8]  . "\""; if ($papel == "8")   { echo " selected" ;} echo ">A4 (210 X 297  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[9]  . "\""; if ($papel == "9")   { echo " selected" ;} echo ">A5 (148 x 210  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[10] . "\""; if ($papel == "10")  { echo " selected" ;} echo ">A6 (105 x 148  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[16] . "\""; if ($papel == "16")  { echo " selected" ;} echo ">A7 (74  x 105  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[17] . "\""; if ($papel == "17")  { echo " selected" ;} echo ">A8 (52  x 74   mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[18] . "\""; if ($papel == "18")  { echo " selected" ;} echo ">A9 (37  x 52   mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[19] . "\""; if ($papel == "19")  { echo " selected" ;} echo ">A10 (26  x 37  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[20] . "\""; if ($papel == "20")  { echo " selected" ;} echo ">B0 (1000 x 1414 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[21] . "\""; if ($papel == "21")  { echo " selected" ;} echo ">B1 (707  x 1000 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[22] . "\""; if ($papel == "22")  { echo " selected" ;} echo ">B2 (500  x 707  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[23] . "\""; if ($papel == "23")  { echo " selected" ;} echo ">B3 (353  x 500  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[24] . "\""; if ($papel == "24")  { echo " selected" ;} echo ">B4 (250  x 353  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[11] . "\""; if ($papel == "11")  { echo " selected" ;} echo ">B5 (176  x 250  mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[13] . "\""; if ($papel == "13")  { echo " selected" ;} echo ">Tabliod (280 x 432 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[25] . "\""; if ($papel == "25")  { echo " selected" ;} echo ">Note (190 x 254 mm)</option>\r\n";
  echo "       <option value=\"" . $tp_papel[26] . "\""; if ($papel == "26")  { echo " selected" ;} echo ">HalfLetter (140 x 216 mm)</option>\r\n";
?>
     </select>
   </td>
</tr>
 <tr class="scGridFieldOddVert" id='customiz_papel' style='display: none'>
   <td align=right>
    <font size="1">
     <?php echo $tradutor[$language]['alt_papel'] . " x " . $tradutor[$language]['larg_papel']; ?>
   </td>
   <td>
     <input type=text name="alt_papel"  size=2 maxlength=4 value="<?php echo $apapel; ?>">&nbsp;x&nbsp;
     <input type=text name="larg_papel" size=2 maxlength=4 value="<?php echo $lpapel; ?>">&nbsp;mm
   </td>
</tr>
<?php
}
if ($conf_socor == "N")
{
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['orient']; ?>
   </td>
   <td>
     <select  name="orientacao"  size=1>
       <option value="portrait" <?php if ($orientacao == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['retrato']; ?></option>
       <option value="landscape"<?php if ($orientacao == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['paisag']; ?></option>
     </select>
   </td>
</tr>
<?php
}
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['book']; ?>
   </td>
   <td>
     <select  name="bookmarks"  size=1>
       <option value="1"<?php if ($bookmarks == "1")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="2"<?php if ($bookmarks == "2")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
 </tr>
<?php
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['grafico']; ?>
   </td>
   <td>
     <select  name="grafico"  size=1>
       <option value="S"<?php if ($grafico == "S")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['sim']; ?></option>
       <option value="N"<?php if ($grafico == "N")  { echo " selected" ;} ?>><?php echo $tradutor[$language]['nao']; ?></option>
     </select>
   </td>
</tr>
<?php
 }
if ($conf_larg == "S" && $conf_socor == "N")
{
?>
 <tr class="scGridFieldOddVert">
   <td>
     <?php echo $tradutor[$language]['largura']; ?>
   </td>
   <td>
     <input type="text" name="largura" value="<?php echo $largura; ?>" size=6 maxlength=4>
   </td>
</tr>
     <input type="hidden" name="fonte" value="<?php echo $fonte; ?>">
<?php
 }
?>
</table></td></tr>
 <tr class="scGridToolbar">
   <td colspan=1 align="middle">
<?php
echo  $_SESSION['scriptcase']['bg_btn_popup']['bok'] . "\r\n";
echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n";
echo  $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] . "\r\n";

?>
   </td>
 </tr>
</table>
 </td>
 </tr>
</table>

<?php
if ($bookmarks == "XX" || $conf_socor == "S")
{
    $book = $bookmarks;
    if ($bookmarks == "XX")
    {
        $book = 2;
    }
?>
    <input type="hidden" name="bookmarks" value="<?php echo $book; ?>">
<?php
}
if ($conf_larg != "S" || $conf_socor == "S")
{
?>
    <input type="hidden" name="largura" value="<?php echo $largura; ?>">
    <input type="hidden" name="fonte" value="<?php echo $fonte; ?>">
<?php
}
if ($grafico == "XX" || $conf_socor == "S")
{
    $graf = $grafico;
    if ($grafico == "XX")
    {
        $graf = 2;
    }
?>
    <input type="hidden" name="grafico" value="<?php echo $graf; ?>">
<?php
}
if ($conf_socor == "S")
{
    $orient = ($orientacao == "1") ? "portrait" : "landscape";
    $dim_papel = $tp_papel[$papel];
?>
    <input type="hidden" name="papel" value="<?php echo $dim_papel; ?>">
    <input type="hidden" name="orientacao" value="<?php echo $orient; ?>">
<?php
}

?>
</form>
<script language="javascript">
<?php
 if ($conf_socor == "N")
 {
?>
 // custom_paper();
<?php
 }
?>
  mt  = document.getElementById('main_table');
  x_dim();
  function x_dim()
  {
     var W = mt.clientWidth,
         H = mt.clientHeight;
     if (0 == W || 0 == H)
     {
         setTimeout("x_dim()", 50);
     }
     else
     {
         self.parent.tb_resize(H + 40, W + 40);
     }
  }
  function processa()
  {
     self.parent.tb_remove();
     ind   = document.config_pdf.cor_imp.selectedIndex;
     cor   = document.config_pdf.cor_imp.options[ind].value;
<?php
 if ($conf_socor == "N")
 {
?>
     ind        = document.config_pdf.papel.selectedIndex;
     papel      = document.config_pdf.papel.options[ind].value;
     larg_papel = document.config_pdf.larg_papel.value;
     alt_papel  = document.config_pdf.alt_papel.value;
     ind        = document.config_pdf.orientacao.selectedIndex;
     orientacao = document.config_pdf.orientacao.options[ind].value;
<?php
 }
 else
 {
?>
     papel      = document.config_pdf.papel.value;
     orientacao = document.config_pdf.orientacao.value;
<?php
 }
 if ($bookmarks != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.bookmarks.selectedIndex;
     bookmarks = document.config_pdf.bookmarks.options[ind].value;
<?php
 }
 else
 {
?>
     bookmarks  = document.config_pdf.bookmarks.value;
<?php
 }
 if ($grafico != "XX" && $conf_socor == "N")
 {
?>
     ind   = document.config_pdf.grafico.selectedIndex;
     grafico = document.config_pdf.grafico.options[ind].value;
<?php
 }
 else
 {
?>
     grafico    = document.config_pdf.grafico.value;
<?php
}
?>
     largura    = document.config_pdf.largura.value;
     fonte      = document.config_pdf.fonte.value;
     parms_pdf = " ";
     if (largura > 0)
     {
         parms_pdf += largura;
     }
     else
     {
         parms_pdf += 800;
     }
     parms_pdf += ' ' + papel;
     parms_pdf += ' -orientation ' + orientacao.toUpperCase();
     if (bookmarks == 1)
     {
         parms_pdf += ' -bookmarks HEADINGS';
     }
     parent.nm_gp_move('<?php echo $opc; ?>', '<?php echo $target; ?>', cor, parms_pdf, grafico);return false;
  }
  function custom_paper()
  {
     ind   = document.config_pdf.papel.selectedIndex;
     papel = document.config_pdf.papel.options[ind].value;
     if (papel != 'custom')
     {
         document.getElementById('customiz_papel').style.display = 'none';
     }
     else
     {
         document.getElementById('customiz_papel').style.display = '';
     }
  }
</script>
</body>
</html>