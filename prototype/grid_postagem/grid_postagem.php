<?php
   include_once('grid_postagem_session.php');
   @session_start() ;
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil']          = "conMestrado";
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_prod']       = "/scriptcase/prod";
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imagens']    = "/scriptcase/file/img";
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imag_temp']  = "/scriptcase/tmp";
   $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_doc']        = "/var/www2/scriptcase/file/doc";
//
class grid_postagem_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $server_pdf;
   var $java_path;
   var $java_bin;
   var $java_protocol;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_schema_filter;
   var $Str_btn_filter;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $path_magick;
   var $exec_magick;
   var $exec_linux;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_mssql;
   var $nm_bases_oracle;
   var $nm_bases_db2;
   var $nm_bases_informix;
   var $nm_bases_access;
   var $nm_bases_mysql;
   var $nm_bases_ibase;
   var $nm_bases_sybase;
   var $nm_bases_postgres;
   var $nm_bases_vfp;
   var $nm_bases_sqlite;
   var $sc_page;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init;

      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grid_postagem']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "grid_postagem"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "sm002"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "ricardo"; 
      $this->nm_versao_sc    = ""; 
      $this->nm_tp_lic_sc    = "ep_prata"; 
      $this->nm_dt_criacao   = "20191227"; 
      $this->nm_hr_criacao   = "111643"; 
      $this->nm_autor_alt    = "ricardo"; 
      $this->nm_dt_ult_alt   = "20191227"; 
      $this->nm_hr_ult_alt   = "162509"; 
      list($NM_usec, $NM_sec) = explode(" ", microtime()); 
      $this->nm_timestamp  = (float) $NM_sec; 
      $this->nm_app_version = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
          $str_path_sys          = str_replace('//', '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", str_replace("\\\\", "\\", getcwd())) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = str_replace('//', '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['scriptcase']['grid_postagem']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['scriptcase']['grid_postagem']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['scriptcase']['grid_postagem']['glo_nm_path_doc'];
      $this->str_lang        = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "pt_br";
      $this->str_conf_reg    = (isset($_SESSION['scriptcase']['str_conf_reg']) && !empty($_SESSION['scriptcase']['str_conf_reg'])) ? $_SESSION['scriptcase']['str_conf_reg'] : "pt_br";
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase5_Silver/ScriptCase5_Silver";
      $this->str_schema_filter = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase5_Blue/ScriptCase5_Blue";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->server_pdf      = $this->server;
      $this->server          = "";
      $this->java_bin        = "";
      $this->java_path       = "";
      $this->java_protocol   = "http://";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_postagem';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      if (!isset($_SESSION['scriptcase']['sc_java_install']))
      { 
          $_SESSION['scriptcase']['sc_java_install'] = false; 
          ob_start();
          $NM_java   = system("java");
          if (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
          {
              $NM_java_v = system("java -version 2>&1");
          } 
          else 
          {
              $NM_java_v = system("java -version");
          } 
          ob_end_clean();
          if ((!empty($NM_java) && strlen($NM_java) > 10) || (!empty($NM_java_v) && strlen($NM_java_v) > 10))
          { 
              $_SESSION['scriptcase']['sc_java_install'] = true; 
          } 
          else 
          { 
              $NM_java = php_uname();
              if (strpos(strtoupper($NM_java), "OS400") !== false)
              {
                  $_SESSION['scriptcase']['sc_java_install'] = true; 
              }
              $NM_java = $_SERVER['SERVER_SOFTWARE'];
              if (strpos($NM_java, "Microsoft-IIS") !== false)
              {
                  $_SESSION['scriptcase']['sc_java_install'] = true; 
              }
          } 
      } 
      $_SESSION['scriptcase']['charset']  = "UTF-8";
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = mb_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      if (-1 != version_compare(phpversion(), '5.0.0'))
      {
         $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph5/src";
      }
      else
      {
          $this->path_grafico    = $this->root . $this->path_prod . "/third/jpgraph4/src";
      }
      $this->path_grafico_fonts  = $this->root . $this->path_prod . "/third/jpgraphfonts/";
      $_SESSION['sc_session'][$this->sc_page]['grid_postagem']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 11px; color: #000000; font-weight: normal; background-color: #DEE7DE; border-left-color: #DEE7DE; border-right-color: #DEE7DE; border-top-color: #DEE7DE; border-bottom-color: #DEE7DE; border-style: solid; border-width: 1; padding: 1px; background-image: url(../../img/scriptcase__NM__MS_Money_bg_button.gif); }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 11px; color: gray; font-weight: normal; background-color: #DEE7DE; border-left-color: #DEE7DE; border-right-color: #DEE7DE; border-top-color: #DEE7DE; border-bottom-color: #DEE7DE; border-style: solid; border-width: 1; padding: 1px; background-image: url(../../img/scriptcase__NM__MS_Money_bg_button.gif); }";
          echo ".scLink_default { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->path_atual  = getcwd();
      $this->path_magick = $this->path_third . "/imagemagick";
      $opsys = strtolower(php_uname());
      $this->exec_linux = (FALSE !== strpos($opsys, 'windows')) ? '' : './';
      if (!file_exists($this->path_magick . "/convert"))
      {
          $this->exec_linux = "";
      }

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_check_prod($this->path_libs . "/nm_ini_perfil.php") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']) && $_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil']) && $_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['grid_postagem']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['grid_postagem']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if(function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if(function_exists("nm_check_java_path"))  $this->java_path  = nm_check_java_path($this->path_libs);
      if(function_exists("nm_check_java_bin"))  $this->java_bin  = nm_check_java_bin($this->path_libs);
      if(function_exists("nm_check_java_protocol"))  $this->java_protocol  = (nm_check_java_protocol($this->path_libs) != '')? nm_check_java_protocol($this->path_libs) : $this->java_protocol;
      $con_devel             = $_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']))
      {
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'sm002', 2); 
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['grid_postagem']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_postagem']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_postagem']['embutida_init']) 
      {
      }
