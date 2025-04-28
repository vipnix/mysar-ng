<center>
<nobr>[
<a href="{$smarty.server.PHP_SELF}?a=IPSummary&date={$pageVars.date}"><<< Voltar para Estações e Usuários de um dia Específico</a>
|
<a href="{$pageVars.uri}">Atualizar esta página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de Sites de um dia Específico</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.previousWeek}" title="Voltar 1 Semana"><<</a>
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.previousDate}" title="Voltar 1 Dia"><</a>
                {$pageVars.thisDateFormatted}
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.nextDate}" title="Avançar 1 Dia">></a>
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.nextWeek}" title="Avançar 1 Semana">>></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.today}" title="Dia de Hoje">[ Ir para o dia de Hoje ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
<center>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}">
        Manter esta visualização como padrão
    </a>
    ]
</center>
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.siteASC|default:'0'}">
                    <img border="{$pageVars.siteASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.siteLabelStart|default:'0'}SITE{$pageVars.siteLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.siteDESC|default:'0'}">
                    <img border="{$pageVars.siteDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usersASC|default:'0'}">
                    <img border="{$pageVars.usersASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.usersLabelStart|default:'0'}USUÁRIOS{$pageVars.usersLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usersDESC|default:'0'}">
                    <img border="{$pageVars.usersDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsASC|default:'0'}">
                    <img border="{$pageVars.hostsASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.hostsLabelStart|default:'0'}ESTAÇÕES{$pageVars.hostsLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsDESC|default:'0'}">
                    <img border="{$pageVars.hostsDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRÁFEGO</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesASC|default:'0'}">
                    <img border="{$pageVars.bytesASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.bytesLabelStart|default:'0'}BYTES{$pageVars.bytesLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesDESC|default:'0'}">
                    <img border="{$pageVars.bytesDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
                <br>
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.B|default:'0'}">{$pageVars.BLabelStart|default:'0'}B{$pageVars.BLabelEnd|default:'0'}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.K|default:'0'}">{$pageVars.KLabelStart|default:'0'}K{$pageVars.KLabelEnd|default:'0'}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.M|default:'0'}">{$pageVars.MLabelStart|default:'0'}M{$pageVars.MLabelEnd|default:'0'}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.G|default:'0'}">{$pageVars.GLabelStart|default:'0'}G{$pageVars.GLabelEnd|default:'0'}</a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentASC|default:'0'}">
                    <img border="{$pageVars.cachePercentASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.cachePercentLabelStart|default:'0'}USO DO CACHE{$pageVars.cachePercentLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentDESC|default:'0'}">
                    <img border="{$pageVars.cachePercentDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        {assign var=bytesTotal value="0"}
        {foreach from=$pageVars.allSites item=record}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: center;"><a href='{$smarty.server.PHP_SELF}?a=siteusers&sitesID={$record.sitesID}&date={$pageVars.date}'><b>Detalhes</b></a></td>
                <td style="width: 35%; text-align: left;"><a href="{$record.site}" target="_blank">{$record.site|string_trim:80:"..."}</a></td>
                <td style="width: 15%; text-align: center;">{$record.users}</td>
                <td style="width: 15%; text-align: center;">{$record.hosts}</td>
                <td style="width: 15%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
                <td style="width: 15%; text-align: center;">{$record.cachePercent}%</td>
            </tr>
            {assign var=bytesTotal value=$bytesTotal+$record.bytes}
        {/foreach}
        <tr><td colspan="6"></td></tr>
        <tr>
            <th style="width: 15%; text-align: center;">TOTAIS</th>
            <th style="width: 35%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;">{$bytesTotal|bytesToHRF:$pageVars.ByteUnit}</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>
</center>
