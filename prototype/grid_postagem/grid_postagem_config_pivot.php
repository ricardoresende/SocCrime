<?php

include_once('grid_postagem_session.php');
session_start();

$s_inc = '../_lib/css/' . $_SESSION['scriptcase']['css_popup'];
include_once str_replace('.css', '.php', $s_inc);

$nome_apl  = (isset($_GET['nome_apl']))  ? $_GET['nome_apl']  : "";
$sc_page   = (isset($_GET['sc_page']))   ? $_GET['sc_page']   : "";
$language  = (isset($_GET['language']))  ? $_GET['language']  : "port";

$tradutor = array();
if (isset($_SESSION['scriptcase']['sc_idioma_pivot']))
{
    $tradutor = $_SESSION['scriptcase']['sc_idioma_pivot'];
}

if (isset($_GET['b_ok']) && 'Y' == $_GET['b_ok'])
{
    $a_x_axys = array();
    $a_y_axys = array();
    foreach ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by'] as $i_group => $l_group)
    {
        $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_order'][$i_group] = $_GET['order_' . $i_group];
        if ('x' == $_GET['axys_' . $i_group])
        {
            $a_x_axys[] = $i_group;
        }
        else
        {
            $a_y_axys[] = $i_group;
        }
    }
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_x_axys']  = $a_x_axys;
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_y_axys']  = $a_y_axys;
    $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular'] = isset($_GET['tabular']) && 'Y' == $_GET['tabular'];

?>
<html>
<body>
<script language="javascript">
self.parent.document.refresh_config.submit();
self.parent.tb_remove();
</script>
</body>
</html>
<?php
    exit;
}

?>
<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=<?php  echo $_SESSION['scriptcase']['charset'];       ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php     echo $_SESSION['scriptcase']['css_popup'];     ?>" />
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $_SESSION['scriptcase']['css_btn_popup']; ?>" />
 <script language="javascript" type="text/javascript" src="<?php    echo $_SESSION['sc_session']['path_third'];    ?>/jquery/js/jquery.js"></script>
 <script language="javascript" type="text/javascript">
    var maxGroup = <?php  echo sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']); ?>,
        icoLine  = "../_lib/img/<?php echo $sum_ico_line;   ?>",
        icoCol   = "../_lib/img/<?php echo $sum_ico_column; ?>",
        txtLine  = "<?php echo $tradutor[$language]['smry_ppup_posi_labl']; ?>",
        txtCol   = "<?php echo $tradutor[$language]['smry_ppup_posi_data']; ?>";
    $(function(){
        $(".sc-ui-axys").mouseover(function() { $(this).css("cursor", "pointer"); })
                        .mouseout(function() { $(this).css("cursor", ""); })
                        .click(function(){
            var oDis = $(this),
                sId  = oDis.attr("id").substr(3),
                oVal = $("#id_" + sId),
                iIdx = parseInt(sId.substr(5));
            if ("y" == oVal.val()) {
                for (var i = 0; i <= iIdx; i++) {
                    $("#ui_axys_" + i).attr("src", icoLine);
                    $("#ui_axys_" + i).attr("title", txtLine);
                    $("#id_axys_" + i).val("x");
                }
            }
            else {
                for (var i = iIdx; i < maxGroup; i++) {
                    $("#ui_axys_" + i).attr("src", icoCol);
                    $("#ui_axys_" + i).attr("title", txtCol);
                    $("#id_axys_" + i).val("y");
                }
            }
        });
        x_dim();
    });
    function processa() {
        document.config_pivot.b_ok.value = 'Y';
        document.config_pivot.submit();
    }
    function x_dim() {
        var mt = $("#main_table"),
            W  = mt.width(),
            H  = mt.height();
        if (0 == W || 0 == H) {
            setTimeout("x_dim()", 50);
        }
        else {
            self.parent.tb_resize(H + 40, W + 40);
        }
    }
 </script>
</head>

<body class="scGridPage" style="margin: 0px; overflow-x: hidden">

<form name="config_pivot" method="get">
<table class="scGridBorder" id="main_table" style="position: relative; top: 20px; left: 20px"><tr><td class="scGridTabelaTd">

