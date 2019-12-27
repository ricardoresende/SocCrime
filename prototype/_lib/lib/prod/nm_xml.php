<?php
/**
 * $Id: nm_xml.php,v 1.14 2011-11-22 17:34:27 diogo Exp $
 */

if (!defined('NM_INC_PROD_XML'))
{
    define('NM_INC_PROD_XML', TRUE);
}

function nm_xml_ini($ini_file, $dir)
{
	global $nm_config;
	
	if(!isset($_SESSION['nm_session']['cache']['prod']) || empty($_SESSION['nm_session']['cache']['prod']))
	{
		//checa se existe .ini antigo e mata para criação do novo
		//prod.ini.config
		if(substr($ini_file, -8) == 'prod.ini')
		{
			$path = substr($ini_file, 0, -8);
			
			if(is_file($ini_file))
			{
				file_put_contents($path . 'prod.config.php', '<?php /*'. file_get_contents($ini_file) .'*/ ?>');
				
				@unlink($ini_file);
				
				//tambem deleta backup
				if(is_file($path . 'prod.ini.bak'))
				{
					@unlink($path . 'prod.ini.bak');
				}
				//tambem deleta backup
				if(is_file($path . 'prod.config.php.bak'))
				{
					@unlink($path . 'prod.ini.bak');
				}
			}
			
			$ini_file = $path . 'prod.config.php';
		}
		
		$xml_string = "";
		if(is_file($ini_file))
		{
			$xml_string =  file_get_contents($ini_file);
			
			if(substr($ini_file, -15) == 'prod.config.php')
			{
				if(!empty($xml_string))
				{
					$xml_string = substr($xml_string, 8, -5);
				}
			}
		}
		
		include_once($dir . "/third/ezxml/ezxml.php");
		include_once($dir . "/third/ezxml/ezdomnode.php");
		include_once($dir . "/third/ezxml/ezdomdocument.php");
		$xml_tre  =& eZXML::domTree($xml_string);
		$xml_node = 0;
		for ($i = 0; $i < sizeof($xml_tre->children); $i++)
		{
			$xml_temp = $xml_tre->children[$i];
			$xml_name = $xml_temp->name;
			if ("ROOT" == strtoupper($xml_name))
			{
				$xml_node = $i;
			}
		}
		$xml_raw = nm_xml_ini_cria($xml_tre->children[$xml_node]);
		$xml_nor = nm_xml_ini_normaliza($xml_raw);
		
		$_SESSION['nm_session']['cache']['prod'] = $xml_nor;
	}
	
	return $_SESSION['nm_session']['cache']['prod'];
}

function nm_xml_ini_cria($dom_obj)
{
    if (isset($dom_obj->type) && 1 == $dom_obj->type)
    {
        if (isset($dom_obj->name))
        {
            $array        = array();
            $node_name    = $dom_obj->name;
            $node_child   = $dom_obj->children;
            $node_content = $node_child[0]->content;
            $array[$node_name]["content"] = $node_content;
        }
    }
    if (isset($dom_obj->children))
    {
        $chd_arr = array();
        foreach ($dom_obj->children as $child)
        {
            $result = nm_xml_ini_cria($child);
            if ($result && isset($array))
            {
                $array[$node_name]["children"][] = $result;
            }
        }
    }
    if (isset($array))
    {
        return ($array);
    }
    else
    {
        return (FALSE);
    }
}