// 
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
         $_SESSION['sc_session'][$this->sc_page]['grid_postagem']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "postagem"; 
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif; font-size: 11px; color: #000000; font-weight: normal; background-color: #DEE7DE; border-left-color: #DEE7DE; border-right-color: #DEE7DE; border-top-color: #DEE7DE; border-bottom-color: #DEE7DE; border-style: solid; border-width: 1; padding: 1px; background-image: url(../../img/scriptcase__NM__MS_Money_bg_button.gif); }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif; font-size: 11px; color: gray; font-weight: normal; background-color: #DEE7DE; border-left-color: #DEE7DE; border-right-color: #DEE7DE; border-top-color: #DEE7DE; border-bottom-color: #DEE7DE; border-style: solid; border-width: 1; padding: 1px; background-image: url(../../img/scriptcase__NM__MS_Money_bg_button.gif); }";
          echo ".scLink_default { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:active { text-decoration: underline; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo ".scLink_default:hover { text-decoration: none; font-family: Arial, sans-serif; font-size: 12px; color: #0000AA;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = mb_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = mb_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->regionalDefault();
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "maxsql", "pdo_mysql");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_sybase     = array("sybase");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_sqlite     = array("sqlite", "pdosqlite");
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grid_postagem']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_postagem']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "D9FYZ9BOHIvCHuFaHgBOZSNiHEFYVEXGDcNmZ1FaD1BeZMFaDMBeHEJ3HEFYVEBqHkBiDQBiZ1BYHQJeDuBOV9B/V5X7HMJeHQNwH9FaHSveHQJsHgvCHEXeDWJeZuJeDkJmZSBqD1veHQBqDuzGVcJGDEr/VEF7DcXGZ1B/HAveHuBODuNKVkJqDurGDoX7DkXODQJeZ1vOHuBiDMzGDkJGDWXCHIrqDkJKH9B/HAzGZMBqDMNKHAFKDEJeZuBqHQXGDQB/Z1vCHQBqVgN7V9BUDWFYHMrqDcXsZkBiHSrwV5FaDErYDkFKDEFYHMB/VQFYDQXGHAvOHQBqDMrKV9BsDEr/HMF7DcBqZ1JeHANKHQJsDuNaZSB/DWXKHMBODcBqZSBqHSrKHQJsDurKV9FCV5BmHMFUDcNGZSFaHSrwV5BqDMN7VkJGHEXCDoB/DcJeDuFGZ1BeD5rqHgvOVIBsDuFaHMB/D9JeZ9rqHAvOV5BODuNKVkXeDWB7VEF7D9BsH9raHIvmV5F7DMveVIJqHEBmDoJeHkBiVIXGHINKD5FUHuveVIFeHEXCDoraHkBwDQBiDSBeZMXGDEvOVcBsDWX/DoF7DkNwZSB/HAvOHQJwHgveHErsDWBmVEraHkFYZSNUHIvsV5JwHuvODkFCDWXCHMXGD9JKZkBOHAvOV5BODuNKVkXeDWB7DoBiHkBwDuXGDSN7D5B/HuvmVIBUDuB3HMNUHkNwZ9FaDSNaHQB/VgveZSJ3V5FqZuFGVQXGZSX7Z1BOVWB/HgNaVIFCDEFqDorqDcNGZkBqHAveHuJsDMBYZSFKHEB3HIBOHkJwDuBOHIrKHuJsDErYVkFCHEB7HMNUHQXOZ1JeD1BOVWB/HgrKDkFeHEXKVoFGD9FYH9X7HINKD5rqVgNaZSFeDEX/HMBiD9BiZSB/HIvCV5BODErYVkFKHEFaVoJwD9JKHQraVyBeD5BOVgNaV9FiH5FGZuNUHQFYZSBiHIBeD5JwDurYHEJ3HEFYVEBqHkBiDQBiZ1N7ZMX7DuNa";
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_check_prod($path)
   {
       $sProdDir = str_replace("\\", '/', dirname($path));
       if ('/' != substr($sProdDir, -1))
       {
           $sProdDir .= '/';
       }
       if ('/_lib/prod/lib/php/' != substr($sProdDir, -19))
       {
           $sProdLib = '../_lib/lib/prod/';
           if (@is_file($sProdLib . 'prod_list.php') && !@is_file($sProdDir . 'prod_list.php'))
           {
               include($sProdLib . 'prod_list.php');
               foreach ($aProdFileList as $sProdFile)
               {
                   if (@is_file($sProdLib . $sProdFile))
                   {
                       @copy($sProdLib . $sProdFile, $sProdDir . $sProdFile);
                   }
               }
           }
       }
   } // sc_check_prod

   function sc_Include($path, $tp, $name)
   {
       if (($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
}
//===============================================================================
//
class grid_postagem_sub_css
{
   function grid_postagem_sub_css()
   {
      global $script_case_init;
      $str_schema_all = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "ScriptCase5_Silver/ScriptCase5_Silver";
      if ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css']['grid_postagem']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$script_case_init]['SC_sub_css_bw']['grid_postagem'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_postagem_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'     => '',
                                  'param'      => array(),
                                  'autoComp'   => '',
                                  'rsSize'     => '',
                                  'msgDisplay' => '',
                                  'errList'    => array(),
                                  'fldList'    => array());
   var $grid;
   var $det;
   var $Res;
   var $Graf;
   var $pesq;
   var $pdf;
   var $csv;
   var $rtf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe,
      $glo_senha_protect, $nmgp_opcao, $nm_call_php;

      if ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
      { 
          if (!empty($GLOBALS["nmgp_parms"])) 
          { 
              $GLOBALS["nmgp_parms"] = str_replace("@aspass@", "'", $GLOBALS["nmgp_parms"]);
              $todo = explode("?@?", $GLOBALS["nmgp_parms"]);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       nm_limpa_str_grid_postagem($cadapar[1]);
                       $$cadapar[0] = $cadapar[1];
                   }
              }
          } 
      } 
      $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_postagem_ini(); 
          $this->Ini->init();
      } 
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz . "grid_postagem.php" ; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_treeview'] = false;
      } 
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
      { 
          $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . ".php";
          $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
          $this->Ini->Img_sep_grid    = "/" . trim($str_toolbar_separator);
          $this->Ini->Label_sort_pos  = trim($str_label_sort_pos);
          $this->Ini->Label_sort      = trim($str_label_sort);
          $this->Ini->Label_sort_asc  = trim($str_label_sort_asc);
          $this->Ini->Label_sort_desc = trim($str_label_sort_desc);
          $this->Ini->Sum_ico_line    = trim($sum_ico_line);
          $this->Ini->Sum_ico_column  = trim($sum_ico_column);
          include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['scriptcase']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['scriptcase']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['scriptcase']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "");
          $_SESSION['scriptcase']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['field_order'][] = "idclassificacao";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['field_order'][] = "idpostagem";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['field_order'][] = "identificarmensagem";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['field_order'][] = "mensagemoriginal";
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_postagem']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_postagem']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['grid_postagem']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      if (!class_exists("Services_JSON"))
      {
          include_once("grid_postagem_json.php");
      }
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['scriptcase']['sc_idioma_pivot']['pt_br'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_pdf'] = array();
          $_SESSION['scriptcase']['sc_idioma_pdf']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['scriptcase']['sc_idioma_graf_flash'] = array();
      $_SESSION['scriptcase']['sc_idioma_graf_flash']['pt_br'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
      );
      if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
      { 
          $_SESSION['scriptcase']['sc_idioma_prt'] = array();
          $_SESSION['scriptcase']['sc_idioma_prt']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      $this->Ini->exec_magick = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      $sc_GD_version = "";
      if (function_exists("gd_info"))
      {
          $sc_info_GD = gd_info();
          if (isset($sc_info_GD['GD Version']))
          {
             $pos_Temp = strpos($sc_info_GD['GD Version'], "(");
             if ($pos_Temp)
             {
                 $sc_GD_version = substr($sc_info_GD['GD Version'], $pos_Temp + 1, 3);
             }
             elseif (!empty($sc_info_GD['GD Version']))
             {
                 $pos_Temp = strpos($sc_info_GD['GD Version'], " ");
                 $sc_GD_version = substr($sc_info_GD['GD Version'], 0, $pos_Temp);
             }
             if ($sc_GD_version >= 2)
             {
                 $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
                 $this->Ini->exec_magick = false;
             }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['ordem_select']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['ordem_select'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['ordem_select']; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "busca" ;  
      }   
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_postagem']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_postagem']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "busca";
          }   
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida_form'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "busca")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "inicio";
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opc_liga'] = $NMSC_conf_apl;  
          }   
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opc_liga']['inicial']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opc_liga']['inicial'];
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['print_all'] = true;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['scriptcase']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if (!$this->Db)
      { 
          if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao']))
          { 
              $this->Db = db_conect_devel($_SESSION['scriptcase']['grid_postagem']['glo_nm_conexao'], $this->Ini->root . $this->Ini->path_prod, 'sm002'); 
          } 
          else 
          { 
              $this->Db = db_conect($this->Ini->nm_tpbanco, $this->Ini->nm_servidor, $this->Ini->nm_usuario, $this->Ini->nm_senha, $this->Ini->nm_banco, $glo_senha_protect, "S", $this->Ini->nm_con_persistente, $this->Ini->nm_con_db2, $this->Ini->nm_database_encoding); 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "fast_search")  
      { 
          $this->SC_fast_search($GLOBALS["nmgp_fast_search"], $GLOBALS["nmgp_cond_fast_search"], $GLOBALS["nmgp_arg_fast_search"]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq'])
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = 'igual';
          } 
          else 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['contr_array_resumo'] = "NAO";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['contr_total_geral']  = "NAO";
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['tot_geral']);
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = 'pesq';
          } 
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_erro.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_postagem_erro.class.php"); 
      } 
      $this->Erro      = new grid_postagem_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_postagem_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_postagem_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['prim_cons'] = false;  
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'] = " where postcandidata IN ('SIM', 'TALVEZ')";  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['tot_geral']);
      } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_filtro'];
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
      {
         $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_postagem_html_" . session_id() . "_2.html";
            if (isset($_GET['pdf_base']) && isset($_GET['pdf_url']))
            {
                $nm_arquivo_pdf_base = "/" . $_GET['pdf_base'];
                $nm_arquivo_pdf_url  = $_GET['pdf_url'] . $nm_arquivo_pdf_base;
            }
            else
            {
                $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_grid_postagem.pdf";
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            }
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_postagem_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->java_protocol . $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_postagem_html_" . session_id() . ".html";
            $nm_saida->seta_arquivo($nm_arquivo_de_saida);
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "csv")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_csv.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_postagem_csv.class.php"); 
          } 
          $this->csv  = new grid_postagem_csv();
          $this->prep_modulos("csv");
          $this->csv->monta_csv();
      }
      else   
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_grafico.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_postagem_grafico.class.php"); 
          } 
          $this->Graf  = new grid_postagem_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "busca")  
      { 
          require_once($this->Ini->path_aplicacao . "grid_postagem_pesq.class.php"); 
          $this->pesq  = new grid_postagem_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->NM_ajax_retorno = $this->NM_ajax_retorno;
          $this->pesq->NM_ajax_info    = $this->NM_ajax_info;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_resumo.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_postagem_resumo.class.php"); 
          } 
          $this->Res = new grid_postagem_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "print" && $nmgp_tipo_print == "RC")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['opcao'] == "detalhe")  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_det.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_postagem_det.class.php"); 
              } 
              $this->det  = new grid_postagem_det();
              $this->prep_modulos("det");
              $this->det->monta_det();
          } 
          else  
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
              { 
                  require_once($this->Ini->path_embutida . "grid_postagem/grid_postagem_grid.class.php"); 
              } 
              else 
              { 
                  require_once($this->Ini->path_aplicacao . "grid_postagem_grid.class.php"); 
              } 
              $this->grid  = new grid_postagem_grid();
              $this->prep_modulos("grid");
              $this->grid->monta_grid($linhas);
          } 
      }   
