<?php /* Smarty version 2.6.10, created on 2013-05-03 15:10:57
         compiled from IPSummary.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'bytesToHRF', 'IPSummary.tpl', 83, false),array('modifier', 'string_trim', 'IPSummary.tpl', 116, false),)), $this); ?>
<nobr>[
<a href=".">&lt;&lt;&lt; Voltar para Relat&oacute;rio Di&aacute;rio</a>
|
<a href="<?php echo $this->_tpl_vars['pageVars']['uri']; ?>
">Atualizar esta p&aacute;gina</a>
]</nobr>

<table><tr><th style="font-size: 20px;">Relat&oacute;rio de Esta&ccedil;&otilde;es e Usu&aacute;rios de Um dia</th></tr></table>
<p>
<p>
<table>
  <tr><td style="font-size: 20px;">
  <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['previousWeek']; ?>
" title="Voltar 1 Semana">&lt;&lt;</a>
  <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['previousDate']; ?>
" title="Voltar 1 Dia">&lt;</a>
  <?php echo $this->_tpl_vars['pageVars']['thisDateFormatted']; ?>

  <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['nextDate']; ?>
" title="Avancar 1 Dia">&gt;</a>
  <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['nextWeek']; ?>
" title="Avancar 1 Semana">&gt;&gt;</a>
  </td></tr>
  <tr><td style="text-align:center;">
  <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['today']; ?>
" title="Dia de Hoje">[ Ir para o dia de Hoje ]</a>
  </td></tr>
  </table>
<p>
[ <a href="./?a=allsites&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
" title="Lista de sites que foram acessados">Visualizar TODOS os sites acessados Neste dia</a> ]

<center>
      [
        <a href="./?a=<?php echo $this->_tpl_vars['pageVars']['thisPage']; ?>
&action=setDefaultView&OrderMethod=<?php echo $this->_tpl_vars['pageVars']['OrderMethod']; ?>
&OrderBy=<?php echo $this->_tpl_vars['pageVars']['OrderBy']; ?>
&ByteUnit=<?php echo $this->_tpl_vars['pageVars']['ByteUnit']; ?>
&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
">
          Manter esta visualiza&ccedil;&atilde;o como padr&atilde;o
        </a>
      ]
  <table>
    <tr>
      <th></th>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['hostipASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['hostipASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['hostipLabelStart']; ?>
ESTA&Ccedil;&Otilde;ES<?php echo $this->_tpl_vars['pageVars']['hostipLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['hostipDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['hostipDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['usernameASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['usernameASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['usernameLabelStart']; ?>
USU&Aacute;RIOS<?php echo $this->_tpl_vars['pageVars']['usernameLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['usernameDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['usernameDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['sitesASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['sitesASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['sitesLabelStart']; ?>
SITES<?php echo $this->_tpl_vars['pageVars']['sitesLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['sitesDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['sitesDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
      <th>
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
        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['cachePercentASC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['cachePercentASCImageBorder']; ?>
" src="images/up-arrow.gif"></a>
          <?php echo $this->_tpl_vars['pageVars']['cachePercentLabelStart']; ?>
USO DO CACHE<?php echo $this->_tpl_vars['pageVars']['cachePercentLabelEnd']; ?>

        <a href="./?<?php echo $this->_tpl_vars['pageVars']['url']['cachePercentDESC']; ?>
"><img border="<?php echo $this->_tpl_vars['pageVars']['cachePercentDESCImageBorder']; ?>
" src="images/down-arrow.gif"></a>
      </th>
    </tr>
    <?php $this->assign('bytesTotal', '0'); ?>
    <?php $_from = $this->_tpl_vars['pageVars']['summaryIPRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
      <?php if ($this->_tpl_vars['record']['hostdescription'] != ""): ?>
        <?php $this->assign('thisRecord', $this->_tpl_vars['record']['hostdescription']); ?>
      <?php elseif ($this->_tpl_vars['record']['hostip'] != $this->_tpl_vars['record']['hostname']): ?>
        <?php $this->assign('thisRecord', $this->_tpl_vars['record']['hostname']); ?>
      <?php else: ?>
        <?php $this->assign('thisRecord', $this->_tpl_vars['record']['hostip']); ?>
      <?php endif; ?>

    <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
      <td></td>
      <td><a href='./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['record']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['record']['usersID']; ?>
'><?php echo $this->_tpl_vars['thisRecord']; ?>
</td>
      <td><a href='./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['record']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['record']['usersID']; ?>
'><?php echo $this->_tpl_vars['record']['username']; ?>
</td>
      <td><a href='./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['record']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['record']['usersID']; ?>
'><?php echo $this->_tpl_vars['record']['sites']; ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['bytes'])) ? $this->_run_mod_handler('bytesToHRF', true, $_tmp, $this->_tpl_vars['pageVars']['ByteUnit']) : bytesToHRF($_tmp, $this->_tpl_vars['pageVars']['ByteUnit'])); ?>
</td>
      <td><?php echo $this->_tpl_vars['record']['cachePercent']; ?>
%</td>
    </tr>
    <?php $this->assign('bytesTotal', $this->_tpl_vars['bytesTotal']+$this->_tpl_vars['record']['bytes']); ?>
    <?php endforeach; endif; unset($_from); ?>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
      <th>TOTALS</th>
      <th style="text-align: right;"><?php echo $this->_tpl_vars['pageVars']['distinctValues']['ips']; ?>
</th>
      <th style="text-align: right;"><?php echo $this->_tpl_vars['pageVars']['distinctValues']['users']; ?>
</th>
      <th style="text-align: right;"><?php echo $this->_tpl_vars['pageVars']['distinctValues']['sites']; ?>
</th>
      <th style="text-align: right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['bytesTotal'])) ? $this->_run_mod_handler('bytesToHRF', true, $_tmp, $this->_tpl_vars['pageVars']['ByteUnit']) : bytesToHRF($_tmp, $this->_tpl_vars['pageVars']['ByteUnit'])); ?>
</th>
      <th></th>
    </tr>
  </table>
  <p>
  <table>
    <tr><th colspan="7">&Uacute;ltimas Atividades do Usu&aacute;rio</th></td>
    <tr>
      <th>IP ESTA&Ccedil;&Atilde;O</th>
      <th>USU&Aacute;RIO</th>
      <th>HORA</th>
      <th>BYTES</th>
      <th>URL</th>
      <th>STATUS</th>
    </tr>
    <?php $_from = $this->_tpl_vars['pageVars']['latestUserActivity']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['record']):
?>
    <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
      <td><a href='./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['record']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['record']['usersID']; ?>
'><?php echo $this->_tpl_vars['record']['hostip']; ?>
</a></td>
      <td><a href='./?a=IPSitesSummary&date=<?php echo $this->_tpl_vars['pageVars']['date']; ?>
&hostiplong=<?php echo $this->_tpl_vars['record']['hostiplong']; ?>
&usersID=<?php echo $this->_tpl_vars['record']['usersID']; ?>
'><?php echo $this->_tpl_vars['record']['username']; ?>
</a></td>
      <td><?php echo $this->_tpl_vars['record']['time']; ?>
</td>
      <td><?php echo $this->_tpl_vars['record']['bytes']; ?>
</td>
      <td style="text-align: left"><a href="<?php echo $this->_tpl_vars['record']['url']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['record']['url'])) ? $this->_run_mod_handler('string_trim', true, $_tmp, 80, "...") : string_trim($_tmp, 80, "...")); ?>
</a></td>
      <td style="text-align: left"><?php echo $this->_tpl_vars['record']['resultCode']; ?>
</td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>
</center>