function nm_xml_ini_normaliza($mat_orig)
{
    $mat_nova            = array();
    $mat_nova["GLOBAL"]  = array();
    $mat_nova["PROFILE"] = array();
    if (is_array($mat_orig["ROOT"]["children"][0]["GLOBAL"]["children"]))
    {
        foreach ($mat_orig["ROOT"]["children"][0]["GLOBAL"]["children"] as $global_node)
        {
            foreach ($global_node as $global_atr => $global_val)
            {
                $mat_nova["GLOBAL"][$global_atr] = $global_val["content"];
            }
        }
    }
    if (!isset($mat_nova["GLOBAL"]["GC_DIR"]))   			{ $mat_nova["GLOBAL"]["GC_DIR"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["GC_MIN"]))   			{ $mat_nova["GLOBAL"]["GC_MIN"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["PDF_SERVER"]))			{ $mat_nova["GLOBAL"]["PDF_SERVER"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["JAVA_PATH"]))			{ $mat_nova["GLOBAL"]["JAVA_PATH"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["JAVA_BIN"])) 			{ $mat_nova["GLOBAL"]["JAVA_BIN"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["JAVA_PROTOCOL"])) 		{ $mat_nova["GLOBAL"]["JAVA_PROTOCOL"]   = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_TYPE"])) 			{ $mat_nova["GLOBAL"]["SEC_TYPE"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_HOST"])) 			{ $mat_nova["GLOBAL"]["SEC_HOST"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_USER"])) 			{ $mat_nova["GLOBAL"]["SEC_USER"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_PASS"])) 			{ $mat_nova["GLOBAL"]["SEC_PASS"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_BASE"])) 			{ $mat_nova["GLOBAL"]["SEC_BASE"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["SEC_PATH"])) 			{ $mat_nova["GLOBAL"]["SEC_PATH"] = ""; }    
    if (!isset($mat_nova["GLOBAL"]["GOOGLEMAPS_API_KEY"]))	{ $mat_nova["GLOBAL"]["GOOGLEMAPS_API_KEY"] = ""; }
    
    
//    if (!isset($mat_nova["GLOBAL"]["SEC_USAR"])) { $mat_nova["GLOBAL"]["SEC_USAR"] = ""; }
    $mat_nova["GLOBAL"]["SEC_USAR"] = "N";
    if (!isset($mat_nova["GLOBAL"]["PASSWORD"])) { $mat_nova["GLOBAL"]["PASSWORD"] = ""; }
    if (!isset($mat_nova["GLOBAL"]["LANGUAGE"])) { $mat_nova["GLOBAL"]["LANGUAGE"] = ""; }
//    if (!isset($mat_nova["GLOBAL"]["PASSWORD"])) { $mat_nova["GLOBAL"]["PASSWORD"] = "HkNwZ9BODSveV5X7DErKVIBUDuFGVoBiHkXOVIFG"; }
    if (isset($mat_orig["ROOT"]["children"]) &&
        isset($mat_orig["ROOT"]["children"][1]) &&
        isset($mat_orig["ROOT"]["children"][1]["PROFILES"]) &&
        isset($mat_orig["ROOT"]["children"][1]["PROFILES"]["children"]) &&
        is_array($mat_orig["ROOT"]["children"][1]["PROFILES"]["children"]))
    {
        foreach ($mat_orig["ROOT"]["children"][1]["PROFILES"]["children"] as $profile_node)
        {
            $nome_perfil                       = $profile_node["PROFILE"]["children"][0]["NAME"]["content"];
            $mat_nova["PROFILE"][$nome_perfil] = array();
            if (!isset($profile_node["PROFILE"]["children"][1]["USE_HOST"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][1]["USE_HOST"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_HOST"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_HOST"] = "";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_HOST"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_HOST"] = $profile_node["PROFILE"]["children"][2]["VAL_HOST"]["content"];
            }
            if (!isset($profile_node["PROFILE"]["children"][3]["USE_USER"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][3]["USE_USER"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_USER"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_USER"] = "";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_USER"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_USER"] = $profile_node["PROFILE"]["children"][4]["VAL_USER"]["content"];
            }
            if (!isset($profile_node["PROFILE"]["children"][5]["USE_PASS"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][5]["USE_PASS"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_PASS"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_PASS"] = "";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_PASS"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_PASS"] = $profile_node["PROFILE"]["children"][6]["VAL_PASS"]["content"];
            }
            if (!isset($profile_node["PROFILE"]["children"][7]["USE_BASE"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][7]["USE_BASE"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_BASE"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_BASE"] = "";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_BASE"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_BASE"] = $profile_node["PROFILE"]["children"][8]["VAL_BASE"]["content"];
            }
            if (!isset($profile_node["PROFILE"]["children"][9]["USE_TYPE"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][9]["USE_TYPE"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_TYPE"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_TYPE"] = "";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_TYPE"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_TYPE"] = $profile_node["PROFILE"]["children"][10]["VAL_TYPE"]["content"];
            }
            if (!isset($profile_node["PROFILE"]["children"][12]["USE_SEP"]["content"]) || "Y" != $profile_node["PROFILE"]["children"][12]["USE_SEP"]["content"])
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_SEP"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_SEP"] = ".";
            }
            else
            {
                $mat_nova["PROFILE"][$nome_perfil]["USE_SEP"] = "Y";
                $mat_nova["PROFILE"][$nome_perfil]["VAL_SEP"] = $profile_node["PROFILE"]["children"][13]["VAL_SEP"]["content"];
            }
            
            //db2
            $mat_nova["PROFILE"][$nome_perfil]["DB2_AUTOCOMMIT"]        = isset($profile_node["PROFILE"]["children"][14]["DB2_AUTOCOMMIT"]["content"])? $profile_node["PROFILE"]["children"][14]["DB2_AUTOCOMMIT"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["DB2_I5_LIB"]            = isset($profile_node["PROFILE"]["children"][15]["DB2_I5_LIB"]["content"])? $profile_node["PROFILE"]["children"][15]["DB2_I5_LIB"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["DB2_I5_NAMING"]         = isset($profile_node["PROFILE"]["children"][16]["DB2_I5_NAMING"]["content"])? $profile_node["PROFILE"]["children"][16]["DB2_I5_NAMING"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["DB2_I5_COMMIT"]         = isset($profile_node["PROFILE"]["children"][17]["DB2_I5_COMMIT"]["content"])? $profile_node["PROFILE"]["children"][17]["DB2_I5_COMMIT"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["DB2_I5_QUERY_OPTIMIZE"] = isset($profile_node["PROFILE"]["children"][18]["DB2_I5_QUERY_OPTIMIZE"]["content"])? $profile_node["PROFILE"]["children"][18]["DB2_I5_QUERY_OPTIMIZE"]["content"]:"";
            //fim db2
            
            $mat_nova["PROFILE"][$nome_perfil]["USE_PERSISTENT"]        = isset($profile_node["PROFILE"]["children"][19]["USE_PERSISTENT"]["content"])?$profile_node["PROFILE"]["children"][19]["USE_PERSISTENT"]["content"]:"N";
            $mat_nova["PROFILE"][$nome_perfil]["USE_SCHEMA"]            = isset($profile_node["PROFILE"]["children"][20]["USE_SCHEMA"]["content"])?$profile_node["PROFILE"]["children"][20]["USE_SCHEMA"]["content"]:"Y";
            $mat_nova["PROFILE"][$nome_perfil]["POSTGRES_ENCODING"]     = isset($profile_node["PROFILE"]["children"][21]["POSTGRES_ENCODING"]["content"])?$profile_node["PROFILE"]["children"][21]["POSTGRES_ENCODING"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["ORACLE_ENCODING"]       = isset($profile_node["PROFILE"]["children"][22]["ORACLE_ENCODING"]["content"])?$profile_node["PROFILE"]["children"][22]["ORACLE_ENCODING"]["content"]:"";
            $mat_nova["PROFILE"][$nome_perfil]["MYSQL_ENCODING"]        = isset($profile_node["PROFILE"]["children"][23]["MYSQL_ENCODING"]["content"])?$profile_node["PROFILE"]["children"][23]["MYSQL_ENCODING"]["content"]:"";
            
            $var_array = array();
            if (isset($profile_node["PROFILE"]["children"][11]["VARIABLES"]["children"]) && is_array($profile_node["PROFILE"]["children"][11]["VARIABLES"]["children"]) && !empty($profile_node["PROFILE"]["children"][11]["VARIABLES"]["children"]))
            {
                foreach ($profile_node["PROFILE"]["children"][11]["VARIABLES"]["children"] as $var_node)
                {
                    $nome_var                          = $var_node["VARIABLE"]["children"][0]["NAME"]["content"];
                    $var_array[$nome_var]              = array();
                    $var_array[$nome_var]["VALUE"]     = $var_node["VARIABLE"]["children"][1]["VALUE"]["content"];
                    $var_array[$nome_var]["PROTECTED"] = $var_node["VARIABLE"]["children"][2]["PROTECTED"]["content"];
                }
            }
            $mat_nova["PROFILE"][$nome_perfil]["VARIABLE"] = $var_array;
        }
    }
    return ($mat_nova);
}

function nm_ini_para_xml($arr_ini)
{
    $valido   = TRUE;
    $xml_str  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\r\n";
    $xml_str .= "<ROOT>\r\n";
    $xml_str .= "<GLOBAL>\r\n";
    $xml_str .= " <GC_DIR>"    				. $arr_ini["GLOBAL"]["GC_DIR"]    			. "</GC_DIR>\r\n";
    $xml_str .= " <GC_MIN>"    				. $arr_ini["GLOBAL"]["GC_MIN"]    			. "</GC_MIN>\r\n";
    $xml_str .= " <PDF_SERVER>"				. $arr_ini["GLOBAL"]["PDF_SERVER"]			. "</PDF_SERVER>\r\n";
    $xml_str .= " <JAVA_PATH>" 				. $arr_ini["GLOBAL"]["JAVA_PATH"] 			. "</JAVA_PATH>\r\n";
    $xml_str .= " <JAVA_BIN>"  				. $arr_ini["GLOBAL"]["JAVA_BIN"]  			. "</JAVA_BIN>\r\n";
    $xml_str .= " <JAVA_PROTOCOL>"  		. $arr_ini["GLOBAL"]["JAVA_PROTOCOL"]  		. "</JAVA_PROTOCOL>\r\n";
    $xml_str .= " <SEC_TYPE>"  				. $arr_ini["GLOBAL"]["SEC_TYPE"]  			. "</SEC_TYPE>\r\n";
    $xml_str .= " <SEC_HOST>"  				. $arr_ini["GLOBAL"]["SEC_HOST"]  			. "</SEC_HOST>\r\n";
    $xml_str .= " <SEC_USER>"  				. $arr_ini["GLOBAL"]["SEC_USER"]  			. "</SEC_USER>\r\n";
    $xml_str .= " <SEC_PASS>"  				. $arr_ini["GLOBAL"]["SEC_PASS"]  			. "</SEC_PASS>\r\n";
    $xml_str .= " <SEC_BASE>"  				. $arr_ini["GLOBAL"]["SEC_BASE"]  			. "</SEC_BASE>\r\n";
    $xml_str .= " <SEC_PATH>" 	 			. $arr_ini["GLOBAL"]["SEC_PATH"]  			. "</SEC_PATH>\r\n";
    $xml_str .= " <SEC_USAR>"  				. $arr_ini["GLOBAL"]["SEC_USAR"]  			. "</SEC_USAR>\r\n";
    $xml_str .= " <PASSWORD>"  				. $arr_ini["GLOBAL"]["PASSWORD"]  			. "</PASSWORD>\r\n";
    $xml_str .= " <LANGUAGE>"  				. $arr_ini["GLOBAL"]["LANGUAGE"]  			. "</LANGUAGE>\r\n";
    $xml_str .= " <GOOGLEMAPS_API_KEY>"  	. $arr_ini["GLOBAL"]["GOOGLEMAPS_API_KEY"]  . "</GOOGLEMAPS_API_KEY>\r\n";
    
    $xml_str .= "</GLOBAL>\r\n";
    $xml_str .= "<PROFILES>\r\n";
    if (is_array($arr_ini["PROFILE"]) && !empty($arr_ini["PROFILE"]))
    {
        foreach ($arr_ini["PROFILE"] as $perfil_nome => $perfil_dados)
        {
            $xml_str .= " <PROFILE>\r\n";
            $xml_str .= "  <NAME>$perfil_nome</NAME>\r\n";
            $xml_str .= "  <USE_HOST>" . $perfil_dados["USE_HOST"] . "</USE_HOST>\r\n";
            $xml_str .= "  <VAL_HOST>" . $perfil_dados["VAL_HOST"] . "</VAL_HOST>\r\n";
            $xml_str .= "  <USE_USER>" . $perfil_dados["USE_USER"] . "</USE_USER>\r\n";
            $xml_str .= "  <VAL_USER>" . $perfil_dados["VAL_USER"] . "</VAL_USER>\r\n";
            $xml_str .= "  <USE_PASS>" . $perfil_dados["USE_PASS"] . "</USE_PASS>\r\n";
            $xml_str .= "  <VAL_PASS>" . $perfil_dados["VAL_PASS"] . "</VAL_PASS>\r\n";
            $xml_str .= "  <USE_BASE>" . $perfil_dados["USE_BASE"] . "</USE_BASE>\r\n";
            $xml_str .= "  <VAL_BASE>" . $perfil_dados["VAL_BASE"] . "</VAL_BASE>\r\n";
            $xml_str .= "  <USE_TYPE>" . $perfil_dados["USE_TYPE"] . "</USE_TYPE>\r\n";
            $xml_str .= "  <VAL_TYPE>" . $perfil_dados["VAL_TYPE"] . "</VAL_TYPE>\r\n";
            $xml_str .= "  <VARIABLES>\r\n";
            if (is_array($perfil_dados["VARIABLE"]) && !empty($perfil_dados["VARIABLE"]))
            {
                foreach ($perfil_dados["VARIABLE"] as $var_nome => $var_dados)
                {
                    $xml_str .= "   <VARIABLE>\r\n";
                    $xml_str .= "    <NAME>$var_nome</NAME>\r\n";
                    $xml_str .= "    <VALUE>"     . $var_dados["VALUE"]     . "</VALUE>\r\n";
                    $xml_str .= "    <PROTECTED>" . $var_dados["PROTECTED"] . "</PROTECTED>\r\n";
                    $xml_str .= "   </VARIABLE>\r\n";
                }
            }
            $xml_str .= "  </VARIABLES>\r\n";
            $xml_str .= "  <USE_SEP>" . $perfil_dados["USE_SEP"] . "</USE_SEP>\r\n";
            $xml_str .= "  <VAL_SEP>" . $perfil_dados["VAL_SEP"] . "</VAL_SEP>\r\n";
            
            //db2
            $xml_str .= "  <DB2_AUTOCOMMIT>"        . $perfil_dados["DB2_AUTOCOMMIT"]        . "</DB2_AUTOCOMMIT>\r\n";
            $xml_str .= "  <DB2_I5_LIB>"            . $perfil_dados["DB2_I5_LIB"]            . "</DB2_I5_LIB>\r\n";
            $xml_str .= "  <DB2_I5_NAMING>"         . $perfil_dados["DB2_I5_NAMING"]         . "</DB2_I5_NAMING>\r\n";
            $xml_str .= "  <DB2_I5_COMMIT>"         . $perfil_dados["DB2_I5_COMMIT"]         . "</DB2_I5_COMMIT>\r\n";
            $xml_str .= "  <DB2_I5_QUERY_OPTIMIZE>" . $perfil_dados["DB2_I5_QUERY_OPTIMIZE"] . "</DB2_I5_QUERY_OPTIMIZE>\r\n";
            //fim db2
            $xml_str .= "  <USE_PERSISTENT>"        . $perfil_dados["USE_PERSISTENT"]        . "</USE_PERSISTENT>\r\n";
            $xml_str .= "  <USE_SCHEMA>"            . $perfil_dados["USE_SCHEMA"]            . "</USE_SCHEMA>\r\n";
            $xml_str .= "  <POSTGRES_ENCODING>"     . $perfil_dados["POSTGRES_ENCODING"]     . "</POSTGRES_ENCODING>\r\n";
            $xml_str .= "  <ORACLE_ENCODING>"       . $perfil_dados["ORACLE_ENCODING"]       . "</ORACLE_ENCODING>\r\n";
            $xml_str .= "  <MYSQL_ENCODING>"        . $perfil_dados["MYSQL_ENCODING"]        . "</MYSQL_ENCODING>\r\n";
            $xml_str .= " </PROFILE>\r\n";
        }
    }
    $xml_str .= "</PROFILES>\r\n";
    $xml_str .= "</ROOT>";
    return (array($valido, $xml_str));
}

?>