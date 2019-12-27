<?php

  $arr_buttons = array();
  if(isset($this->Ini->Nm_lang))
  {
      $Nm_lang = $this->Ini->Nm_lang;
  }
  else
  {
      $Nm_lang = $this->Nm_lang;
  }
  $this->arr_buttons['bcons_inicio']['hint']  = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['bcons_inicio']['type']  = 'button';
  $this->arr_buttons['bcons_inicio']['value'] = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['bcons_inicio']['style'] = 'default';
  $this->arr_buttons['bcons_inicio']['image'] = '';

  $this->arr_buttons['bcons_retorna']['hint']  = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bcons_retorna']['type']  = 'button';
  $this->arr_buttons['bcons_retorna']['value'] = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bcons_retorna']['style'] = 'default';
  $this->arr_buttons['bcons_retorna']['image'] = '';

  $this->arr_buttons['bcons_avanca']['hint']  = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bcons_avanca']['type']  = 'button';
  $this->arr_buttons['bcons_avanca']['value'] = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bcons_avanca']['style'] = 'default';
  $this->arr_buttons['bcons_avanca']['image'] = '';

  $this->arr_buttons['bcons_final']['hint']  = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bcons_final']['type']  = 'button';
  $this->arr_buttons['bcons_final']['value'] = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bcons_final']['style'] = 'default';
  $this->arr_buttons['bcons_final']['image'] = '';

  $this->arr_buttons['birpara']['hint']  = $Nm_lang['lang_btns_jump_hint'];
  $this->arr_buttons['birpara']['type']  = 'button';
  $this->arr_buttons['birpara']['value'] = $Nm_lang['lang_btns_jump'];
  $this->arr_buttons['birpara']['style'] = 'default';
  $this->arr_buttons['birpara']['image'] = '';

  $this->arr_buttons['bprint']['hint']  = $Nm_lang['lang_btns_prnt_hint'];
  $this->arr_buttons['bprint']['type']  = 'button';
  $this->arr_buttons['bprint']['value'] = $Nm_lang['lang_btns_prnt'];
  $this->arr_buttons['bprint']['style'] = 'default';
  $this->arr_buttons['bprint']['image'] = '';

  $this->arr_buttons['bresumo']['hint']  = $Nm_lang['lang_btns_smry_hint'];
  $this->arr_buttons['bresumo']['type']  = 'button';
  $this->arr_buttons['bresumo']['value'] = $Nm_lang['lang_btns_smry'];
  $this->arr_buttons['bresumo']['style'] = 'default';
  $this->arr_buttons['bresumo']['image'] = '';

  $this->arr_buttons['bsort']['hint']  = $Nm_lang['lang_btns_sort_hint'];
  $this->arr_buttons['bsort']['type']  = 'button';
  $this->arr_buttons['bsort']['value'] = $Nm_lang['lang_btns_sort'];
  $this->arr_buttons['bsort']['style'] = 'default';
  $this->arr_buttons['bsort']['image'] = '';

  $this->arr_buttons['bcolumns']['hint']  = $Nm_lang['lang_btns_clmn_hint'];
  $this->arr_buttons['bcolumns']['type']  = 'button';
  $this->arr_buttons['bcolumns']['value'] = $Nm_lang['lang_btns_clmn'];
  $this->arr_buttons['bcolumns']['style'] = 'default';
  $this->arr_buttons['bcolumns']['image'] = '';

  $this->arr_buttons['bcons_detalhes']['hint']  = $Nm_lang['lang_btns_lens_hint'];
  $this->arr_buttons['bcons_detalhes']['type']  = 'image';
  $this->arr_buttons['bcons_detalhes']['value'] = $Nm_lang['lang_btns_lens'];
  $this->arr_buttons['bcons_detalhes']['style'] = '';
  $this->arr_buttons['bcons_detalhes']['image'] = 'sys__NM__nm_botoeslogin_bcons_detalhes.gif';

  $this->arr_buttons['bqt_linhas']['hint']  = $Nm_lang['lang_btns_rows_hint'];
  $this->arr_buttons['bqt_linhas']['type']  = 'button';
  $this->arr_buttons['bqt_linhas']['value'] = $Nm_lang['lang_btns_rows'];
  $this->arr_buttons['bqt_linhas']['style'] = 'default';
  $this->arr_buttons['bqt_linhas']['image'] = '';

  $this->arr_buttons['bgraf']['hint']  = $Nm_lang['lang_btns_chrt_hint'];
  $this->arr_buttons['bgraf']['type']  = 'button';
  $this->arr_buttons['bgraf']['value'] = $Nm_lang['lang_btns_chrt'];
  $this->arr_buttons['bgraf']['style'] = 'default';
  $this->arr_buttons['bgraf']['image'] = '';

  $this->arr_buttons['bconf_graf']['hint']  = $Nm_lang['lang_btns_chrt_stng_hint'];
  $this->arr_buttons['bconf_graf']['type']  = 'button';
  $this->arr_buttons['bconf_graf']['value'] = $Nm_lang['lang_btns_chrt_stng'];
  $this->arr_buttons['bconf_graf']['style'] = 'default';
  $this->arr_buttons['bconf_graf']['image'] = '';

  $this->arr_buttons['bqtd_bytes']['hint']  = '';
  $this->arr_buttons['bqtd_bytes']['type']  = 'button';
  $this->arr_buttons['bqtd_bytes']['value'] = $Nm_lang['lang_btns_qtch'];
  $this->arr_buttons['bqtd_bytes']['style'] = 'default';
  $this->arr_buttons['bqtd_bytes']['image'] = '';

  $this->arr_buttons['blink_resumogrid']['hint']  = $Nm_lang['lang_btns_smry_drll_hint'];
  $this->arr_buttons['blink_resumogrid']['type']  = 'button';
  $this->arr_buttons['blink_resumogrid']['value'] = $Nm_lang['lang_btns_smry_drll'];
  $this->arr_buttons['blink_resumogrid']['style'] = 'default';
  $this->arr_buttons['blink_resumogrid']['image'] = '';

  $this->arr_buttons['brot_resumo']['hint']  = $Nm_lang['lang_btns_smry_rtte_hint'];
  $this->arr_buttons['brot_resumo']['type']  = 'button';
  $this->arr_buttons['brot_resumo']['value'] = $Nm_lang['lang_btns_smry_rtte'];
  $this->arr_buttons['brot_resumo']['style'] = 'default';
  $this->arr_buttons['brot_resumo']['image'] = '';

  $this->arr_buttons['smry_conf']['hint']  = $Nm_lang['lang_btns_smry_conf_hint'];
  $this->arr_buttons['smry_conf']['type']  = 'button';
  $this->arr_buttons['smry_conf']['value'] = $Nm_lang['lang_btns_smry_conf'];
  $this->arr_buttons['smry_conf']['style'] = 'default';
  $this->arr_buttons['smry_conf']['image'] = '';

  $this->arr_buttons['bcons_inicio_off']['hint']  = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['bcons_inicio_off']['type']  = 'button';
  $this->arr_buttons['bcons_inicio_off']['value'] = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['bcons_inicio_off']['style'] = 'disabled';
  $this->arr_buttons['bcons_inicio_off']['image'] = '';

  $this->arr_buttons['bcons_retorna_off']['hint']  = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bcons_retorna_off']['type']  = 'button';
  $this->arr_buttons['bcons_retorna_off']['value'] = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bcons_retorna_off']['style'] = 'disabled';
  $this->arr_buttons['bcons_retorna_off']['image'] = '';

  $this->arr_buttons['bcons_avanca_off']['hint']  = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bcons_avanca_off']['type']  = 'button';
  $this->arr_buttons['bcons_avanca_off']['value'] = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bcons_avanca_off']['style'] = 'disabled';
  $this->arr_buttons['bcons_avanca_off']['image'] = '';

  $this->arr_buttons['bcons_final_off']['hint']  = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bcons_final_off']['type']  = 'button';
  $this->arr_buttons['bcons_final_off']['value'] = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bcons_final_off']['style'] = 'disabled';
  $this->arr_buttons['bcons_final_off']['image'] = '';

  $this->arr_buttons['bpdf']['hint']  = $Nm_lang['lang_btns_pdfc_hint'];
  $this->arr_buttons['bpdf']['type']  = 'button';
  $this->arr_buttons['bpdf']['value'] = $Nm_lang['lang_btns_pdfc'];
  $this->arr_buttons['bpdf']['style'] = 'default';
  $this->arr_buttons['bpdf']['image'] = '';

  $this->arr_buttons['brtf']['hint']  = $Nm_lang['lang_btns_rtff_hint'];
  $this->arr_buttons['brtf']['type']  = 'button';
  $this->arr_buttons['brtf']['value'] = $Nm_lang['lang_btns_rtff'];
  $this->arr_buttons['brtf']['style'] = 'default';
  $this->arr_buttons['brtf']['image'] = '';

  $this->arr_buttons['bexcel']['hint']  = $Nm_lang['lang_btns_xlsf_hint'];
  $this->arr_buttons['bexcel']['type']  = 'button';
  $this->arr_buttons['bexcel']['value'] = $Nm_lang['lang_btns_xlsf'];
  $this->arr_buttons['bexcel']['style'] = 'default';
  $this->arr_buttons['bexcel']['image'] = '';

  $this->arr_buttons['bxml']['hint']  = $Nm_lang['lang_btns_xmlf_hint'];
  $this->arr_buttons['bxml']['type']  = 'button';
  $this->arr_buttons['bxml']['value'] = $Nm_lang['lang_btns_xmlf'];
  $this->arr_buttons['bxml']['style'] = 'default';
  $this->arr_buttons['bxml']['image'] = '';

  $this->arr_buttons['bcsv']['hint']  = $Nm_lang['lang_btns_csvf_hint'];
  $this->arr_buttons['bcsv']['type']  = 'button';
  $this->arr_buttons['bcsv']['value'] = $Nm_lang['lang_btns_csvf'];
  $this->arr_buttons['bcsv']['style'] = 'default';
  $this->arr_buttons['bcsv']['image'] = '';

  $this->arr_buttons['bexport']['hint']  = $Nm_lang['lang_btns_expo_hint'];
  $this->arr_buttons['bexport']['type']  = 'button';
  $this->arr_buttons['bexport']['value'] = $Nm_lang['lang_btns_expo'];
  $this->arr_buttons['bexport']['style'] = 'default';
  $this->arr_buttons['bexport']['image'] = '';

  $this->arr_buttons['bexportview']['hint']  = $Nm_lang['lang_btns_expv_hint'];
  $this->arr_buttons['bexportview']['type']  = 'button';
  $this->arr_buttons['bexportview']['value'] = $Nm_lang['lang_btns_expv'];
  $this->arr_buttons['bexportview']['style'] = 'default';
  $this->arr_buttons['bexportview']['image'] = '';

  $this->arr_buttons['bdownload']['hint']  = $Nm_lang['lang_btns_down_hint'];
  $this->arr_buttons['bdownload']['type']  = 'button';
  $this->arr_buttons['bdownload']['value'] = $Nm_lang['lang_btns_down'];
  $this->arr_buttons['bdownload']['style'] = 'default';
  $this->arr_buttons['bdownload']['image'] = '';

  $this->arr_buttons['binicio']['hint']  = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['binicio']['type']  = 'button';
  $this->arr_buttons['binicio']['value'] = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['binicio']['style'] = 'default';
  $this->arr_buttons['binicio']['image'] = '';

  $this->arr_buttons['bretorna']['hint']  = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bretorna']['type']  = 'button';
  $this->arr_buttons['bretorna']['value'] = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bretorna']['style'] = 'default';
  $this->arr_buttons['bretorna']['image'] = '';

  $this->arr_buttons['bavanca']['hint']  = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bavanca']['type']  = 'button';
  $this->arr_buttons['bavanca']['value'] = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bavanca']['style'] = 'default';
  $this->arr_buttons['bavanca']['image'] = '';

  $this->arr_buttons['bfinal']['hint']  = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bfinal']['type']  = 'button';
  $this->arr_buttons['bfinal']['value'] = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bfinal']['style'] = 'default';
  $this->arr_buttons['bfinal']['image'] = '';

  $this->arr_buttons['bincluir']['hint']  = $Nm_lang['lang_btns_inst_hint'];
  $this->arr_buttons['bincluir']['type']  = 'button';
  $this->arr_buttons['bincluir']['value'] = $Nm_lang['lang_btns_inst'];
  $this->arr_buttons['bincluir']['style'] = 'default';
  $this->arr_buttons['bincluir']['image'] = '';

  $this->arr_buttons['bexcluir']['hint']  = $Nm_lang['lang_btns_dele_hint'];
  $this->arr_buttons['bexcluir']['type']  = 'button';
  $this->arr_buttons['bexcluir']['value'] = $Nm_lang['lang_btns_dele'];
  $this->arr_buttons['bexcluir']['style'] = 'default';
  $this->arr_buttons['bexcluir']['image'] = '';

  $this->arr_buttons['balterar']['hint']  = $Nm_lang['lang_btns_updt_hint'];
  $this->arr_buttons['balterar']['type']  = 'button';
  $this->arr_buttons['balterar']['value'] = $Nm_lang['lang_btns_updt'];
  $this->arr_buttons['balterar']['style'] = 'default';
  $this->arr_buttons['balterar']['image'] = '';

  $this->arr_buttons['bnovo']['hint']  = $Nm_lang['lang_btns_neww_hint'];
  $this->arr_buttons['bnovo']['type']  = 'button';
  $this->arr_buttons['bnovo']['value'] = $Nm_lang['lang_btns_neww'];
  $this->arr_buttons['bnovo']['style'] = 'default';
  $this->arr_buttons['bnovo']['image'] = '';

  $this->arr_buttons['bform_editar']['hint']  = $Nm_lang['lang_btns_pncl_hint'];
  $this->arr_buttons['bform_editar']['type']  = 'image';
  $this->arr_buttons['bform_editar']['value'] = $Nm_lang['lang_btns_pncl'];
  $this->arr_buttons['bform_editar']['style'] = '';
  $this->arr_buttons['bform_editar']['image'] = 'sys__NM__nm_botoeslogin_bform_editar.gif';

  $this->arr_buttons['bform_captura']['hint']  = $Nm_lang['lang_btns_rtrv_grid_hint'];
  $this->arr_buttons['bform_captura']['type']  = 'image';
  $this->arr_buttons['bform_captura']['value'] = $Nm_lang['lang_btns_rtrv_grid'];
  $this->arr_buttons['bform_captura']['style'] = '';
  $this->arr_buttons['bform_captura']['image'] = 'sys__NM__nm_botoeslogin_bform_captura.gif';

  $this->arr_buttons['bform_lookuplink']['hint']  = $Nm_lang['lang_btns_rtrv_form_hint'];
  $this->arr_buttons['bform_lookuplink']['type']  = 'image';
  $this->arr_buttons['bform_lookuplink']['value'] = $Nm_lang['lang_btns_rtrv_form'];
  $this->arr_buttons['bform_lookuplink']['style'] = '';
  $this->arr_buttons['bform_lookuplink']['image'] = 'sys__NM__nm_botoeslogin_bform_lookuplink.gif';

  $this->arr_buttons['bok']['hint']  = $Nm_lang['lang_btns_cfrm_hint'];
  $this->arr_buttons['bok']['type']  = 'image';
  $this->arr_buttons['bok']['value'] = $Nm_lang['lang_btns_cfrm'];
  $this->arr_buttons['bok']['style'] = '';
  $this->arr_buttons['bok']['image'] = 'sys__NM__nm_botoeslogin_bok.gif';

  $this->arr_buttons['bcalendario']['hint']  = $Nm_lang['lang_btns_cldr_hint'];
  $this->arr_buttons['bcalendario']['type']  = 'image';
  $this->arr_buttons['bcalendario']['value'] = $Nm_lang['lang_btns_cldr'];
  $this->arr_buttons['bcalendario']['style'] = '';
  $this->arr_buttons['bcalendario']['image'] = 'sys__NM__nm_botoeslogin_bcalendario.gif';

  $this->arr_buttons['bcalculadora']['hint']  = $Nm_lang['lang_btns_calc_hint'];
  $this->arr_buttons['bcalculadora']['type']  = 'image';
  $this->arr_buttons['bcalculadora']['value'] = $Nm_lang['lang_btns_calc'];
  $this->arr_buttons['bcalculadora']['style'] = '';
  $this->arr_buttons['bcalculadora']['image'] = 'sys__NM__nm_botoeslogin_bcalculadora.gif';

  $this->arr_buttons['bajaxcapt']['hint']  = $Nm_lang['lang_btns_ajax_hint'];
  $this->arr_buttons['bajaxcapt']['type']  = 'button';
  $this->arr_buttons['bajaxcapt']['value'] = $Nm_lang['lang_btns_ajax'];
  $this->arr_buttons['bajaxcapt']['style'] = 'default';
  $this->arr_buttons['bajaxcapt']['image'] = '';

  $this->arr_buttons['bajaxclose']['hint']  = $Nm_lang['lang_btns_ajax_close_hint'];
  $this->arr_buttons['bajaxclose']['type']  = 'button';
  $this->arr_buttons['bajaxclose']['value'] = $Nm_lang['lang_btns_ajax_close'];
  $this->arr_buttons['bajaxclose']['style'] = 'default';
  $this->arr_buttons['bajaxclose']['image'] = '';

  $this->arr_buttons['bcaptchareload']['hint']  = $Nm_lang['lang_btns_cptc_rfim_hint'];
  $this->arr_buttons['bcaptchareload']['type']  = 'button';
  $this->arr_buttons['bcaptchareload']['value'] = $Nm_lang['lang_btns_cptc_rfim'];
  $this->arr_buttons['bcaptchareload']['style'] = 'default';
  $this->arr_buttons['bcaptchareload']['image'] = '';

  $this->arr_buttons['bsrch_mtmf']['hint']  = $Nm_lang['lang_btns_srch_mtmf_hint'];
  $this->arr_buttons['bsrch_mtmf']['type']  = 'button';
  $this->arr_buttons['bsrch_mtmf']['value'] = $Nm_lang['lang_btns_srch_mtmf'];
  $this->arr_buttons['bsrch_mtmf']['style'] = 'default';
  $this->arr_buttons['bsrch_mtmf']['image'] = '';

  $this->arr_buttons['binicio_off']['hint']  = $Nm_lang['lang_btns_frst_hint'];
  $this->arr_buttons['binicio_off']['type']  = 'button';
  $this->arr_buttons['binicio_off']['value'] = $Nm_lang['lang_btns_frst'];
  $this->arr_buttons['binicio_off']['style'] = 'disabled';
  $this->arr_buttons['binicio_off']['image'] = '';

  $this->arr_buttons['bretorna_off']['hint']  = $Nm_lang['lang_btns_prev_hint'];
  $this->arr_buttons['bretorna_off']['type']  = 'button';
  $this->arr_buttons['bretorna_off']['value'] = $Nm_lang['lang_btns_prev'];
  $this->arr_buttons['bretorna_off']['style'] = 'disabled';
  $this->arr_buttons['bretorna_off']['image'] = '';

  $this->arr_buttons['bavanca_off']['hint']  = $Nm_lang['lang_btns_next_hint'];
  $this->arr_buttons['bavanca_off']['type']  = 'button';
  $this->arr_buttons['bavanca_off']['value'] = $Nm_lang['lang_btns_next'];
  $this->arr_buttons['bavanca_off']['style'] = 'disabled';
  $this->arr_buttons['bavanca_off']['image'] = '';

  $this->arr_buttons['bfinal_off']['hint']  = $Nm_lang['lang_btns_last_hint'];
  $this->arr_buttons['bfinal_off']['type']  = 'button';
  $this->arr_buttons['bfinal_off']['value'] = $Nm_lang['lang_btns_last'];
  $this->arr_buttons['bfinal_off']['style'] = 'disabled';
  $this->arr_buttons['bfinal_off']['image'] = '';

  $this->arr_buttons['bpesquisa']['hint']  = $Nm_lang['lang_btns_srch_hint'];
  $this->arr_buttons['bpesquisa']['type']  = 'button';
  $this->arr_buttons['bpesquisa']['value'] = $Nm_lang['lang_btns_srch'];
  $this->arr_buttons['bpesquisa']['style'] = 'default';
  $this->arr_buttons['bpesquisa']['image'] = '';

  $this->arr_buttons['blimpar']['hint']  = $Nm_lang['lang_btns_clea_hint'];
  $this->arr_buttons['blimpar']['type']  = 'button';
  $this->arr_buttons['blimpar']['value'] = $Nm_lang['lang_btns_clea'];
  $this->arr_buttons['blimpar']['style'] = 'default';
  $this->arr_buttons['blimpar']['image'] = '';

  $this->arr_buttons['bsalvar']['hint']  = $Nm_lang['lang_btns_save_hint'];
  $this->arr_buttons['bsalvar']['type']  = 'button';
  $this->arr_buttons['bsalvar']['value'] = $Nm_lang['lang_btns_save'];
  $this->arr_buttons['bsalvar']['style'] = 'default';
  $this->arr_buttons['bsalvar']['image'] = '';

  $this->arr_buttons['bedit_filter']['hint']  = $Nm_lang['lang_btns_srch_edit_hint'];
  $this->arr_buttons['bedit_filter']['type']  = 'button';
  $this->arr_buttons['bedit_filter']['value'] = $Nm_lang['lang_btns_srch_edit'];
  $this->arr_buttons['bedit_filter']['style'] = 'default';
  $this->arr_buttons['bedit_filter']['image'] = '';

  $this->arr_buttons['bquick_search']['hint']  = $Nm_lang['lang_btns_quck_srch_hint'];
  $this->arr_buttons['bquick_search']['type']  = 'button';
  $this->arr_buttons['bquick_search']['value'] = $Nm_lang['lang_btns_quck_srch'];
  $this->arr_buttons['bquick_search']['style'] = 'default';
  $this->arr_buttons['bquick_search']['image'] = '';

  $this->arr_buttons['bmd_incluir']['hint']  = $Nm_lang['lang_btns_mdtl_inst_hint'];
  $this->arr_buttons['bmd_incluir']['type']  = 'image';
  $this->arr_buttons['bmd_incluir']['value'] = $Nm_lang['lang_btns_mdtl_inst'];
  $this->arr_buttons['bmd_incluir']['style'] = '';
  $this->arr_buttons['bmd_incluir']['image'] = 'sys__NM__nm_botoeslogin_bmd_incluir.gif';

  $this->arr_buttons['bmd_excluir']['hint']  = $Nm_lang['lang_btns_mdtl_dele_hint'];
  $this->arr_buttons['bmd_excluir']['type']  = 'image';
  $this->arr_buttons['bmd_excluir']['value'] = $Nm_lang['lang_btns_mdtl_dele'];
  $this->arr_buttons['bmd_excluir']['style'] = '';
  $this->arr_buttons['bmd_excluir']['image'] = 'sys__NM__nm_botoeslogin_bmd_excluir.gif';

  $this->arr_buttons['bmd_alterar']['hint']  = $Nm_lang['lang_btns_mdtl_updt_hint'];
  $this->arr_buttons['bmd_alterar']['type']  = 'image';
  $this->arr_buttons['bmd_alterar']['value'] = $Nm_lang['lang_btns_mdtl_updt'];
  $this->arr_buttons['bmd_alterar']['style'] = '';
  $this->arr_buttons['bmd_alterar']['image'] = 'sys__NM__nm_botoeslogin_bmd_alterar.gif';

  $this->arr_buttons['bmd_novo']['hint']  = $Nm_lang['lang_btns_mdtl_neww_hint'];
  $this->arr_buttons['bmd_novo']['type']  = 'image';
  $this->arr_buttons['bmd_novo']['value'] = $Nm_lang['lang_btns_mdtl_neww'];
  $this->arr_buttons['bmd_novo']['style'] = '';
  $this->arr_buttons['bmd_novo']['image'] = 'sys__NM__nm_botoeslogin_bmd_novo.gif';

  $this->arr_buttons['bmd_cancelar']['hint']  = $Nm_lang['lang_btns_mdtl_cncl_hint'];
  $this->arr_buttons['bmd_cancelar']['type']  = 'image';
  $this->arr_buttons['bmd_cancelar']['value'] = $Nm_lang['lang_btns_mdtl_cncl'];
  $this->arr_buttons['bmd_cancelar']['style'] = '';
  $this->arr_buttons['bmd_cancelar']['image'] = 'sys__NM__nm_botoeslogin_bmd_cancelar.gif';

  $this->arr_buttons['bmd_edit']['hint']  = $Nm_lang['lang_btns_mdtl_edit_hint'];
  $this->arr_buttons['bmd_edit']['type']  = 'image';
  $this->arr_buttons['bmd_edit']['value'] = $Nm_lang['lang_btns_mdtl_edit'];
  $this->arr_buttons['bmd_edit']['style'] = '';
  $this->arr_buttons['bmd_edit']['image'] = 'sys__NM__nm_botoeslogin_bmd_edit.gif';

  $this->arr_buttons['bhelp']['hint']  = $Nm_lang['lang_btns_help_hint'];
  $this->arr_buttons['bhelp']['type']  = 'button';
  $this->arr_buttons['bhelp']['value'] = $Nm_lang['lang_btns_help'];
  $this->arr_buttons['bhelp']['style'] = 'default';
  $this->arr_buttons['bhelp']['image'] = '';

  $this->arr_buttons['bsair']['hint']  = $Nm_lang['lang_btns_exit_hint'];
  $this->arr_buttons['bsair']['type']  = 'button';
  $this->arr_buttons['bsair']['value'] = $Nm_lang['lang_btns_exit'];
  $this->arr_buttons['bsair']['style'] = 'default';
  $this->arr_buttons['bsair']['image'] = '';

  $this->arr_buttons['bvoltar']['hint']  = $Nm_lang['lang_btns_back_hint'];
  $this->arr_buttons['bvoltar']['type']  = 'button';
  $this->arr_buttons['bvoltar']['value'] = $Nm_lang['lang_btns_back'];
  $this->arr_buttons['bvoltar']['style'] = 'default';
  $this->arr_buttons['bvoltar']['image'] = '';

  $this->arr_buttons['bcancelar']['hint']  = $Nm_lang['lang_btns_cncl_hint'];
  $this->arr_buttons['bcancelar']['type']  = 'button';
  $this->arr_buttons['bcancelar']['value'] = $Nm_lang['lang_btns_cncl'];
  $this->arr_buttons['bcancelar']['style'] = 'default';
  $this->arr_buttons['bcancelar']['image'] = '';

  $this->arr_buttons['bzipcode']['hint']  = $Nm_lang['lang_btns_zpcd_hint'];
  $this->arr_buttons['bzipcode']['type']  = 'image';
  $this->arr_buttons['bzipcode']['value'] = $Nm_lang['lang_btns_zpcd'];
  $this->arr_buttons['bzipcode']['style'] = '';
  $this->arr_buttons['bzipcode']['image'] = 'sys__NM__nm_botoeslogin_bzipcode.gif';

  $this->arr_buttons['blink']['hint']  = $Nm_lang['lang_btns_iurl_hint'];
  $this->arr_buttons['blink']['type']  = 'image';
  $this->arr_buttons['blink']['value'] = $Nm_lang['lang_btns_iurl'];
  $this->arr_buttons['blink']['style'] = '';
  $this->arr_buttons['blink']['image'] = 'sys__NM__nm_botoeslogin_blink.gif';

  $this->arr_buttons['blanguage']['hint']  = $Nm_lang['lang_btns_lang_hint'];
  $this->arr_buttons['blanguage']['type']  = 'button';
  $this->arr_buttons['blanguage']['value'] = $Nm_lang['lang_btns_lang'];
  $this->arr_buttons['blanguage']['style'] = 'default';
  $this->arr_buttons['blanguage']['image'] = '';

  $this->arr_buttons['bfieldhelp']['hint']  = $Nm_lang['lang_btns_hlpf_hint'];
  $this->arr_buttons['bfieldhelp']['type']  = 'image';
  $this->arr_buttons['bfieldhelp']['value'] = $Nm_lang['lang_btns_hlpf'];
  $this->arr_buttons['bfieldhelp']['style'] = '';
  $this->arr_buttons['bfieldhelp']['image'] = 'sys__NM__nm_botoeslogin_bfieldhelp.gif';

  $this->arr_buttons['bsrgb']['hint']  = $Nm_lang['lang_btns_srgb_hint'];
  $this->arr_buttons['bsrgb']['type']  = 'button';
  $this->arr_buttons['bsrgb']['value'] = $Nm_lang['lang_btns_srgb'];
  $this->arr_buttons['bsrgb']['style'] = 'default';
  $this->arr_buttons['bsrgb']['image'] = '';

  $this->arr_buttons['berrm_clse']['hint']  = $Nm_lang['lang_btns_errm_clse_hint'];
  $this->arr_buttons['berrm_clse']['type']  = 'button';
  $this->arr_buttons['berrm_clse']['value'] = $Nm_lang['lang_btns_errm_clse'];
  $this->arr_buttons['berrm_clse']['style'] = 'default';
  $this->arr_buttons['berrm_clse']['image'] = '';

  $this->arr_buttons['bemail']['hint']  = $Nm_lang['lang_btns_emai_hint'];
  $this->arr_buttons['bemail']['type']  = 'image';
  $this->arr_buttons['bemail']['value'] = $Nm_lang['lang_btns_emai'];
  $this->arr_buttons['bemail']['style'] = '';
  $this->arr_buttons['bemail']['image'] = 'sys__NM__nm_botoeslogin_bemail.gif';

  $this->arr_buttons['bcapture']['hint']  = $Nm_lang['lang_btns_pick_hint'];
  $this->arr_buttons['bcapture']['type']  = 'button';
  $this->arr_buttons['bcapture']['value'] = $Nm_lang['lang_btns_pick'];
  $this->arr_buttons['bcapture']['style'] = 'default';
  $this->arr_buttons['bcapture']['image'] = '';

  $this->arr_buttons['bmessageclose']['hint']  = $Nm_lang['lang_btns_mess_clse_hint'];
  $this->arr_buttons['bmessageclose']['type']  = 'button';
  $this->arr_buttons['bmessageclose']['value'] = $Nm_lang['lang_btns_mess_clse'];
  $this->arr_buttons['bmessageclose']['style'] = 'default';
  $this->arr_buttons['bmessageclose']['image'] = '';

  $this->arr_buttons['bgooglemaps']['hint']  = $Nm_lang['lang_btns_maps_hint'];
  $this->arr_buttons['bgooglemaps']['type']  = 'image';
  $this->arr_buttons['bgooglemaps']['value'] = $Nm_lang['lang_btns_maps'];
  $this->arr_buttons['bgooglemaps']['style'] = '';
  $this->arr_buttons['bgooglemaps']['image'] = 'sys__NM__nm_botoeslogin_bgooglemaps.gif';

  $this->arr_buttons['byoutube']['hint']  = $Nm_lang['lang_btns_yutb_hint'];
  $this->arr_buttons['byoutube']['type']  = 'image';
  $this->arr_buttons['byoutube']['value'] = $Nm_lang['lang_btns_yutb'];
  $this->arr_buttons['byoutube']['style'] = '';
  $this->arr_buttons['byoutube']['image'] = 'sys__NM__nm_botoeslogin_byoutube.gif';

?>