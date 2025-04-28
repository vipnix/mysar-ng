<center>
<nobr>[
<a href="."><<< Voltar para Relatório Diário</a>
|
<a href="{$pageVars.uri}">Atualizar esta página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de Estações e Usuários</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&date={$pageVars.previousWeek}" title="Voltar 1 Semana"><<</a>
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&date={$pageVars.previousDate}" title="Voltar 1 Dia"><</a>
                {$pageVars.thisDateFormatted}
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&date={$pageVars.nextDate}" title="Avançar 1 Dia">></a>
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&date={$pageVars.nextWeek}" title="Avançar 1 Semana">>></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&date={$pageVars.today}" title="Dia de Hoje">[ Ir para o dia de Hoje ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
    [ <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.date}" title="Lista de sites que foram acessados">Visualizar TODOS os sites acessados Neste dia</a> ]
</p>

<p>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}">
        Manter esta visualização como padrão
    </a>
    ]
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 5%; text-align: center;"></th>
            <th style="width: 25%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostipASC|default:''}">
                    <img border="{$pageVars.hostipASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.hostipLabelStart|default:''}ESTAÇÕES{$pageVars.hostipLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostipDESC|default:''}">
                    <img border="{$pageVars.hostipDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 25%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usernameASC|default:''}">
                    <img border="{$pageVars.usernameASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.usernameLabelStart|default:''}USUÁRIOS{$pageVars.usernameLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usernameDESC|default:''}">
                    <img border="{$pageVars.usernameDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.sitesASC|default:''}">
                    <img border="{$pageVars.sitesASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.sitesLabelStart|default:''}SITES{$pageVars.sitesLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.sitesDESC|default:''}">
                    <img border="{$pageVars.sitesDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRÁFEGO</th>
        </tr>
        <tr>
            <th style="width: 5%; text-align: center;"></th>
            <th style="width: 25%; text-align: center;"></th>
            <th style="width: 25%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesASC|default:''}">
                    <img border="{$pageVars.bytesASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.bytesLabelStart|default:''}BYTES{$pageVars.bytesLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesDESC|default:''}">
                    <img border="{$pageVars.bytesDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
                <br>
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.B|default:''}">{$pageVars.BLabelStart|default:''}B{$pageVars.BLabelEnd|default:''}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.K|default:''}">{$pageVars.KLabelStart|default:''}K{$pageVars.KLabelEnd|default:''}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.M|default:''}">{$pageVars.MLabelStart|default:''}M{$pageVars.MLabelEnd|default:''}</a>
                |
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.G|default:''}">{$pageVars.GLabelStart|default:''}G{$pageVars.GLabelEnd|default:''}</a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentASC|default:''}">
                    <img border="{$pageVars.cachePercentASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.cachePercentLabelStart|default:''}USO DO CACHE{$pageVars.cachePercentLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentDESC|default:''}">
                    <img border="{$pageVars.cachePercentDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        {assign var=bytesTotal value="0"}
        {foreach from=$pageVars.summaryIPRecords item=record}
            {if $record.hostdescription ne ""}
                {assign var="thisRecord" value=$record.hostdescription}
            {elseif $record.hostip ne $record.hostname}
                {assign var="thisRecord" value=$record.hostname}
            {else}
                {assign var="thisRecord" value=$record.hostip}
            {/if}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 5%;"></td>
                <td style="width: 25%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$thisRecord}</a></td>
                <td style="width: 25%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$record.username}</a></td>
                <td style="width: 15%; text-align: center;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$record.sites}</a></td>
                <td style="width: 15%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
                <td style="width: 15%; text-align: center;">{$record.cachePercent}%</td>
            </tr>
            {assign var=bytesTotal value=$bytesTotal+$record.bytes}
        {/foreach}
        <tr><td colspan="6"></td></tr>
        <tr>
            <th style="width: 5%; text-align: center;">TOTALS</th>
            <th style="width: 25%; text-align: right;">{$pageVars.distinctValues.ips}</th>
            <th style="width: 25%; text-align: right;">{$pageVars.distinctValues.users}</th>
            <th style="width: 15%; text-align: right;">{$pageVars.distinctValues.sites}</th>
            <th style="width: 15%; text-align: right;">{$bytesTotal|bytesToHRF:$pageVars.ByteUnit}</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>

<div class="table-responsive" style="margin-top: 2rem;">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th colspan="6">Últimas Atividades do Usuário</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;">IP ESTAÇÃO</th>
            <th style="width: 20%; text-align: center;">USUÁRIO</th>
            <th style="width: 15%; text-align: center;">HORA</th>
            <th style="width: 10%; text-align: center;">BYTES</th>
            <th style="width: 30%; text-align: center;">URL</th>
            <th style="width: 10%; text-align: center;">STATUS</th>
        </tr>
        {foreach from=$pageVars.latestUserActivity item=record}
            {if $record.hostdescription ne ""}
                {assign var="thisRecord" value=$record.hostdescription}
            {elseif $record.hostip ne $record.hostname}
                {assign var="thisRecord" value=$record.hostname}
            {else}
                {assign var="thisRecord" value=$record.hostip}
            {/if}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$thisRecord}</a></td>
                <td style="width: 20%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$record.username}</a></td>
                <td style="width: 15%; text-align: center;">{$record.time}</td>
                <td style="width: 10%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
                <td style="width: 30%; text-align: left;"><a href="{$record.url}" target="_blank">{$record.url|string_trim:80:"..."}</a></td>
                <td style="width: 10%; text-align: left;">{$record.resultCode}</td>
            </tr>
        {/foreach}
    </table>
</div>
</center>
