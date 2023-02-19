<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pageVars.programName} {$pageVars.programVersion}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="dfl.css" type="text/css">

    {literal}
    <script language="JavaScript"><!--
      function my_confirm(msg,go) {
        var where_to= confirm(msg);
        if (where_to== true) {
          window.location=go;
        }
      }
    //--></script>
    {/literal}
  </head>
  <body>
    <center>
      <h1>{$pageVars.programName} {$pageVars.programVersion}</h1>
      <p>
        [
        <a href=".">Relatório Diário</a>
        |
        <a href="{$smarty.server.PHP_SELF}?a=administration">Administração</a>
        ]
      </p>

