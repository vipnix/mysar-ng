<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:45:40
  from '/var/www/html/mysar/www-templates.pt_BR/allsites.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee85c84846917_26907546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01a56a79cae9b1e27333995cda42390af9a3e258' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/allsites.tpl',
      1 => 1589572034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee85c84846917_26907546 (Smarty_Internal_Template $_smarty_tpl) {
?><nobr>[
<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
">&lt;&lt;&lt; Voltar para Esta&ccedil;&otilde;es e Usu&aacute;rios de um dia Espec&iacute;fico</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta p&aacute;gina</a>
]</nobr>

<div class="table-responsive"><table class="table table-condensed"><tr><th style="font-size: 20px";>Relat&oacute;rio de Sites de um dia Espec&iacute;fico</th></tr></table></div>
<p>
<div class="table-responsive"><table class="table table-condensed">
  <tr><td style="font-size: 20px;">
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeek'];?>
">&lt;&lt;</a>
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDate'];?>
">&lt;</a>
  <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>

  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDate'];?>
">&gt;</a>
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeek'];?>
">&gt;&gt;</a>
  </td></tr>
  <tr><td style="text-align:center;">
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
">[ Ir para o dia de Hoje ]</a>
  </td></tr>
  </table></div>
  <p>
      [
        <a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
&action=setDefaultView">
          Manter esta visualiza&ccedil;&atilde;o como padr&atilde;o
        </a>
      ]
  <div class="table-responsive"><table class="table table-condensed">
    <tr>
      <th></th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['siteASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['siteASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['siteLabelStart'];?>
SITE<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['siteLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['siteDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['siteDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['usersASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersLabelStart'];?>
USU&Aacute;RIOS<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['usersDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelStart'];?>
ESTA&Ccedil;&Otilde;ES<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['hostsDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostsDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelStart'];?>
BYTES<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['bytesDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['bytesDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
        <br>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['B'];?>
"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['BLabelStart'];?>
B<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['BLabelEnd'];?>
</a>
        |
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['K'];?>
"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['KLabelStart'];?>
K<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['KLabelEnd'];?>
</a>
        |
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['M'];?>
"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['MLabelStart'];?>
M<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['MLabelEnd'];?>
</a>
        |
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['G'];?>
"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['GLabelStart'];?>
G<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['GLabelEnd'];?>
</a>

      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelStart'];?>
USO DO CACHE<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['cachePercentDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['cachePercentDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
    </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['allSites'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
  <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
    <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=siteusers&sitesID=<?php echo $_smarty_tpl->tpl_vars['record']->value['sitesID'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
"><b>Detalhes</b></a></td>
    <td style="text-align: left"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
" target="_blank"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['site'],80,"...");?>
</a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['users'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['hosts'];?>
</td>
    <td><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['byteUnit']);?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['cachePercent'];?>
%</td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table></div>
<?php }
}
