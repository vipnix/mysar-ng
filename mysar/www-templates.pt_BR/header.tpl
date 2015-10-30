<html>
  <head>
   <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso8859-1">//-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap/js/jquery-1.11.3.min.js" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <title>{$pageVars.programName} {$pageVars.programVersion}</title>
    <link rel="stylesheet" href="dfl.css" type="text/css">
    {literal}
    <SCRIPT language="JavaScript"><!--
      function my_confirm(msg,go) {
        var where_to= confirm(msg);
        if (where_to== true) {
          window.location=go;
        }
      }
    //--></SCRIPT>
   {/literal}
  </head>
    <body><center>
    <h1>{$pageVars.programName} {$pageVars.programVersion}</h1>
    <p>[ <a href=".">Relat&oacute;rio Di&aacute;rio</a> | <a href="{$smarty.server.PHP_SELF}?a=administration">Administra&ccedil;&atilde;o</a> ]</p>
