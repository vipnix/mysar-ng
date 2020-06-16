<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 02:05:41
  from '/var/www/html/mysar/www-templates.pt_BR/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee8532596b2b5_31202270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5abe89099358fe9a75fea80d6b0329858177261f' => 
    array (
      0 => '/var/www/html/mysar/www-templates.pt_BR/header.tpl',
      1 => 1589572034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee8532596b2b5_31202270 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
  <head>
   <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso8859-1">//-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
	<?php echo '<script'; ?>
 src="bootstrap/js/jquery-1.11.3.min.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="bootstrap/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <title><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programName'];?>
 <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programVersion'];?>
</title>
    <link rel="stylesheet" href="dfl.css" type="text/css">
    
    <SCRIPT language="JavaScript"><!--
      function my_confirm(msg,go) {
        var where_to= confirm(msg);
        if (where_to== true) {
          window.location=go;
        }
      }
    //--></SCRIPT>
   
  </head>
    <body><center>
    <h1><?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programName'];?>
 <?php echo $_smarty_tpl->tpl_vars['pageVars']->value['programVersion'];?>
</h1>
    <p>[ <a href=".">Relat&oacute;rio Di&aacute;rio</a> | <a href="<?php echo $_SERVER['PHP_SELF'];?>
?a=administration">Administra&ccedil;&atilde;o</a> ]</p>
<?php }
}
