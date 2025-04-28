<center>
<div class="table-responsive">
    <table class="table table-condensed">
        <tr>
            <th style="font-size: 20px">Administração do MySar</th>
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
            <td style="width: 70%; text-align: left;">Excluir dados antigos automaticamente depois de <input type="text" name="thisValue" size="2" value="{$pageVars.keepHistoryDays}"> dias</td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modificar"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">Para prevenir que a base de dados fique muito grande, mysar irá excluir os registros antigos periodicamente. Use este valor para especificar o tempo dos dados na base. Não aumente muito o valor, pois a base irá crescer muito, e consequentemente degradar a performance do seu servidor. Valor padrão: 32</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <form method="POST">
        <input type="hidden" name="hiddenSubmit" value="1">
        <input type="hidden" name="configName" value="squidLogPath">
        <tr>
            <td style="width: 70%; text-align: left;">Arquivo de LOGs do Squid: (access.log) <input type="text" name="thisValue" size="30" value="{$pageVars.squidLogPath}"></td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modificar"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">Especifique aqui onde encontrar o arquivo de LOG do Squid. MySar precisa saber onde está localizado o arquivo de LOG do squid, pois é desse arquivo que são gerados os Relatórios. Tenha certeza que o arquivo tem permissão de leitura para o usuário do MySar. Valor padrão: /var/log/squid/access.log.</td>
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
            <td style="width: 70%; text-align: left;">Resolução de Nomes está: 
                <select name="thisValue">
                    <option value="enabled" {$optionEnabled}>Ativado</option>
                    <option value="disabled" {$optionDisabled}>Desativado</option>
                </select>
            </td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modificar"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">Se a sua rede possui um servidor DNS configurado internamente, MySar irá resolver os IPs das estações. Assim todos os Relatórios irão exibir o nome da Estação, invés do seu IP. Deixe este valor desabilitado se sua rede não possui um servidor DNS, pois isso irá degradar muito a performance do MySar, tentando resolver nomes. Valor padrão: Desabilitado.</td>
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
            <td style="width: 70%; text-align: left;">MySAR está 
                <select name="thisValue">
                    <option value="enabled" {$optionEnabled}>Ativado</option>
                    <option value="disabled" {$optionDisabled}>Desativado</option>
                </select>
            </td>
            <td style="width: 30%; text-align: center;"><input type="submit" name="submit" value="Modificar"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: justify;">Se por algum motivo você quer que o MySar pare de Importar os dados do Squid, Selecione esta opção. Valor padrão: Ativado.</td>
        </tr>
        </form>
        <tr>
            <td colspan="2"><hr size="1"></td>
        </tr>

        <tr>
            <td style="width: 70%; text-align: justify;">Clique nesse botão para apagar TODOS os dados coletados pelo MySar. Esta ação não tem volta. Use isto para resolver problemas, tipo relatórios não exibindo corretamente, ou corrupção dos dados nas tabelas da base. TENHA REALMENTE CERTEZA do que você está fazendo!</td>
            <td style="width: 30%; text-align: center;">
                <input type="submit" value="Apagar tudo" onClick="my_confirm('Você tem certeza que quer apagar TODOS os dados?!','{$pageVars.uri}&action=eraseAllStats')">
            </td>
        </tr>
    </table>
</div>
</center>
