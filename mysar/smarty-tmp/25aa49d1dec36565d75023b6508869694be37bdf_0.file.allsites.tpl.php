<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 06:45:44
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/allsites.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f4e48685237_81963750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25aa49d1dec36565d75023b6508869694be37bdf' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/allsites.tpl',
      1 => 1745833374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f4e48685237_81963750 (Smarty_Internal_Template $_smarty_tpl) {
?><center>
<nobr>[
<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
"><<< Voltar para Estações e Usuários de um dia Específico</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de Sites de um dia Específico</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeek'];?>
" title="Voltar 1 Semana"><<</a>
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDate'];?>
" title="Voltar 1 Dia"><</a>
                <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDate'];?>
" title="Avançar 1 Dia">></a>
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeek'];?>
" title="Avançar 1 Semana">>></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
" title="Dia de Hoje">[ Ir para o dia de Hoje ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
<center>
    [
    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&action=setDefaultView&OrderMethod=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderMethod'];?>
&OrderBy=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderBy'];?>
&ByteUnit=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
">
        Manter esta visualização como padrão
    </a>
    ]
</center>
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['siteASC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
SITE<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['siteDESC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['usersASC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
USUÁRIOS<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['usersDESC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsASC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
ESTAÇÕES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsDESC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRÁFEGO</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesASC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
BYTES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesDESC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
                <br>
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['B'])===null||$tmp==='' ? '0' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['BLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
B<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['BLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['K'])===null||$tmp==='' ? '0' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['KLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
K<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['KLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['M'])===null||$tmp==='' ? '0' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['MLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
M<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['MLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['G'])===null||$tmp==='' ? '0' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
G<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>
</a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentASC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
USO DO CACHE<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentDESC'])===null||$tmp==='' ? '0' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('bytesTotal', "0");?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['allSites'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: center;"><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=siteusers&sitesID=<?php echo $_smarty_tpl->tpl_vars['record']->value['sitesID'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
'><b>Detalhes</b></a></td>
                <td style="width: 35%; text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
" target="_blank"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['site'],80,"...");?>
</a></td>
                <td style="width: 15%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['users'];?>
</td>
                <td style="width: 15%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['hosts'];?>
</td>
                <td style="width: 15%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
                <td style="width: 15%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['cachePercent'];?>
%</td>
            </tr>
            <?php $_smarty_tpl->_assignInScope('bytesTotal', $_smarty_tpl->tpl_vars['bytesTotal']->value+$_smarty_tpl->tpl_vars['record']->value['bytes']);?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr><td colspan="6"></td></tr>
        <tr>
            <th style="width: 15%; text-align: center;">TOTAIS</th>
            <th style="width: 35%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['bytesTotal']->value,$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>
</center>
<?php }
}
