<center>
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">MySar Administration</th>
        </tr>
    </table>
</div>

<p>
<div class="table-responsive">
    <table class="table table-condensed" style="width: 100%;">
        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="configName" value="keepHistoryDays">
        <tr>
            <td style="width: 70%; text-align: left;">Automatically delete old data after <input type="text" name="thisValue" size="2" value="{$pageVars.keepHistoryDays}"> days</td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modify"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">To prevent the database from growing too large, MySar will periodically delete old records. Use this value to specify how long data should remain in the database. Avoid setting a high value, as it will cause the database to grow significantly, which may degrade your server's performance. Default value: 32</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="configName" value="squidLogPath">
        <tr>
            <td style="width: 70%; text-align: left;">Squid Log File: (access.log) <input type="text" name="thisValue" size="30" value="{$pageVars.squidLogPath}"></td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modify"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">Specify the location of the Squid log file. MySar requires access to this file to generate reports. Ensure the file has read permission for the MySar user. Default value: /var/log/squid/access.log.</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="configName" value="resolveClients">
        {if $pageVars.resolveClients=="enabled"}
            {assign var="optionEnabled" value="selected"}
            {assign var="optionDisabled" value=""}
        {else}
            {assign var="optionEnabled" value=""}
            {assign var="optionDisabled" value="selected"}
        {/if}
        <tr>
            <td style="width: 70%; text-align: left;">Name Resolution is: 
                <select name="thisValue">
                    <option value="enabled" {$optionEnabled}>Enabled</option>
                    <option value="disabled" {$optionDisabled}>Disabled</option>
                </select>
            </td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modify"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">If your network has a configured internal DNS server, MySar will resolve station IPs. Reports will display hostnames instead of IPs. Leave this value disabled if your network lacks a DNS server, as it may significantly impact MySar's performance while trying to resolve names. Default value: Disabled.</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="configName" value="mysarImporter">
        {if $pageVars.mysarImporter=="enabled"}
            {assign var="optionEnabled" value="selected"}
            {assign var="optionDisabled" value=""}
        {else}
            {assign var="optionEnabled" value=""}
            {assign var="optionDisabled" value="selected"}
        {/if}
        <tr>
            <td style="width: 70%; text-align: left;">MySAR is 
                <select name="thisValue">
                    <option value="enabled" {$optionEnabled}>Enabled</option>
                    <option value="disabled" {$optionDisabled}>Disabled</option>
                </select>
            </td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modify"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">If you want MySar to stop importing Squid data for any reason, select this option. Default value: Enabled.</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <tr>
            <td style="width: 70%; text-align: justify;">Click this button to delete ALL data collected by MySar. This action is irreversible. Use it to resolve issues such as reports not displaying correctly or data corruption in the database tables. BE ABSOLUTELY SURE of what you are doing!</td>
            <td style="width: 30%; text-align: center;">
                <input type="submit" value="Delete All" onClick="my_confirm('Are you sure you want to delete ALL data?!','{$pageVars.uri}&action=eraseAllStats')">
            </td>
        </tr>
    </table>
</div>
</center>
