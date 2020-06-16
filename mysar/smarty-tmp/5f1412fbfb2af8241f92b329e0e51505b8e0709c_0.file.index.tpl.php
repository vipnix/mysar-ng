<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:05:41
  from '/var/www/html/mysar/www-templates.pt_BR/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee85325c1a912_73098660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f1412fbfb2af8241f92b329e0e51505b8e0709c' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/index.tpl',
      1 => 1589572034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee85325c1a912_73098660 (Smarty_Internal_Template $_smarty_tpl) {
?><nobr>[
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta p&aacute;gina</a>
]</nobr>

      <div class="table-responsive"><table class="table table-condensed"><tr><th style="font-size: 20px";>Relat&oacute;rio de Acesso por dia</th></tr></table></div>
      <p>
      [
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisPage'];?>
&action=setDefaultView&OrderMethod=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderMethod'];?>
&OrderBy=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['OrderBy'];?>
&ByteUnit=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit'];?>
">
          Manter esta visualiza&ccedil;&atilde;o como padr&atilde;o
        </a>
      ]
      <br>
      <table cellpadding=1 cellspacing=1>
        <tr>
          <th rowspan="2">
            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['dateASC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateASCImageBorder'];?>
" src="images/up-arrow.gif"></a>
              <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateLabelStart'];?>
DATA<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateLabelEnd'];?>

            <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['url']['dateDESC'];?>
"><img border="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['dateDESCImageBorder'];?>
" src="images/down-arrow.gif"></a>
          </th>
          <th rowspan="2">
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
          <th rowspan="2">
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
          <th rowspan="2">
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
          <th colspan="2">TR&Aacute;FEGO</th>
        </tr>
        <tr>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['availableDates'], 'date');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value) {
?>
        <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
          <td style="text-align: left;"><a href='<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSummary&date=<?php echo $_smarty_tpl->tpl_vars['date']->value['date'];?>
'><?php echo $_smarty_tpl->tpl_vars['date']->value['dateFormatted'];?>
</a></td>
          <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['users'];?>
</font></td>
          <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['hosts'];?>
</font></td>
          <td style="text-align: center;"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=allsites&date=<?php echo $_smarty_tpl->tpl_vars['date']->value['date'];?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value['sites'];?>
</a></font></td>
          <td style="text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['date']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
          <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['date']->value['cachePercent'];?>
%</td>
        </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table></div>
<?php }
}
