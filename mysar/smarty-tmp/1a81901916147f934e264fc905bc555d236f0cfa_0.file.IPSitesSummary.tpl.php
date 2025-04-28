<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 06:15:51
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/IPSitesSummary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f47473d5178_10064215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a81901916147f934e264fc905bc555d236f0cfa' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/IPSitesSummary.tpl',
      1 => 1745831707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f47473d5178_10064215 (Smarty_Internal_Template $_smarty_tpl) {
?><center>
<nobr>[
<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
"><<< Voltar para "estações e usuários de um dia específico"</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de uma Estação, Usuário e Data</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['previousWeekID'] != '') {?>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeek'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeekID'];?>
"><<</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['previousDateID'] != '') {?>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDate'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDateID'];?>
"><</a>
                <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>

                <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['nextDateID'] != '') {?>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDate'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDateID'];?>
">></a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['nextWeekID'] != '') {?>
                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeek'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeekID'];?>
">>></a>
                <?php }?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersID'];?>
">[ Ir para o dia de Hoje ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th colspan="2">Informações da Estação</th>
        </tr>
        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="action" value="hostDescriptionUpdate">
        <tr>
            <td style="width: 30%; text-align: left;">Nome</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['hostname'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Endereço IP</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['hostname'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Descrição</td>
            <td style="width: 70%; text-align: left;"><input type="text" name="thisValue" value="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['description'];?>
"></td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Nome Usuário</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['user']['authuser'];?>
</td>
        </tr>
        </form>
    </table>
</div>

<p>
    [
    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&action=setDefaultView&OrderMethod=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderMethod'];?>
&OrderBy=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderBy'];?>
&ByteUnit=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
">
        Manter esta visualização como padrão
    </a>
    ]
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 55%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['siteASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
SITE<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['siteDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['siteDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRÁFEGO</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 55%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
BYTES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
                <br>
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['B'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['BLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
B<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['BLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['K'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['KLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
K<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['KLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['M'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['MLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
M<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['MLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>
</a>
                |
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['G'])===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelStart'])===null||$tmp==='' ? '0' : $tmp);?>
G<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelEnd'])===null||$tmp==='' ? '0' : $tmp);?>
</a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
USO DO CACHE<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        <?php $_smarty_tpl->_assignInScope('recordCount', "0");?>
        <?php $_smarty_tpl->_assignInScope('bytesTotal', "0");?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['summaryIPSites'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
        <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
            <td style="width: 15%; text-align: center;"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=details&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&sitesID=<?php echo $_smarty_tpl->tpl_vars['record']->value['sitesID'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersID'];?>
"><b>Detalhes</b></a></td>
            <td style="width: 55%; text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
</a></td>
            <td style="width: 15%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
            <td style="width: 15%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['cachePercent'];?>
%</td>
        </tr>
        <?php $_smarty_tpl->_assignInScope('recordCount', $_smarty_tpl->tpl_vars['recordCount']->value+1);?>
        <?php $_smarty_tpl->_assignInScope('bytesTotal', $_smarty_tpl->tpl_vars['bytesTotal']->value+$_smarty_tpl->tpl_vars['record']->value['bytes']);?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr><td colspan="4"></td></tr>
        <tr>
            <th style="width: 15%; text-align: center;">TOTAIS</th>
            <th style="width: 55%; text-align: right;"><?php echo $_smarty_tpl->tpl_vars['recordCount']->value;?>
</th>
            <th style="width: 15%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['bytesTotal']->value,$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>

<div class="table-responsive" style="margin-top: 2rem;">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th colspan="6">Últimas Atividades do Usuário</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;">IP ESTAÇÃO</th>
            <th style="width: 20%; text-align: center;">USUÁRIO</th>
            <th style="width: 15%; text-align: center;">HORA</th>
            <th style="width: 10%; text-align: center;">BYTES</th>
            <th style="width: 30%; text-align: center;">URL</th>
            <th style="width: 10%; text-align: center;">STATUS</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['latestUserActivity'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['record']->value['hostdescription'] != '') {?>
                <?php $_smarty_tpl->_assignInScope('thisRecord', $_smarty_tpl->tpl_vars['record']->value['hostdescription']);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['record']->value['hostip'] != $_smarty_tpl->tpl_vars['record']->value['hostname']) {?>
                <?php $_smarty_tpl->_assignInScope('thisRecord', $_smarty_tpl->tpl_vars['record']->value['hostname']);?>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('thisRecord', $_smarty_tpl->tpl_vars['record']->value['hostip']);?>
            <?php }?>
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: left;"><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['thisRecord']->value;?>
</a></td>
                <td style="width: 20%; text-align: left;"><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['username'];?>
</a></td>
                <td style="width: 15%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['time'];?>
</td>
                <td style="width: 10%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
                <td style="width: 30%; text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
" target="_blank"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['url'],80,"...");?>
</a></td>
                <td style="width: 10%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['record']->value['resultCode'];?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>
</center>
<?php }
}
