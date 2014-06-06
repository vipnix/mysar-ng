<?php /* Smarty version 2.6.10, created on 2013-05-03 15:10:03
         compiled from header.tpl */ ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $this->_tpl_vars['pageVars']['programName']; ?>
 <?php echo $this->_tpl_vars['pageVars']['programVersion']; ?>
</title>
    <link rel="stylesheet" href="dfl.css" type="text/css">
    <?php echo '
    <SCRIPT language="JavaScript"><!--
      function my_confirm(msg,go) {
        var where_to= confirm(msg);
        if (where_to== true) {
          window.location=go;
        }
      }
    //--></SCRIPT>
   '; ?>

  </head>
    <body><center>
    <h1><?php echo $this->_tpl_vars['pageVars']['programName']; ?>
 <?php echo $this->_tpl_vars['pageVars']['programVersion']; ?>
</h1>
    <p>[ <a href=".">Relat&oacute;rio Di&aacute;rio</a> | <a href="./?a=administration">Administra&ccedil;&atilde;o</a> ]</p>