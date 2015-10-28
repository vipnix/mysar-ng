<nobr>[
<a href="./?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$pageVars.hostiplong}&usersID={$pageVars.usersID}">&lt;&lt;&lt;  Retour au r&eacute; des utilisateurs et collaborateur pour un jour donn&eacute;e"</a>
|
<a href="{$pageVars.uri}">Actualliser la page</a>
]</nobr>

<table><tr><th style="font-size: 20px";>D&eacute;tails sp&eacute;cifique pour un ordinateur, un utilisateur, une date ou un site</th></tr></table>
<p>
<table><tr><td style="font-size: 20px;">{$pageVars.thisDateFormatted}</td></tr></table>
<p>
<table>
  <tr><td>Nom de l'ordinateur</td><td style="text-align:left;">{$pageVars.host.hostname}</td></tr>
  <tr><td>Adresse IP</td><td style="text-align:left;">{$pageVars.host.ip}</td></tr>
  <tr><td>Description de l'ordinateur</td><td style="text-align:left;">{$pageVars.host.description}</td></tr>
  <tr><td>Nom d'utilisateur</td><td style="text-align:left;">{$pageVars.user.authuser}</tr>
  <tr><td>Site</td><td style="text-align:left;"><a href="{$pageVars.site}" target="_blank">{$pageVars.site}</a></tr>
</table>
<p>
      [
        <a href="./?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.orderMethod}&OrderBy={$pageVars.orderBy}&ByteUnit={$pageVars.byteUnit}&date={$pageVars.date}&ipID={$pageVars.ipID}&siteID={$pageVars.siteID}">
		D&eacute;finir cette vu, comme vu par d&eacute;;fault
        </a>
      ]
  <table>
    <tr>
      <th>
        <a href="./?{$pageVars.url.timeASC}"><img border="{$pageVars.timeASCImageBorder}" src="images/up-arrow.gif"></a>
          {$pageVars.timeLabelStart}Temps{$pageVars.timeLabelEnd}
        <a href="./?{$pageVars.url.timeDESC}"><img border="{$pageVars.timeDESCImageBorder}" src="images/down-arrow.gif"></a>
      </th>
      <th width="110">
        <a href="./?{$pageVars.url.bytesASC}"><img border="{$pageVars.bytesASCImageBorder}" src="images/up-arrow.gif"></a>
          {$pageVars.bytesLabelStart}Bytes{$pageVars.bytesLabelEnd}
        <a href="./?{$pageVars.url.bytesDESC}"><img border="{$pageVars.bytesDESCImageBorder}" src="images/down-arrow.gif"></a>
        <br>
        <a href="./?{$pageVars.url.B}">{$pageVars.BLabelStart}B{$pageVars.BLabelEnd}</a>
        |
        <a href="./?{$pageVars.url.K}">{$pageVars.KLabelStart}K{$pageVars.KLabelEnd}</a>
        |
        <a href="./?{$pageVars.url.M}">{$pageVars.MLabelStart}M{$pageVars.MLabelEnd}</a>
        |
        <a href="./?{$pageVars.url.G}">{$pageVars.GLabelStart}G{$pageVars.GLabelEnd}</a>
      </th>
      <th>
        <a href="./?{$pageVars.url.urlASC}"><img border="{$pageVars.urlASCImageBorder}" src="images/up-arrow.gif"></a>
          {$pageVars.urlLabelStart}Adresse URL{$pageVars.urlLabelEnd}
        <a href="./?{$pageVars.url.urlDESC}"><img border="{$pageVars.urlDESCImageBorder}" src="images/down-arrow.gif"></a>
      </th>
      <th>
        <a href="./?{$pageVars.url.statusASC}"><img border="{$pageVars.statusASCImageBorder}" src="images/up-arrow.gif"></a>
          {$pageVars.statusLabelStart}Status{$pageVars.statusLabelEnd}
        <a href="./?{$pageVars.url.statusDESC}"><img border="{$pageVars.statusDESCImageBorder}" src="images/down-arrow.gif"></a>
      </th>
    </tr>
  {foreach from=$pageVars.siteDetails item=record}
  <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
    <td>{$record.time}</td>
    <td>{$record.bytes|bytesToHRF:$pageVars.byteUnit}</td>
    <td style="text-align: left;"><a href="{$record.url}">{$record.url|string_trim:80:"..."}</a></td>
    <td style="text-align: left;">{$record.resultCode}</td>
  </tr>
  {/foreach}
  </table>