//--- 
      if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
      {
           $this->Db->Close(); 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['embutida'])
      {
         $nm_saida->finaliza();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;;
            }
            else
            {
                $str_pd4ml    = " 800 LETTER -orientation PORTRAIT";
            }
            if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
            {
                $lang_protect = (strstr($this->Ini->Nm_lang['lang_pdff_gnrt'], "&") === false) ? htmlentities($this->Ini->Nm_lang['lang_pdff_gnrt'],  ENT_COMPAT, $_SESSION['scriptcase']['charset']) : $this->Ini->Nm_lang['lang_pdff_gnrt'];
                fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                fclose($this->grid->progress_fp);
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf))
            {
                $Tmp_ttf    = (FALSE !== strpos($this->Ini->path_font, ' ')) ? " \"" . $this->Ini->path_font . "\"" : $this->Ini->path_font;
                $str_pd4ml .= " -ttf " . $Tmp_ttf;
            }
            chdir($this->Ini->path_third . "/pd4ml");
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_name']))
            {
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            $path_bin     = (trim($this->Ini->java_bin) == '')?'java':trim($this->Ini->java_bin);
            $path_java    = $this->Ini->java_path . $path_bin;
            $path_java    = (FALSE !== strpos($path_java, ' '))     ? " \"" . $path_java . "\""     :  $path_java;
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                $str_execcmd2 = $path_java . ' -Xms128m -Xmx256m -cp .;pd4ml.jar Pd4Php ' . $arq_pdf_in . $str_pd4ml . '  -permissions 2076 > ' . $arq_pdf_out;
            }
            else
            {
                $str_execcmd2 = $path_java . ' -Xms128m -Xmx256m -Djava.awt.headless=true -cp .:pd4ml.jar Pd4Php ' . $arq_pdf_in . $str_pd4ml . '  -permissions 2076 > ' . $arq_pdf_out;
            }
            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(".pdf", "", $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
            {
                $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                if ($this->grid->progress_fp)
                {
                    $lang_protect = (strstr($this->Ini->Nm_lang['lang_pdff_fnsh'], "&") === false) ? htmlentities($this->Ini->Nm_lang['lang_pdff_fnsh'],  ENT_COMPAT, $_SESSION['scriptcase']['charset']) : $this->Ini->Nm_lang['lang_pdff_fnsh'];
                    fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                    fwrite($this->grid->progress_fp, "off\n");
                    fclose($this->grid->progress_fp);
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<?php
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "");
?>
<FORM name="F0" method=post action="grid_postagem.php" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo $this->Ini->sc_page; ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo session_id(); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo $NM_volta; ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
   } 
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_filtro'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['fast_search']);
          return;
      }
      $comando = "";
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_idclassificacao($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "idclassificacao", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idpostagem", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "identificarmensagem", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "mensagemoriginal", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "mensagem", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "postcandidata", $arg_search, $data_search);
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq_filtro'] = "( " . $comando . " )";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'])) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_orig'] . " and ( " . $comando . " )"; 
      }
      else
      {
          $comando = " where " . $comando ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['where_pesq'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['fast_search'][2] = $sv_data;
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_numeric = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idpostagem";$nm_numeric[] = "idclassificacao";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_postagem']['decimal_db'] == ".")
         {
             $nm_aspas = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
         {
             $nome     = "convert(char(23),$nome,121)";
         }
         elseif (substr($tp_campo, 0, 5) == "TIMES" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATE" . substr($tp_campo, 4);
         }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               if (substr($tp_campo, 0, 4) == "DATE")
               {
                   $NM_cmd     = "";
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "year($nome) = " . $this->NM_data_qp['ano'];
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "month($nome) = " . $this->NM_data_qp['mes'];
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : " and ";
                       $NM_cmd     .= "day($nome) = " . $this->NM_data_qp['dia'];
                   }
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $comando        .= $NM_cmd;
                   }
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
               }
            break;
            case "DF":     // 
               if ($tp_campo == "DTDF" || $tp_campo == "DATEDF")
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not like '%" . $campo . "%'";
               }
               else
               {
                   $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas;
               }
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas;
            break;
         }
   }
   function SC_lookup_idclassificacao($condicao, $campo)
   {
       $result = array();
       $nm_comando = "SELECT nomeoriginal, idclassificacao FROM classificacaocubo WHERE (nomeoriginal LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = &$this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("grid_postagem_nmutf8.php");
   }
   $_SESSION['scriptcase']['grid_postagem']['contr_erro'] = 'off';
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_grid_postagem($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            nm_limpa_str_grid_postagem($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }

    if (isset($_POST['rs']) && strpos($_POST['rs'], '_ajax_') !== false && isset($_POST['rsargs']) && !empty($_POST['rsargs']))
    {
        $nmgp_opcao = "busca";
    }

   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form_parms'];
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($script_case_init))
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form']);
       unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($script_case_init) || ((!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todo = explode("?@?", $nmgp_parms);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    nm_limpa_str_grid_postagem($cadapar[1]);
                    $$cadapar[0] = $cadapar[1];
                }
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']);
               $_SESSION['sc_session'][$script_case_init]['grid_postagem']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']) && $_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (isset($GLOBALS["script_case_init"]) && !empty($GLOBALS["script_case_init"]))
   {
       $ini_embutida = $GLOBALS["script_case_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_postagem']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_postagem']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_postagem']['embutida'])
        { 
           $script_case_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['scriptcase']['grid_postagem']['protect_modal']) && !empty($_SESSION['scriptcase']['grid_postagem']['protect_modal']))
   {
       $script_case_init = $_SESSION['scriptcase']['grid_postagem']['protect_modal'];
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 1000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'];
       unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']) && $script_case_init == 1)
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        if ($script_case_init == 1)
        {
            $_SESSION['scriptcase']['sc_apl_menu_atual'] = "grid_postagem";
        }
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_postagem' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('grid_postagem' == $sReferer || 'grid_postagem_' == substr($sReferer, 0, 14))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'] = true;
       }
   }
   if ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['initialize'])
   {
       unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['tot_geral']);
   }

   $_POST['script_case_init'] = $script_case_init;
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['b_sair'])))
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['b_sair'] = true;
   }
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'grid_postagem')
   {
       $_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['grid_postagem']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_postagem_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['scriptcase']['sc_tp_saida']))  ? $_SESSION['scriptcase']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['scriptcase']['sc_url_saida'][$script_case_init])) ? $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] : "";
   if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           unset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['tot_geral']);
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['scriptcase']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'] = $nmgp_opcao ;  
       }   
       if ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'] == "detalhe" && isset($nmgp_chave_det))  
       { 
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['chave_det'] = $nmgp_chave_det;  
       }   
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$script_case_init]['grid_postagem']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'] = true;
       }
       if (isset($nmgp_rotaciona) && $nmgp_rotaciona == "S") 
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['res_hrz'] = ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['res_hrz']) ? false : true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_apl']))
       {
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_postagem_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_postagem_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$script_case_init]['grid_postagem']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$script_case_init]['grid_postagem']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$script_case_init]['grid_postagem']['retorno_cons']  . "?script_case_init=" . $script_case_init;  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida ; 
               } 
               $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $nm_url_saida; 
               $nm_url_saida = "grid_postagem_fim.php"; 
               $_SESSION['scriptcase']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['scriptcase']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'] != "pdf" ) 
       { 
            $_SESSION['sc_session'][$script_case_init]['grid_postagem']['menu_desenv'] = true;   
       } 
       if (isset($_GET["nmgp_parms_ret"])) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opc_psq'] = true ;   
       } 
       elseif (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['opc_psq']))
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opc_psq'] = false ;   
       } 
       if ($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida_form'])
       {
           $_SESSION['sc_session'][$script_case_init]['grid_postagem']['mostra_edit'] = "N";   
           $_SESSION['scriptcase']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['scriptcase']['sc_url_saida'][$script_case_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan']) && $_SESSION['sc_session'][$script_case_init]['grid_postagem']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_postagem = new grid_postagem_apl();

      if (!isset($_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida']) || !$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'])
      { 
          if (!function_exists("sajax_init")) 
          { 
              include_once(dirname(__FILE__) . '/grid_postagem_sajax.php');
          }
          $sajax_request_type = "POST";
          sajax_init();
      }
      //$sajax_debug_mode = 1;
      sajax_handle_client_request();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$script_case_init]['grid_postagem']['opcao'] = "busca";
          $contr_grid_postagem->NM_ajax_flag = true;
          $contr_grid_postagem->NM_ajax_opcao = $NM_ajax_opcao;
      }

       $contr_grid_postagem->controle();
   } 
   if (!$_SESSION['sc_session'][$script_case_init]['grid_postagem']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_postagem = new grid_postagem_apl();
       $contr_grid_postagem->controle();
   } 
