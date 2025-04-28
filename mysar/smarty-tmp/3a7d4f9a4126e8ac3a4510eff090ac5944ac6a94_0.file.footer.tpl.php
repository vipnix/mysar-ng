<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 05:20:30
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f3a4e563dd7_87387637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a7d4f9a4126e8ac3a4510eff090ac5944ac6a94' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/footer.tpl',
      1 => 1745828426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f3a4e563dd7_87387637 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="footer-table">
        <table class="table table-condensed">
            <tr><td>Usuários ativos:</td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['activeUsers'];?>
</td></tr>
            <tr><td>Hora e Data Atual:</td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['currentDateTime'];?>
</td></tr>
            <tr><td>Última Importação:</td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastTimestampFormatted'];?>
</td></tr>
            <tr><td>Quantidade de dados Importados:</td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastImportedRecordsNumber'];?>
</td></tr>
            <tr><td>Última limpeza Efetuada na base:</td><td><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['lastCleanUp'];?>
</td></tr>
        </table>
    </div>

    <div style="margin-top: 1rem; text-align: center; font-size: 12px; color: #777;">
        Mysar-ng VIPNIX (c) 2014-2025 by Vipnix<br>
        Licenced under the <a href="https://www.gnu.org/licenses/gpl-2.0.html" target="_blank">GNU General Public Licence</a>.<br>
        Tradução para Português (pt_BR) Vipnix
    </div>

  </div> <!-- fechamento do body_total -->
</center>
</body>
</html>
<?php }
}
