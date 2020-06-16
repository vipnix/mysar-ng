<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:45:25
  from '/var/www/html/mysar/www-templates.pt_BR/IPSitesSummary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee85c75919b59_31423031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '317ed3cb66fe97564c2230c3bdf7b94498a91bb5' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/IPSitesSummary.tpl',
      1 => 1589572034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee85c75919b59_31423031 (Smarty_Internal_Template $_smarty_tpl) {
?><nobr>[
<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
">&lt;&lt;&lt; Voltar para "Estacoes e usuarios de um dia especifico"</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta p&aacute;gina</a>
]</nobr>

<div class="table-responsive"><table class="table table-condensed"><tr><th style="font-size: 20px";>Relat&oacute;rio de uma Esta&ccedil;&atilde;o, Usu&aacute;rio e Data</th></tr></table></div>
<p>
<div class="table-responsive"><table class="table table-condensed">
  <tr><td style="font-size: 20px;">
    <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['previousWeekID'] != '') {?>
      <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeek'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeekID'];?>
">&lt;&lt;</a>
	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['previousDateID'] != '') {?>
      <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDate'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDateID'];?>
">&lt;</a>
	<?php }?>
    <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>

    <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['nextDateID'] != '') {?>
      <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDate'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDateID'];?>
">&gt;</a>
	<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['pageVars']->value['nextWeekID'] != '') {?>
      <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeek'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeekID'];?>
">&gt;&gt;</a>
	<?php }?>
  </td></tr>
  <tr><td style="text-align:center;">
    <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersID'];?>
">[ Ir para o dia de Hoje ]</a>
  </td></tr>
</table></div>
<p>
<div class="table-responsive"><table class="table table-condensed">
  <tr><th colspan="2">Informa&ccedil;&otilde;es da Esta&ccedil;&atilde;o</th></tr>
  <form method="POST">
  <input type="hidden" name="hiddenSubmit" value="1">
  <input type="hidden" name="action" value="hostDescriptionUpdate">
  <tr><td>Nome</td><td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['hostname'];?>
</td></tr>
  <tr><td>Endere&ccedil;o IP</td><td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['ip'];?>
</td></tr>
  <tr><td>Descri&ccedil;&atilde;o</td><td style="text-align:left;"><input type="text" name="thisValue" value="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['description'];?>
"</td></tr>
  <tr><td>Nome Usu&aacute;rio</td><td style="text-align:left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['user']['authuser'];?>
</tr>
  </form>
</table></div>
<p>
      [
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&action=setDefaultView&OrderMethod=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['orderMethod'];?>
&OrderBy=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['orderBy'];?>
&ByteUnit=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['byteUnit'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
">
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
      <th width="110">
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
  <?php $_smarty_tpl->_assignInScope('recordCount', "0");?>
  <?php $_smarty_tpl->_assignInScope('bytesTotal', "0");?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['summaryIPSites'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
  <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
    <td style="text-align: center;"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=details&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&sitesID=<?php echo $_smarty_tpl->tpl_vars['record']->value['sitesID'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersID'];?>
"><b>Detalhes</b></td>
    <td style="text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['record']->value['site'];?>
</a></td>
    <td><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['byteUnit']);?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['record']->value['cachePercent'];?>
%</td>
  </tr>
  <?php $_smarty_tpl->_assignInScope('recordCount', $_smarty_tpl->tpl_vars['recordCount']->value+1);?>
  <?php $_smarty_tpl->_assignInScope('bytesTotal', $_smarty_tpl->tpl_vars['bytesTotal']->value+$_smarty_tpl->tpl_vars['record']->value['bytes']);?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <tr>
      <th>TOTAIS</th>
      <th style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['recordCount']->value;?>
</th>
      <th style="text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['bytesTotal']->value,$_smarty_tpl->tpl_vars['pageVars']->value['byteUnit']);?>
</th>
      <th></th>
    </tr>
  </table></div>
  <p>
    <div class="table-responsive"><table class="table table-condensed">
    <tr><th colspan="7">&Uacute;ltimas Atividades do Usu&aacute;rio</th></td>
    <tr>
      <th>HORA</th>
      <th>BYTES</th>
      <th>URL</th>
      <th>STATUS</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['latestUserActivity'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
    <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
      <td><?php echo $_smarty_tpl->tpl_vars['record']->value['time'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['record']->value['bytes'];?>
</td>
      <td style="text-align: left"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['url'],80,"...");?>
</a></td>
      <td style="text-align: left"><?php echo $_smarty_tpl->tpl_vars['record']->value['resultCode'];?>
</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table></div>

<?php }
}
