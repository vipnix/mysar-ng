<center>
<nobr>[
<a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.date}"><<< Back to Access List for a Day</a>
|
<a href="{$pageVars.uri}">Refresh this page</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Stations and Users by Sites Report</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=siteusers&date={$pageVars.previousWeek}&sitesID={$pageVars.sitesID}" title="Back 1 Week"><<</a>
                <a href="{$smarty.server.PHP_SELF}?a=siteusers&date={$pageVars.previousDate}&sitesID={$pageVars.sitesID}" title="Back 1 Day"><</a>
                {$pageVars.thisDateFormatted}
                <a href="{$smarty.server.PHP_SELF}?a=siteusers&date={$pageVars.nextDate}&sitesID={$pageVars.sitesID}" title="Forward 1 Day">></a>
                <a href="{$smarty.server.PHP_SELF}?a=siteusers&date={$pageVars.nextWeek}&sitesID={$pageVars.sitesID}" title="Forward 1 Week">>></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=siteusers&date={$pageVars.today}&sitesID={$pageVars.sitesID}" title="Today">[ Go to Today ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th colspan="2">Site Information</th>
        </tr>
        <tr>
            <td style="width: 30%; text-align: left;">Site</td>
            <td style="width: 70%; text-align: left;"><a href="{$pageVars.site}" target="_blank">{$pageVars.site}</a></td>
        </tr>
    </table>
</div>

<p>
<center>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}&sitesID={$pageVars.sitesID}">
        Keep this view as default
    </a>
    ]
</center>
</p>

<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostipASC|default:'0'}">
                    <img border="{$pageVars.hostipASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.hostipLabelStart|default:'0'}STATION{$pageVars.hostipLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostipDESC|default:'0'}">
                    <img border="{$pageVars.hostipDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 35%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usernameASC|default:'0'}">
                    <img border="{$pageVars.usernameASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.usernameLabelStart|default:'0'}USER{$pageVars.usernameLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usernameDESC|default:'0'}">
                    <img border="{$pageVars.usernameDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRAFFIC</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;"></th>
            <th style="width: 35%; text-align: center;"></th>
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
                {$pageVars.cachePercentLabelStart|default:'0'}CACHE USAGE{$pageVars.cachePercentLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentDESC|default:'0'}">
                    <img border="{$pageVars.cachePercentDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        {assign var=bytesTotal value="0"}
        {foreach from=$pageVars.siteusers item=record}
            {if $record.hostdescription ne ""}
                {assign var="thisRecord" value=$record.hostdescription}
            {elseif $record.hostip ne $record.hostname}
                {assign var="thisRecord" value=$record.hostname}
            {else}
                {assign var="thisRecord" value=$record.hostip}
            {/if}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: center;"><a href='{$smarty.server.PHP_SELF}?a=details&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}&sitesID={$pageVars.sitesID}'><b>Details</b></a></td>
                <td style="width: 35%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=details&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}&sitesID={$pageVars.sitesID}'>{$thisRecord}</a></td>
                <td style="width: 35%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=details&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}&sitesID={$pageVars.sitesID}'>{$record.username}</a></td>
                <td style="width: 15%; text-align: right;">{$record.bytes|bytesToHRF:$pageVars.ByteUnit}</td>
                <td style="width: 15%; text-align: center;">{$record.cachePercent}%</td>
            </tr>
            {assign var=bytesTotal value=$bytesTotal+$record.bytes}
        {/foreach}
        <tr><td colspan="5"></td></tr>
        <tr>
            <th style="width: 15%; text-align: center;">TOTALS</th>
            <th style="width: 35%; text-align: right;"></th>
            <th style="width: 35%; text-align: right;">{$pageVars.distinctValues.users}</th>
            <th style="width: 15%; text-align: right;">{$bytesTotal|bytesToHRF:$pageVars.ByteUnit}</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>

<div class="table-responsive" style="margin-top: 2rem;">
    <table class="table table-condensed" style="width: 100%;">
        <tr>
            <th colspan="6">Site Accesses</th>
        </tr>
        <tr>
            <th style="width: 15%; text-align: center;">STATION IP</th>
            <th style="width: 20%; text-align: center;">USER</th>
            <th style="width: 15%; text-align: center;">TIME</th>
            <th style="width: 10%; text-align: center;">BYTES</th>
            <th style="width: 30%; text-align: center;">URL</th>
            <th style="width: 10%; text-align: center;">STATUS</th>
        </tr>
        {foreach from=$pageVars.latestSiteActivity item=record}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: left;"><a href='{$smarty.server.PHP_SELF}?a=IPSitesSummary&date={$pageVars.date}&hostiplong={$record.hostiplong}&usersID={$record.usersID}'>{$record.hostip}</a></td>
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
