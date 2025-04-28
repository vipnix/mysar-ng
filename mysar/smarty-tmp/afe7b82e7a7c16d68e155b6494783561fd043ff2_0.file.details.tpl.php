<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 06:17:14
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f479a17ae99_65946509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afe7b82e7a7c16d68e155b6494783561fd043ff2' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/details.tpl',
      1 => 1745831821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f479a17ae99_65946509 (Smarty_Internal_Template $_smarty_tpl) {
?><center>
<nobr>[
<a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=IPSitesSummary&date=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['date'];?>
&hostiplong=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['hostiplong'];?>
&usersID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['usersID'];?>
"><<< Voltar para "Relatório de uma Estação e data Específica"</a>
|
<a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['uri'];?>
">Atualizar esta Página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Detalhes de Estação, Usuário, Data e Site</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['thisDateFormatted'];?>
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
        <tr>
            <td style="width: 30%; text-align: left;">Estação</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['hostname'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">IP Estação</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['ip'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Descrição da Estação</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['host']['description'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Nome de Usuário</td>
            <td style="width: 70%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['user']['authuser'];?>
</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Site</td>
            <td style="width: 70%; text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['site'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['site'];?>
</a></td>
        </tr>
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
&ipID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['ipID'];?>
&siteID=<?php echo $_smarty_tpl->tpl_vars['pageVars']->value['siteID'];?>
">
        Manter esta visualização como padrão
    </a>
    ]
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 20%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['timeASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['timeASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['timeLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
HORA<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['timeLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['timeDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['timeDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
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
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
G<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['GLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>
</a>
            </th>
            <th style="width: 45%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['urlASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['urlASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['urlLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
URL<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['urlLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['urlDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['urlDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 20%; text-align: center;">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['statusASC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['statusASCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/up-arrow.gif" class="img-with-border">
                </a>
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['statusLabelStart'])===null||$tmp==='' ? '' : $tmp);?>
STATUS<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['statusLabelEnd'])===null||$tmp==='' ? '' : $tmp);?>

                <a href="<?php echo $_SERVER['PHP_SELF'];?>
?<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['url']['statusDESC'])===null||$tmp==='' ? '' : $tmp);?>
">
                    <img border="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageVars']->value['statusDESCImageBorder'])===null||$tmp==='' ? '0' : $tmp);?>
" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageVars']->value['siteDetails'], 'record');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
?>
        <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
            <td style="width: 20%; text-align: center;"><?php echo $_smarty_tpl->tpl_vars['record']->value['time'];?>
</td>
            <td style="width: 15%; text-align: right;"><?php echo bytesToHRF($_smarty_tpl->tpl_vars['record']->value['bytes'],$_smarty_tpl->tpl_vars['pageVars']->value['ByteUnit']);?>
</td>
            <td style="width: 45%; text-align: left;"><a href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
" target="_blank"><?php echo string_trim($_smarty_tpl->tpl_vars['record']->value['url'],80,"...");?>
</a></td>
            <td style="width: 20%; text-align: left;"><?php echo $_smarty_tpl->tpl_vars['record']->value['resultCode'];?>
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