//
   function nm_limpa_str_grid_postagem(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }

    function grid_postagem_nm_return_ajax()
    {
        global $contr_grid_postagem;
        $contr_grid_postagem->NM_ajax_flag    = $contr_grid_postagem->pesq->NM_ajax_flag;
        $contr_grid_postagem->NM_ajax_opcao   = $contr_grid_postagem->pesq->NM_ajax_opcao;
        $contr_grid_postagem->NM_ajax_retorno = $contr_grid_postagem->pesq->NM_ajax_retorno;
        $contr_grid_postagem->NM_ajax_info    = $contr_grid_postagem->pesq->NM_ajax_info;
        grid_postagem_pack_ajax_response();
    }

   function grid_postagem_pack_ajax_response()
   {
      global $contr_grid_postagem;
      $aResp = array();
      if ($contr_grid_postagem->NM_ajax_info['calendarReload'])
      {
         $aResp['result'] = 'CALENDARRELOAD';
      }
      elseif ('' != $contr_grid_postagem->NM_ajax_info['autoComp'])
      {
         $aResp['result'] = 'AUTOCOMP';
      }
//mestre_detalhe
      elseif (!empty($contr_grid_postagem->NM_ajax_info['newline']))
      {
         $aResp['result'] = 'NEWLINE';
         ob_end_clean();
      }
      elseif (!empty($contr_grid_postagem->NM_ajax_info['tableRefresh']))
      {
         $aResp['result'] = 'TABLEREFRESH';
      }
//-----
      elseif (!empty($contr_grid_postagem->NM_ajax_info['errList']))
      {
         $aResp['result'] = 'ERROR';
      }
      elseif (!empty($contr_grid_postagem->NM_ajax_info['fldList']))
      {
         $aResp['result'] = 'SET';
      }
      else
      {
         $aResp['result'] = 'OK';
      }
      if ('AUTOCOMP' == $aResp['result'])
      {
         $aResp = $contr_grid_postagem->NM_ajax_info['autoComp'];
      }
//mestre_detalhe
      elseif ('NEWLINE' == $aResp['result'])
      {
         $aResp = $contr_grid_postagem->NM_ajax_info['newline'];
      }
      else
//-----
      {
         if ('CALENDARRELOAD' == $aResp['result'])
         {
            grid_postagem_pack_calendar_reload($aResp);
         }
         elseif ('ERROR' == $aResp['result'])
         {
            grid_postagem_pack_ajax_errors($aResp);
         }
         elseif ('SET' == $aResp['result'])
         {
            grid_postagem_pack_ajax_set_fields($aResp);
         }
         elseif ('TABLEREFRESH' == $aResp['result'])
         {
            grid_postagem_pack_ajax_set_fields($aResp);
            $aResp['tableRefresh'] = grid_postagem_pack_protect_string($contr_grid_postagem->NM_ajax_info['tableRefresh']);
         }
         if ('OK' == $aResp['result'] || 'SET' == $aResp['result'])
         {
            grid_postagem_pack_ajax_ok($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['focus']) && '' != $contr_grid_postagem->NM_ajax_info['focus'])
         {
            $aResp['setFocus'] = $contr_grid_postagem->NM_ajax_info['focus'];
         }
         if (isset($contr_grid_postagem->NM_ajax_info['closeLine']) && '' != $contr_grid_postagem->NM_ajax_info['closeLine'])
         {
            $aResp['closeLine'] = $contr_grid_postagem->NM_ajax_info['closeLine'];
         }
         else
         {
            $aResp['closeLine'] = 'N';
         }
         if (isset($contr_grid_postagem->NM_ajax_info['clearUpload']) && '' != $contr_grid_postagem->NM_ajax_info['clearUpload'])
         {
            $aResp['clearUpload'] = $contr_grid_postagem->NM_ajax_info['clearUpload'];
         }
         else
         {
            $aResp['clearUpload'] = 'N';
         }
         if (isset($contr_grid_postagem->NM_ajax_info['masterValue']) && '' != $contr_grid_postagem->NM_ajax_info['masterValue'])
         {
            grid_postagem_pack_master_value($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['ajaxAlert']) && '' != $contr_grid_postagem->NM_ajax_info['ajaxAlert'])
         {
            grid_postagem_pack_ajax_alert($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']) && '' != $contr_grid_postagem->NM_ajax_info['ajaxMessage'])
         {
            grid_postagem_pack_ajax_message($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['ajaxJavascript']) && '' != $contr_grid_postagem->NM_ajax_info['ajaxJavascript'])
         {
            grid_postagem_pack_ajax_javascript($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['redir']) && !empty($contr_grid_postagem->NM_ajax_info['redir']))
         {
            grid_postagem_pack_ajax_redir($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['redirExit']) && !empty($contr_grid_postagem->NM_ajax_info['redirExit']))
         {
            grid_postagem_pack_ajax_redir_exit($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['blockDisplay']) && !empty($contr_grid_postagem->NM_ajax_info['blockDisplay']))
         {
            grid_postagem_pack_ajax_block_display($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['fieldDisplay']) && !empty($contr_grid_postagem->NM_ajax_info['fieldDisplay']))
         {
            grid_postagem_pack_ajax_field_display($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['buttonDisplay']) && !empty($contr_grid_postagem->NM_ajax_info['buttonDisplay']))
         {
            $contr_grid_postagem->NM_ajax_info['buttonDisplay'] = $contr_grid_postagem->nmgp_botoes;
            grid_postagem_pack_ajax_button_display($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['fieldLabel']) && !empty($contr_grid_postagem->NM_ajax_info['fieldLabel']))
         {
            grid_postagem_pack_ajax_field_label($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['readOnly']) && !empty($contr_grid_postagem->NM_ajax_info['readOnly']))
         {
            grid_postagem_pack_ajax_readonly($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['navStatus']) && !empty($contr_grid_postagem->NM_ajax_info['navStatus']))
         {
            grid_postagem_pack_ajax_nav_status($aResp);
         }
         if (isset($contr_grid_postagem->NM_ajax_info['btnVars']) && !empty($contr_grid_postagem->NM_ajax_info['btnVars']))
         {
            grid_postagem_pack_ajax_btn_vars($aResp);
         }
         $aResp['htmOutput'] = '';
    
         if (isset($contr_grid_postagem->NM_ajax_info['param']['buffer_output']) && $contr_grid_postagem->NM_ajax_info['param']['buffer_output'])
         {
            $aResp['htmOutput'] = grid_postagem_pack_protect_string(ob_get_contents());
            if (false === $aResp['htmOutput'])
            {
               $aResp['htmOutput'] = '';
            }
            else
            {
               ob_end_clean();
            }
         }
      }
      if (is_array($aResp))
      {
          $oJson = new Services_JSON();
          echo "var res = " . trim(sajax_get_js_repr($oJson->encode($aResp))) . "; res;";
      }
      else
      {
          echo "var res = " . trim(sajax_get_js_repr($aResp)) . "; res;";
      }
      exit;
   } // grid_postagem_pack_ajax_response

   function grid_postagem_pack_calendar_reload(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['calendarReload'] = 'OK';
   } // grid_postagem_pack_calendar_reload

   function grid_postagem_pack_ajax_errors(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['errList'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['errList'] as $sField => $aMsg)
      {
         if ('geral_grid_postagem' == $sField)
         {
             $aMsg = grid_postagem_pack_ajax_remove_erros($aMsg);
         }
         foreach ($aMsg as $sMsg)
         {
            $iNumLinha = (isset($contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row']) && 'geral_grid_postagem' != $sField)
                       ? $contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row'] : "";
            $aResp['errList'][] = array('fldName'  => $sField,
                                        'msgText'  => grid_postagem_pack_protect_string($sMsg),
                                        'numLinha' => $iNumLinha);
         }
      }
   } // grid_postagem_pack_ajax_errors

   function grid_postagem_pack_ajax_remove_erros($aErrors)
   {
       $aNewErrors = array();
       if (!empty($aErrors))
       {
           $sErrorMsgs = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), implode('<br />', $aErrors));
           $aErrorMsgs = explode('<BR>', $sErrorMsgs);
           foreach ($aErrorMsgs as $sErrorMsg)
           {
               if ('' != $sErrorMsg && !in_array($sErrorMsg, $aNewErrors))
               {
                   $aNewErrors[] = $sErrorMsg;
               }
           }
       }
       return $aNewErrors;
   } // grid_postagem_pack_ajax_remove_erros

   function grid_postagem_pack_ajax_ok(&$aResp)
   {
      global $contr_grid_postagem;
      $iNumLinha = (isset($contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      $aResp['msgDisplay'] = array('msgText'  => grid_postagem_pack_protect_string($contr_grid_postagem->NM_ajax_info['msgDisplay']),
                                   'numLinha' => $iNumLinha);
   } // grid_postagem_pack_ajax_ok

   function grid_postagem_pack_ajax_set_fields(&$aResp)
   {
      global $contr_grid_postagem;
      $iNumLinha = (isset($contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row']))
                 ? $contr_grid_postagem->NM_ajax_info['param']['nmgp_refresh_row'] : "";
      if ('' != $contr_grid_postagem->NM_ajax_info['rsSize'])
      {
         $aResp['rsSize'] = $contr_grid_postagem->NM_ajax_info['rsSize'];
      }
      $aResp['fldList'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['fldList'] as $sField => $aData)
      {
         $aField = array();
         if (isset($aData['colNum']))
         {
            $aField['colNum'] = $aData['colNum'];
         }
         if (isset($aData['imgFile']))
         {
            $aField['imgFile'] = grid_postagem_pack_protect_string($aData['imgFile']);
         }
         if (isset($aData['imgOrig']))
         {
            $aField['imgOrig'] = grid_postagem_pack_protect_string($aData['imgOrig']);
         }
         if (isset($aData['imgLink']))
         {
            $aField['imgLink'] = grid_postagem_pack_protect_string($aData['imgLink']);
         }
         if (isset($aData['keepImg']))
         {
            $aField['keepImg'] = $aData['keepImg'];
         }
         if (isset($aData['docLink']))
         {
            $aField['docLink'] = grid_postagem_pack_protect_string($aData['docLink']);
         }
         if (isset($aData['docIcon']))
         {
            $aField['docIcon'] = grid_postagem_pack_protect_string($aData['docIcon']);
         }
         if (isset($aData['keyVal']))
         {
            $aField['keyVal'] = $aData['keyVal'];
         }
         if (isset($aData['optComp']))
         {
            $aField['optComp'] = $aData['optComp'];
         }
         if (isset($aData['lookupCons']))
         {
            $aField['lookupCons'] = $aData['lookupCons'];
         }
         if (isset($aData['imgHtml']))
         {
            $aField['imgHtml'] = grid_postagem_pack_protect_string($aData['imgHtml']);
         }
         if (isset($aData['updInnerHtml']))
         {
            $aField['updInnerHtml'] = $aData['updInnerHtml'];
         }
         if (isset($aData['htmComp']))
         {
            $aField['htmComp'] = str_replace("'", '__AS__', str_replace('"', '__AD__', $aData['htmComp']));
         }
         $aField['fldName']  = $sField;
         $aField['fldType']  = $aData['type'];
         $aField['numLinha'] = $iNumLinha;
         $aField['valList']  = array();
         foreach ($aData['valList'] as $iIndex => $sValue)
         {
            $aValue = array();
            if (isset($aData['labList'][$iIndex]))
            {
               $aValue['label'] = grid_postagem_pack_protect_string($aData['labList'][$iIndex]);
            }
            $aValue['value']     = ('_autocomp' != substr($sField, -9)) ? grid_postagem_pack_protect_string($sValue) : $sValue;
            $aField['valList'][] = $aValue;
         }
         foreach ($aField['valList'] as $iIndex => $aFieldData)
         {
             if ("null" == $aFieldData['value'])
             {
                 $aField['valList'][$iIndex]['value'] = '';
             }
         }
         if (isset($aData['optList']) && false !== $aData['optList'])
         {
            if (is_array($aData['optList']))
            {
               $aField['optList'] = array();
               foreach ($aData['optList'] as $aOptList)
               {
                  foreach ($aOptList as $sValue => $sLabel)
                  {
                     $sOpt = ($sValue !== $sLabel) ? $sValue : $sLabel;
                     $aField['optList'][] = array('value' => grid_postagem_pack_protect_string($sOpt),
                                                  'label' => grid_postagem_pack_protect_string($sLabel));
                  }
               }
            }
            else
            {
               $aField['optList'] = $aData['optList'];
            }
         }
         $aResp['fldList'][] = $aField;
      }
   } // grid_postagem_pack_ajax_set_fields

   function grid_postagem_pack_ajax_redir(&$aResp)
   {
      global $contr_grid_postagem;
      $aInfo              = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session', 'h_modal', 'w_modal');
      $aResp['redirInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_grid_postagem->NM_ajax_info['redir'][$sTag]))
         {
            $aResp['redirInfo'][$sTag] = $contr_grid_postagem->NM_ajax_info['redir'][$sTag];
         }
      }
   } // grid_postagem_pack_ajax_redir

   function grid_postagem_pack_ajax_redir_exit(&$aResp)
   {
      global $contr_grid_postagem;
      $aInfo                  = array('metodo', 'action', 'target', 'nmgp_parms', 'nmgp_outra_jan', 'nmgp_url_saida', 'script_case_init', 'script_case_session');
      $aResp['redirExitInfo'] = array();
      foreach ($aInfo as $sTag)
      {
         if (isset($contr_grid_postagem->NM_ajax_info['redirExit'][$sTag]))
         {
            $aResp['redirExitInfo'][$sTag] = $contr_grid_postagem->NM_ajax_info['redirExit'][$sTag];
         }
      }
   } // grid_postagem_pack_ajax_redir_exit

   function grid_postagem_pack_master_value(&$aResp)
   {
      global $contr_grid_postagem;
      foreach ($contr_grid_postagem->NM_ajax_info['masterValue'] as $sIndex => $sValue)
      {
         $aResp['masterValue'][] = array('index' => $sIndex,
                                         'value' => $sValue);
      }
   } // grid_postagem_pack_master_value

   function grid_postagem_pack_ajax_alert(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['ajaxAlert'] = array('message' => $contr_grid_postagem->NM_ajax_info['ajaxAlert']['message']);
   } // grid_postagem_pack_ajax_alert

   function grid_postagem_pack_ajax_message(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['ajaxMessage'] = array('message'      => grid_postagem_pack_protect_string($contr_grid_postagem->NM_ajax_info['ajaxMessage']['message']),
                                    'title'        => grid_postagem_pack_protect_string($contr_grid_postagem->NM_ajax_info['ajaxMessage']['title']),
                                    'modal'        => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['modal'])        ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['modal']        : 'N',
                                    'timeout'      => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['timeout'])      ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['timeout']      : '',
                                    'button'       => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['button'])       ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['button']       : '',
                                    'button_label' => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['button_label']) ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['button_label'] : 'Ok',
                                    'top'          => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['top'])          ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['top']          : '',
                                    'left'         => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['left'])         ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['left']         : '',
                                    'width'        => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['width'])        ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['width']        : '',
                                    'height'       => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['height'])       ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['height']       : '',
                                    'redir'        => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir'])        ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir']        : '',
                                    'show_close'   => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['show_close'])   ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['show_close']   : 'Y',
                                    'body_icon'    => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['body_icon'])    ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['body_icon']    : 'Y',
                                    'redir_target' => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir_target']) ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir_target'] : '',
                                    'redir_par'    => isset($contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir_par'])    ? $contr_grid_postagem->NM_ajax_info['ajaxMessage']['redir_par']    : '');
   } // grid_postagem_pack_ajax_message

   function grid_postagem_pack_ajax_javascript(&$aResp)
   {
      global $contr_grid_postagem;
      foreach ($contr_grid_postagem->NM_ajax_info['ajaxJavascript'] as $aJsFunc)
      {
         $aResp['ajaxJavascript'][] = $aJsFunc;
      }
   } // grid_postagem_pack_ajax_javascript

   function grid_postagem_pack_ajax_block_display(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['blockDisplay'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['blockDisplay'] as $sBlockName => $sBlockStatus)
      {
        $aResp['blockDisplay'][] = array($sBlockName, $sBlockStatus);
      }
   } // grid_postagem_pack_ajax_block_display

   function grid_postagem_pack_ajax_field_display(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['fieldDisplay'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['fieldDisplay'] as $sFieldName => $sFieldStatus)
      {
        $aResp['fieldDisplay'][] = array($sFieldName, $sFieldStatus);
      }
   } // grid_postagem_pack_ajax_field_display

   function grid_postagem_pack_ajax_button_display(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['buttonDisplay'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['buttonDisplay'] as $sButtonName => $sButtonStatus)
      {
        $aResp['buttonDisplay'][] = array($sButtonName, $sButtonStatus);
      }
   } // grid_postagem_pack_ajax_button_display

   function grid_postagem_pack_ajax_field_label(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['fieldLabel'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['fieldLabel'] as $sFieldName => $sFieldLabel)
      {
        $aResp['fieldLabel'][] = array($sFieldName, grid_postagem_pack_protect_string($sFieldLabel));
      }
   } // grid_postagem_pack_ajax_field_label

   function grid_postagem_pack_ajax_readonly(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['readOnly'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['readOnly'] as $sFieldName => $sFieldStatus)
      {
        $aResp['readOnly'][] = array($sFieldName, $sFieldStatus);
      }
   } // grid_postagem_pack_ajax_readonly

   function grid_postagem_pack_ajax_nav_status(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['navStatus'] = array();
      if (isset($contr_grid_postagem->NM_ajax_info['navStatus']['ret']) && '' != $contr_grid_postagem->NM_ajax_info['navStatus']['ret'])
      {
         $aResp['navStatus']['ret'] = $contr_grid_postagem->NM_ajax_info['navStatus']['ret'];
      }
      if (isset($contr_grid_postagem->NM_ajax_info['navStatus']['ava']) && '' != $contr_grid_postagem->NM_ajax_info['navStatus']['ava'])
      {
         $aResp['navStatus']['ava'] = $contr_grid_postagem->NM_ajax_info['navStatus']['ava'];
      }
   } // grid_postagem_pack_ajax_nav_status

   function grid_postagem_pack_ajax_btn_vars(&$aResp)
   {
      global $contr_grid_postagem;
      $aResp['btnVars'] = array();
      foreach ($contr_grid_postagem->NM_ajax_info['btnVars'] as $sBtnName => $sBtnValue)
      {
        $aResp['btnVars'][] = array($sBtnName, grid_postagem_pack_protect_string($sBtnValue));
      }
   } // grid_postagem_pack_ajax_btn_vars

   function grid_postagem_pack_protect_string($sString)
   {
      $sString = (string) $sString;

      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   } // grid_postagem_pack_protect_string
?>
