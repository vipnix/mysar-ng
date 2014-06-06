<?php /* Smarty version 2.6.10, created on 2013-05-03 15:02:48
         compiled from details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'bytesToHRF', 'details.tpl', 58, false),array('modifier', 'string_trim', 'details.tpl', 59, false),)), $this); ?>
<nobr>[
<a href="./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['pageVars']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['pageVars']['usersID']; ?>
">&lt;&lt;&lt; Voltar para "Relat&oacute;rio de uma Esta&ccedil;&atilde;o e data Espec&iacute;fica"</a>
|
<a href="<?php echo $this->_tpl_vars['pageVars']['uri']; ?>
">Atualizar esta P&aacute;gina</a>
]</nobr>

<table><tr><th style="font-size: 20px";>Detalhes de Estacao, Usuario, Data e Site</th></tr></table>
<p>
<table><tr><td style="font-size: 20px;"><?php echo $this->_tpl_vars['pageVars']['thisDateFormatted']; ?>
</td></tr></table>
<p>
<table>
  <tr><td>Esta&ccedil;&atilde;o</td><td style="text-align:left;"><?php echo $this->_tpl_vars['pageVars']['host']['hostname']; ?>
</td></tr>
  <tr><td>IP Esta&ccedil;&atilde;o</td><td style="text-align:left;"><?php echo $this->_tpl_vars['pageVars']['host']['ip']; ?>
</td></tr>
  <tr><td>Descri&ccedil;&atilde;o da Esta&ccedil;&atilde;o</td><td style="text-align:left;"><?php echo $this->_tpl_vars['pageVars']['host']['description']; ?>
</td></tr>
  <tr><td>Nome de Usu&aacute;rio</td><td style="text-align:left;"><?php echo $this->_tpl_vars['pageVars']['user']['authuser']; ?>
</tr>
  <tr><td>Site</td><td style="text-align:left;"><a href="<?php echo $this->_tpl_vars['pageVars']['site']; ?>
" target="_blank"><?php echo $this->_tpl_vars['pageVars']['site']; ?>
</a></tr>
</table>
<p>
      [
        <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&action=setDefaultView&OrderMethod=<?php echo $this->_tpl_vars['pageVars']['orderMethod']; ?>
&OrderBy=<?php echo $this->_tpl_vars['pageVars']['orderBy']; ?>
&ByteUnit=<?php echo $this->_tpl_vars['pageVars']['byteUnit']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&ipID=<?php echo $this->_tpl_vars['pageVars']['ipID']; ?>
&siteID=<?php echo $this->_tpl_vars['pageVars']['siteID']; ?>
">
          Manter esta visualiza&ccedil;&atilde;o como padr&atilde;o
        </a>
      ]
  <table>
    <tr>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['timeASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['timeASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['timeLabelStart']; ?>
HORA<?php echo $this->_tpl_vars['pageVars']['timeLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['timeDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['timeDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
      <th width="110">
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['bytesASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['bytesASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['bytesLabelStart']; ?>
BYTES<?php echo $this->_tpl_vars['pageVars']['bytesLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['bytesDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['bytesDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
        <br>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['B']; ?>
"><?php echo $this->_tpl_vars['pageVars']['BLabelStart']; ?>
B<?php echo $this->_tpl_vars['pageVars']['BLabelEnd']; ?>
</a>
        |
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['K']; ?>
"><?php echo $this->_tpl_vars['pageVars']['KLabelStart']; ?>
K<?php echo $this->_tpl_vars['pageVars']['KLabelEnd']; ?>
</a>
        |
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['M']; ?>
"><?php echo $this->_tpl_vars['pageVars']['MLabelStart']; ?>
M<?php echo $this->_tpl_vars['pageVars']['MLabelEnd']; ?>
</a>
        |
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['G']; ?>
"><?php echo $this->_tpl_vars['pageVars']['GLabelStart']; ?>
G<?php echo $this->_tpl_vars['pageVars']['GLabelEnd']; ?>
</a>
      </th>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['urlASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['urlASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['urlLabelStart']; ?>
URL<?php echo $this->_tpl_vars['pageVars']['urlLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['urlDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['urlDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['statusASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['statusASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['statusLabelStart']; ?>
STATUS<?php echo $this->_tpl_vars['pageVars']['statusLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['statusDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['statusDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
    </tr>
  <?php $_from = $this->_tpl_vars['pageVars']['siteDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
  <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
    <td><?php echo $this->_tpl_vars['record']['time']; ?>
</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['bytes'])) ? $this->_run_mod_handler('bytesToHRF', true, $_tmp, $this->_tpl_vars['pageVars']['byteUnit']) : bytesToHRF($_tmp, $this->_tpl_vars['pageVars']['byteUnit'])); ?>
</td>
    <td style="text-align: left;"><a href="<?php echo $this->_tpl_vars['record']['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['url'])) ? $this->_run_mod_handler('string_trim', true, $_tmp, 80, "...") : string_trim($_tmp, 80, "...")); ?>
</a></td>
    <td style="text-align: left;"><?php echo $this->_tpl_vars['record']['resultCode']; ?>
</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  </table>