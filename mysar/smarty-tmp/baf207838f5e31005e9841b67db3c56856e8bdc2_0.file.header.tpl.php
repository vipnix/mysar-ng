<?php
/* Smarty version 3.1.34-dev-7, created on 2025-04-28 05:37:02
  from '/srv/www/htdocs/mysar/www-templates.pt_BR/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_680f3e2ef002a5_10892863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baf207838f5e31005e9841b67db3c56856e8bdc2' => 
    array (
      0 => '/srv/www/htdocs/mysar/www-templates.pt_BR/header.tpl',
      1 => 1745829295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_680f3e2ef002a5_10892863 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <style>
    .wrapper {
      width: 100%;
      max-width: 950px;
      margin: auto;
      background-color: #d6e4f0;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
      font-size: 13px;
      background-color: #ffffff;
    }

    th, td {
      padding: 6px 8px;
      text-align: center;
      border-bottom: 1px solid #ccc;
    }

    thead th {
      background-color: #d6e4f0;
      color: #000;
      white-space: nowrap;
    }

    tr:nth-child(even) {
      background-color: #f2f6fc;
    }

    tr:nth-child(odd) {
      background-color: #ffffff;
    }

    tr:hover {
      background-color: #cce5ff;
    }

    .footer-table {
      margin-top: 1rem;
      width: 100%;
      font-size: 12px;
      color: #333;
      text-align: center;
    }

    .sortable-header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 4px;
    }

    .sortable-header img {
      width: 10px;
      height: 10px;
    }
  </style>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programName'];?>
 <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programVersion'];?>
</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
  <?php echo '<script'; ?>
 src="bootstrap/js/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="dfl.css" type="text/css">

  
  <?php echo '<script'; ?>
 language="JavaScript">
    function my_confirm(msg, go) {
      if (confirm(msg)) {
        window.location = go;
      }
    }
  <?php echo '</script'; ?>
>
  
</head>

<body>
  <div class="wrapper">
    <center>
      <h1><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programName'];?>
 <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programVersion'];?>
</h1>
      <p>
        [
        <a href=".">Relatório Diário</a>
        |
        <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=administration">Administração</a>
        ]
      </p>
    </center>
<?php }
}
