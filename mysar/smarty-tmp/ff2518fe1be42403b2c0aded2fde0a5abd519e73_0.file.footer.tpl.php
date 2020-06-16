<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:05:41
  from '/var/www/html/mysar/www-templates.pt_BR/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee85325c5d349_71353963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff2518fe1be42403b2c0aded2fde0a5abd519e73' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/footer.tpl',
      1 => 1589572034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee85325c5d349_71353963 (Smarty_Internal_Template $_smarty_tpl) {
?>      <p>
      <div class="table-responsive"><table class="table table-condensed">
       <tr><td>Usu&aacute;rios ativos: </td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['activeUsers'];?>
</td>
       <tr><td>Hora e Data Atual: </td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['currentDateTime'];?>
</td>
       <tr><td>&Uacute;ltima Importa&ccedil;&atilde;o: </td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastTimestampFormatted'];?>
</td>
       <tr><td>Quantidade de dados Importados: </td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastImportedRecordsNumber'];?>
</td>
       <tr><td>&Uacute;ltima limpeza Efetuada na base: </td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastCleanUp'];?>
</td>
      </table></div>
    <hr>
    <a href="http://giannis.stoilis.gr/software/mysar/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programName'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programVersion'];?>
 (c) 2004-2005 by <a href="mailto:giannis@stoilis.gr">Giannis Stoilis</a>
<br>Licenced under the <a href="http://www.fsf.org/copyleft/gpl.html" target="_blank">GNU General Public Licence</a>.
    </a><br><font size="2"> Tradu&ccedil;&atilde;o para Portugues (pt_BR) Cassiano Martin </font>
  </center></body>
</html>
<?php }
}
