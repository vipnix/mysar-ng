<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:09:36
  from '/var/www/html/mysar/www-templates.pt_BR/IPSummary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee85410795527_54323818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29ebfb2db1f72272f15657fa892f1f2127534029' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/IPSummary.tpl',
      1 => 1592284172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee85410795527_54323818 (Smarty_Internal_Template $_smarty_tpl) {
?><nobr>[
<a href=".">&lt;&lt;&lt; Voltar para Relat&oacute;rio Di&aacute;rio</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta p&aacute;gina</a>
]</nobr>

<div class="table-responsive"><table class="table table-condensed"><tr><th style="font-size: 20px;">Relat&oacute;rio de Esta&ccedil;&otilde;es e Usu&aacute;rios de Um dia</th></tr></table></div>
<p>
<p>
<div class="table-responsive"><table class="table table-condensed">
  <tr><td style="font-size: 20px;">
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousWeek'];?>
" title="Voltar 1 Semana">&lt;&lt;</a>
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['previousDate'];?>
" title="Voltar 1 Dia">&lt;</a>
  <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>

  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextDate'];?>
" title="Avancar 1 Dia">&gt;</a>
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['nextWeek'];?>
" title="Avancar 1 Semana">&gt;&gt;</a>
  </td></tr>
  <tr><td style="text-align:center;">
  <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['today'];?>
" title="Dia de Hoje">[ Ir para o dia de Hoje ]</a>
  </td></tr>
  </table></div>
<p>
[ <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
" title="Lista de sites que foram acessados">Visualizar TODOS os sites acessados Neste dia</a> ]

<center>
      [
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&action=setDefaultView&OrderMethod=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderMethod'];?>
&OrderBy=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderBy'];?>
&ByteUnit=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit'];?>
&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
">
          Manter esta visualiza&ccedil;&atilde;o como padr&atilde;o
        </a>
      ]
  <div class="table-responsive"><table class="table table-condensed">
    <tr>
      <th></th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['hostipASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostipASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostipLabelStart'];?>
ESTA&Ccedil;&Otilde;ES<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostipLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['hostipDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostipDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['usernameASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usernameASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usernameLabelStart'];?>
USU&Aacute;RIOS<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usernameLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['usernameDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usernameDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['sitesASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
          <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesLabelStart'];?>
SITES<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesLabelEnd'];?>

        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['sitesDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['sitesDESCImageBorder'];?>
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
    <?php $_smarty_tpl->_assignInScope('bytesTotal', "0");?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['summaryIPRecords'], 'record');
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
      <td></td>
      <td><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['thisRecord']->value;?>
</td>
      <td><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['username'];?>
</td>
      <td><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['sites'];?>
</td>
      <td><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['record']->value['cachePercent'];?>
%</td>
    </tr>
    <?php $_smarty_tpl->_assignInScope('bytesTotal', $_smarty_tpl->tpl_vars['bytesTotal']->value+$_smarty_tpl->tpl_vars['record']->value['bytes']);?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
      <th>TOTALS</th>
      <th style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['distinctValues']['ips'];?>
</th>
      <th style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['distinctValues']['users'];?>
</th>
      <th style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['distinctValues']['sites'];?>
</th>
      <th style="text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['bytesTotal']->value,$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</th>
      <th></th>
    </tr>
  </table></div>
  <p>
  <div class="table-responsive"><table class="table table-condensed">
    <tr><th colspan="7">&Uacute;ltimas Atividades do Usu&aacute;rio</th></td>
    <tr>
      <th>IP ESTA&Ccedil;&Atilde;O</th>
      <th>USU&Aacute;RIO</th>
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
      <td><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['hostip'];?>
</a></td>
      <td><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['record']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['record']->value['usersID'];?>
'><?php echo $_smarty_tpl->tpl_vars['record']->value['username'];?>
</a></td>
      <td><?php echo $_smarty_tpl->tpl_vars['record']->value['time'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['record']->value['bytes'];?>
</td>
      <td style="text-align: left"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
" target="_blank"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['url'],80,"...");?>
</a></td>
      <td style="text-align: left"><?php echo $_smarty_tpl->tpl_vars['record']->value['resultCode'];?>
</td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table></div>
</center>
<?php }
}
