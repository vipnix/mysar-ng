<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 06:33:13
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f4b591ce2d1_64758345',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a2053434f4cbeadac67d33204ef44189f840e7e' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/index.tpl',
      1 => 1745832107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f4b591ce2d1_64758345 (Smarty_Internal_Template $_smarty_tpl) {
?><center>
<nobr>[<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta página</a>]</nobr>
</center>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de acesso diário</th>
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
">
        Manter esta visualização como padrão
    </a>
    ]
</center>
<br>
<table cellpadding=1 cellspacing=1>
    <tr>
        <th rowspan="2">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['dateASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateLabelStart'];?>
DATA<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateLabelEnd'];?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['dateDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateDESCImageBorder'];?>
" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['usersASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
USUÁRIOS<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['usersLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['usersDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersDESCImageBorder'];?>
" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
ESTAÇÕES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsDESCImageBorder'];?>
" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['sitesASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['sitesLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
SITES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['sitesLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['sitesDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesDESCImageBorder'];?>
" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th colspan="2">TRÁFEGO</th>
    </tr>
    <tr>
        <th>
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
BYTES<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesDESCImageBorder'];?>
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
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
G<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>
</a>
        </th>
        <th>
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentASCImageBorder'];?>
" src="images/up-arrow.gif" class="img-with-border">
            </a>
            <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
USO DO CACHE<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                <img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentDESCImageBorder'];?>
" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['availableDates'], 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
    <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
        <td style="text-align: left;">
            <a href='<?php echo (($tmp = @$_SERVER['PHP_SELF'])===null||$tmp==='' ? '' : $tmp);?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['date']->value['date'];?>
'><?php echo $_smarty_tpl->tpl_vars['date']->value['dateFormatted'];?>
</a>
        </td>
        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['users'];?>
</font></td>
        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['hosts'];?>
</font></td>
        <td style="text-align: center;">
            <a href="<?php echo (($tmp = @$_SERVER['PHP_SELF'])===null||$tmp==='' ? '' : $tmp);?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['date']->value['date'];?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value['sites'];?>
</a>
        </td>
        <td style="text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['date']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
        <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['cachePercent'];?>
%</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
</div>
<?php }
}
