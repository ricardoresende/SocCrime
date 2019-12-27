<?php
function nmButtonOutput($arr_buttons, $sBtn, $sClick, $sHref, $sId, $sName, $sValue, $sStyle, $sAlign, $sKey, $sBorder, $spath, $sAlt, $sHint, $sClassJ, $AltJ)
{
    $sCodigo  = '';

    // Parametros
    $sClick  = ('' != $sClick)  ? ' onClick="'          . $sClick  . '; return false"' : '';
    $sHref   = ('' != $sHref)   ? ' href="javascript: ' . $sHref   . '"'               : '';
    $sId     = ('' != $sId)     ? ' id="'               . $sId     . '"'               : '';
    $sName   = ('' != $sName)   ? ' name="'             . $sName   . '"'               : '';
    $sStyle  = ('' != $sStyle)  ? ' style="'            . $sStyle  . '"'               : '';
    $sAlign  = ('' != $sAlign)  ? ' align="'            . $sAlign  . '"'               : '';
    $sKey    = ('' != $sKey)    ? ' accesskey="'        . $sKey    . '"'               : '';
    $sBorder = ('' != $sBorder) ? ' border="'           . $sBorder . '"'               : '';
    $spath   = ('' != $spath)   ? $spath                                               : "\$this->Ini->path_botoes";
    $sAlt    = '';
    $sClassB = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scButton_' . $arr_buttons[$sBtn]['style'] . '"' : '';
    $sClassL = ('' != $arr_buttons[$sBtn]['style']) ? ' class="scLink_'   . $arr_buttons[$sBtn]['style'] . '"' : '';
    $sClassI = '';
    if (!empty($sValue))
    {
        $sValue  = ' value="' . $sValue  . '"';
    }
    else
    {
        $sValue  = ('' != $arr_buttons[$sBtn]['value']) ? ' value="' . $arr_buttons[$sBtn]['value'] . '"' : '';
    }
    if (!empty($sHint))
    {
        $sHint   = ' title="' . $sHint  . '"';
    }
    else
    {
        $sHint   = (isset($arr_buttons[$sBtn]['hint'])  && '' != $arr_buttons[$sBtn]['hint'])  ? ' title="'          . $arr_buttons[$sBtn]['hint']  . '"' : '';
    }

    if (isset($_SESSION['scriptcase']['charset']))
    {
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sValue))
        {
            $sValue = mb_convert_encoding($sValue, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sHint))
        {
            $sHint = mb_convert_encoding($sHint, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($sAlt))
        {
            $sAlt = mb_convert_encoding($sAlt, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($AltJ))
        {
            $AltJ = mb_convert_encoding($AltJ, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
    }

    if ('' != $AltJ)
    {
        $sAlt  = ' alt="'  . $AltJ . '"';
        $sHref = ' href="' . $AltJ . '"';
    }
    if ('' != $sClassJ)
    {
        $sClassB = str_replace('class="', 'class="' . $sClassJ . ' ', $sClassB);
        $sClassL = str_replace('class="', 'class="' . $sClassJ . ' ', $sClassL);
        $sClassI = ' class="' . $sClassJ . '"';
    }


    // Vertical align
    if ('' == $sStyle)
    {
        $sStyle = ' style="vertical-align: middle"';
    }
    else
    {
        $sStyle = str_replace('style="', 'style="vertical-align: middle;', $sStyle);
    }

    // Codigo do botao
    if ('button' == $arr_buttons[$sBtn]['type'])
    {
        $sCodigo .= "<input type=\"button\"" . $sAlt . $sId . $sClick . $sKey . $sClassB . $sValue . $sHint . $sStyle . ">\r\n";
    }
    elseif ('image' == $arr_buttons[$sBtn]['type'])
    {
        if (isset($arr_buttons[$sBtn]['image']) && !empty($arr_buttons[$sBtn]['image']))
        {
            $sSrc = $arr_buttons[$sBtn]['image'];
        }
        else
        {
            $sSrc = "nm_" . $tbapl_template_botao . "_" . $sBtn . ".gif";
        }
        $sCodigo .= "<input type=\"image\" src=\"" . $spath . "/" . $sSrc . "\" " . $sId . $sClick . $sKey . $sBorder. $sHint . $sStyle . $sAlign . $sClassI . $sAlt . ">\r\n";
    }
    else
    {
        $sCodigo .= "<a" . $sId . $sHref . $sClassL . $sHint . $sStyle . ">" . $arr_buttons[$sBtn]['value'] . "</a>\r\n";
    }
    return $sCodigo;
}
?>