<center>
<nobr>[
<a href="{$smarty.server.PHP_SELF}?a=IPSummary&date={$pageVars.today}"><<< Voltar para "estações e usuários de um dia específico"</a>
|
<a href="{$pageVars.uri}">Atualizar esta página</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Relatório de uma Estação, Usuário e Data</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                {if $pageVars.previousWeekID != ""}
                    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&hostiplong={$pageVars.hostiplong}&date={$pageVars.previousWeek}&usersID={$pageVars.previousWeekID}"><<</a>
                {/if}
                {if $pageVars.previousDateID != ""}
                    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&hostiplong={$pageVars.hostiplong}&date={$pageVars.previousDate}&usersID={$pageVars.previousDateID}"><</a>
                {/if}
                {$pageVars.thisDateFormatted}
                {if $pageVars.nextDateID != ""}
                    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&hostiplong={$pageVars.hostiplong}&date={$pageVars.nextDate}&usersID={$pageVars.nextDateID}">></a>
                {/if}
                {if $pageVars.nextWeekID != ""}
                    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&hostiplong={$pageVars.hostiplong}&date={$pageVars.nextWeek}&usersID={$pageVars.nextWeekID}">>></a>
                {/if}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&hostiplong={$pageVars.hostiplong}&date={$pageVars.today}&usersID={$pageVars.usersID}">[ Ir para o dia de Hoje ]</a>
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
        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="action" value="hostDescriptionUpdate">
        <tr>
            <td style="width: 30%; text-align: left;">Nome</td>
            <td style="width: 70%; text-align: left;">{$pageVars.host.hostname}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Endereço IP</td>
            <td style="width: 70%; text-align: left;">{$pageVars.host.hostname}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Descrição</td>
            <td style="width: 70%; text-align: left;"><input type="text" name="thisValue" value="{$pageVars.host.description}"></td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Nome Usuário</td>
            <td style="width: 70%; text-align: left;">{$pageVars.user.authuser}</td>
        </tr>
        </form>
    </table>
</div>

<p>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}&hostiplong={$pageVars.hostiplong}">
        Manter esta visualização como padrão
    </a>
    ]
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 55%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.siteASC|default:''}">
                    <img border="{$pageVars.siteASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.siteLabelStart|default:''}SITE{$pageVars.siteLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.siteDESC|default:''}">
                    <img border="{$pageVars.siteDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRÁFEGO</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 55%; text-align: center;"></th>
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
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.G|default:''}">{$pageVars.GLabelStart|default:'0'}G{$pageVars.GLabelEnd|default:'0'}</a>
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
        {assign var=recordCount value="0"}
        {assign var=bytesTotal value="0"}
        {foreach from=$pageVars.summaryIPSites item=record}
        <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
            <td style="width: 15%; text-align: center;"><a href="{$smarty.server.PHP_SELF}?a=details&date={$pageVars.date}&hostiplong={$pageVars.hostiplong}&sitesID={$record.sitesID}&usersID={$pageVars.usersID}"><b>Detalhes</b></a></td>
            <td style="width: 55%; text-align: left;"><a href="{$record.site}" target="_blank">{$record.site}</a></td>
            <td style="width: 15%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
            <td style="width: 15%; text-align: center;">{$record.cachePercent}%</td>
        </tr>
        {assign var=recordCount value=$recordCount+1}
        {assign var=bytesTotal value=$bytesTotal+$record.bytes}
        {/foreach}
        <tr><td colspan="4"></td></tr>
        <tr>
            <th style="width: 15%; text-align: center;">TOTAIS</th>
            <th style="width: 55%; text-align: right;">{$recordCount}</th>
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