<table class="scGridTabela" style="width: 100%">
 <tr>
  <td class="scGridLabelVert"><?php echo $tradutor[$language]['smry_ppup_titl']; ?></td>
 </tr>
 <tr>
  <td class="scGridFieldOdd scGridFieldOddFont">
   <table style="border-collapse: collapse; border-width: 0; width: 100%">
    <tr>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_fild']; ?></b></td>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_posi']; ?></b></td>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><b><?php echo $tradutor[$language]['smry_ppup_sort']; ?></b></td>
    </tr>
<?php

foreach ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by'] as $i_group => $l_group)
{
    if ('label' == $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_order'][$i_group])
    {
        $order_sel_label = ' selected';
        $order_sel_value = '';
    }
    else
    {
        $order_sel_label = '';
        $order_sel_value = ' selected';
    }
?>
    <tr>
     <td class="scGridFieldOddFont" style="padding: 1px 4px"><?php echo $l_group; ?></td>
<?php
    if (sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']) - 1 == $i_group)
    {
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px">
      &nbsp;
      <input type="hidden" name="axys_<?php echo $i_group; ?>" value="y">
     </td>
<?php
    }
    else
    {
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px; text-align: center">
<?php
        if (in_array($i_group, $_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_x_axys']))
        {
            $s_axys_lab  = '../_lib/img/' . $sum_ico_line;
            $s_axys_val  = 'x';
            $s_axys_hint = $tradutor[$language]['smry_ppup_posi_labl'];
        }
        else
        {
            $s_axys_lab  = '../_lib/img/' . $sum_ico_column;
            $s_axys_val  = 'y';
            $s_axys_hint = $tradutor[$language]['smry_ppup_posi_data'];
        }
?>
      <img class="sc-ui-axys" id="ui_axys_<?php echo $i_group; ?>" src="<?php echo $s_axys_lab; ?>" title="<?php echo $s_axys_hint; ?>" />
      <input type="hidden" id="id_axys_<?php echo $i_group; ?>" name="axys_<?php echo $i_group; ?>" value="<?php echo $s_axys_val; ?>">
     </td>
<?php
    }
?>
     <td class="scGridFieldOddFont" style="padding: 1px 4px">
      <select class="scGridObjectOdd" name="order_<?php echo $i_group; ?>">
       <option value="label"<?php echo $order_sel_label; ?>><?php echo $tradutor[$language]['smry_ppup_sort_labl']; ?></option>
       <option value="value"<?php echo $order_sel_value; ?>><?php echo $tradutor[$language]['smry_ppup_sort_vlue']; ?></option>
      </select>
     </td>
    </tr>
<?php
}

?>
   </table>
<?php
if (isset($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']) && 1 < sizeof($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_group_by']))
{
?>
   <input id="id_chk_tab" type="checkbox" name="tabular" value="Y"<?php if ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular']) { echo ' checked'; } ?> /> <label for="id_chk_tab"><?php echo $tradutor[$language]['smry_ppup_chek_tabu']; ?></label>
<?php
}
else
{
?>
   <input type="hidden" name="tabular" value="<?php if ($_SESSION['sc_session'][$sc_page][$nome_apl]['pivot_tabular']) { echo 'Y'; } else { echo 'N'; } ?>" />
<?php
}
?>
  </td>
 </tr>
 <tr>
  <td class="scGridToolbar" style="text-align: center">
   <?php echo $_SESSION['scriptcase']['bg_btn_popup']['bok'];       ?>
   &nbsp; &nbsp; &nbsp;
   <?php echo $_SESSION['scriptcase']['bg_btn_popup']['btbremove']; ?>
  </td>
 </tr>
</table>

</td></tr></table>
<input type="hidden" name="nome_apl" value="<?php echo $nome_apl; ?>">
<input type="hidden" name="sc_page" value="<?php  echo $sc_page; ?>" >
<input type="hidden" name="language" value="<?php echo $language; ?>" >
<input type="hidden" name="b_ok" value="" >
</form>

</body>

</html>