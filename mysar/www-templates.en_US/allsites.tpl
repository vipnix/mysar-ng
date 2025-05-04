<center>
<nobr>[
<a href="{$smarty.server.PHP_SELF}?a=IPSummary&date={$pageVars.date}"><<< Back to Stations and Users for a Specific Day</a>
|
<a href="{$pageVars.uri}">Refresh this page</a>
]</nobr>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Sites Report for a Specific Day</th>
        </tr>
    </table>
</div>

<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.previousWeek}" title="Back 1 Week"><<</a>
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.previousDate}" title="Back 1 Day"><</a>
                {$pageVars.thisDateFormatted}
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.nextDate}" title="Forward 1 Day">></a>
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.nextWeek}" title="Forward 1 Week">>></a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?a=allsites&date={$pageVars.today}" title="Today">[ Go to Today ]</a>
            </td>
        </tr>
    </table>
</div>

<p>
<center>
    [
    <a href="{$smarty.server.PHP_SELF}?a={$pageVars.thisPage}&action=setDefaultView&OrderMethod={$pageVars.OrderMethod}&OrderBy={$pageVars.OrderBy}&ByteUnit={$pageVars.ByteUnit}&date={$pageVars.date}">
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
                {$pageVars.usersLabelStart|default:'0'}USERS{$pageVars.usersLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.usersDESC|default:'0'}">
                    <img border="{$pageVars.usersDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th style="width: 15%; text-align: center;">
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsASC|default:'0'}">
                    <img border="{$pageVars.hostsASCImageBorder|default:'0'}" src="images/up-arrow.gif" class="img-with-border">
                </a>
                {$pageVars.hostsLabelStart|default:'0'}STATIONS{$pageVars.hostsLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.hostsDESC|default:'0'}">
                    <img border="{$pageVars.hostsDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
            <th colspan="2" style="width: 30%; text-align: center;">TRAFFIC</th>
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
                {$pageVars.cachePercentLabelStart|default:'0'}CACHE USAGE{$pageVars.cachePercentLabelEnd|default:'0'}
                <a href="{$smarty.server.PHP_SELF}?{$pageVars.url.cachePercentDESC|default:'0'}">
                    <img border="{$pageVars.cachePercentDESCImageBorder|default:'0'}" src="images/down-arrow.gif" class="img-with-border">
                </a>
            </th>
        </tr>
        {assign var=bytesTotal value="0"}
        {foreach from=$pageVars.allSites item=record}
            <tr onMouseOver="this.bgColor='#C5D3E7';" onMouseOut="this.bgColor='#DAE3F0';">
                <td style="width: 15%; text-align: center;"><a href='{$smarty.server.PHP_SELF}?a=siteusers&sitesID={$record.sitesID}&date={$pageVars.date}'><b>Details</b></a></td>
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
            <th style="width: 15%; text-align: center;">TOTALS</th>
            <th style="width: 35%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;"></th>
            <th style="width: 15%; text-align: right;">{$bytesTotal|bytesToHRF:$pageVars.ByteUnit}</th>
            <th style="width: 15%;"></th>
        </tr>
    </table>
</div>
</center>
