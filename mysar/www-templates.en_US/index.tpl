<center>
<nobr>[<a href="{$pageVars.uri}">Refresh this page</a>]</nobr>
</center>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Daily Access Report</th>
        </tr>
    </table>
</div>

<p>
<center>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}">
        Keep this view as default
    </a>
    ]
</center>
<br>
<table cellpadding=1 cellspacing=1>
    <tr>
        <th rowspan="2">
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.dateASC|default:''}">
                <img border="{$pageVars.dateASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.dateLabelStart}DATE{$pageVars.dateLabelEnd}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.dateDESC|default:''}">
                <img border="{$pageVars.dateDESCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usersASC|default:''}">
                <img border="{$pageVars.usersASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.usersLabelStart|default:''}USERS{$pageVars.usersLabelEnd|default:''}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usersDESC|default:''}">
                <img border="{$pageVars.usersDESCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsASC|default:''}">
                <img border="{$pageVars.hostsASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.hostsLabelStart|default:''}STATIONS{$pageVars.hostsLabelEnd|default:''}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsDESC|default:''}">
                <img border="{$pageVars.hostsDESCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th rowspan="2">
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.sitesASC|default:''}">
                <img border="{$pageVars.sitesASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.sitesLabelStart|default:''}SITES{$pageVars.sitesLabelEnd|default:''}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.sitesDESC|default:''}">
                <img border="{$pageVars.sitesDESCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
        <th colspan="2">TRAFFIC</th>
    </tr>
    <tr>
        <th>
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesASC|default:''}">
                <img border="{$pageVars.bytesASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.bytesLabelStart|default:''}BYTES{$pageVars.bytesLabelEnd|default:''}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.bytesDESC|default:''}">
                <img border="{$pageVars.bytesDESCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
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
        <th>
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentASC|default:''}">
                <img border="{$pageVars.cachePercentASCImageBorder}" src="images/up-arrow.gif" class="img-with-border">
            </a>
            {$pageVars.cachePercentLabelStart|default:''}CACHE USAGE{$pageVars.cachePercentLabelEnd|default:''}
            <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentDESC|default:''}">
                <img border="{$pageVars.cachePercentASCImageBorder}" src="images/down-arrow.gif" class="img-with-border">
            </a>
        </th>
    </tr>
    {foreach from=$pageVars.availableDates item=date}
    <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
        <td style="text-align: left;">
            <a href='{$smarty.server.PHP_SELF|default:''}?a=IPSummary&date={$date.date}'>{$date.dateFormatted}</a>
        </td>
        <td style="text-align: center;">{$date.users}</font></td>
        <td style="text-align: center;">{$date.hosts}</font></td>
        <td style="text-align: center;">
            <a href="{$smarty.server.PHP_SELF|default:''}?a=allsites&date={$date.date}">{$date.sites}</a>
        </td>
        <td style="text-align: right;">{$date.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
        <td style="text-align: center;">{$date.cachePercent}%</td>
    </tr>
    {/foreach}
</table>
</div>
