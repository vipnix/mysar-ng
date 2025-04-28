<center>
<nobr>[
<a href="{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$pageVars.hostiplong}&usersID={$pageVars.usersID}"><<< Voltar para "Relatório de uma Estação e data Específica"</a>
|
<a href="{$pageVars.uri}">Atualizar esta Página</a>
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
            <td style="text-align: center;">{$pageVars.thisDateFormatted}</td>
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
            <td style="width: 70%; text-align: left;">{$pageVars.host.hostname}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">IP Estação</td>
            <td style="width: 70%; text-align: left;">{$pageVars.host.ip}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Descrição da Estação</td>
            <td style="width: 70%; text-align: left;">{$pageVars.host.description}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Nome de Usuário</td>
            <td style="width: 70%; text-align: left;">{$pageVars.user.authuser}</td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Site</td>
            <td style="width: 70%; text-align: left;"><a href="{$pageVars.site}" target="_blank">{$pageVars.site}</a></td>
        </tr>
    </table>
</div>

<p>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}&ipID={$pageVars.ipID}&siteID={$pageVars.siteID}">
        Manter esta visualização como padrão
    </a>
    ]
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 20%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.timeASC|default:''}">
                    <img border="{$pageVars.timeASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.timeLabelStart|default:''}HORA{$pageVars.timeLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.timeDESC|default:''}">
                    <img border="{$pageVars.timeDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
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
            <th style="width: 45%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.urlASC|default:''}">
                    <img border="{$pageVars.urlASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.urlLabelStart|default:''}URL{$pageVars.urlLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.urlDESC|default:''}">
                    <img border="{$pageVars.urlDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 20%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.statusASC|default:''}">
                    <img border="{$pageVars.statusASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.statusLabelStart|default:''}STATUS{$pageVars.statusLabelEnd|default:''}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.statusDESC|default:''}">
                    <img border="{$pageVars.statusDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        {foreach from=$pageVars.siteDetails item=record}
        <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
            <td style="width: 20%; text-align: center;">{$record.time}</td>
            <td style="width: 15%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
            <td style="width: 45%; text-align: left;"><a href="{$record.url}" target="_blank">{$record.url|string_trim:80:"..."}</a></td>
            <td style="width: 20%; text-align: left;">{$record.resultCode}</td>
        </tr>
        {/foreach}
    </table>
</div>
</center>
