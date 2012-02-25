<?php /* Smarty version Smarty-3.1.8, created on 2012-02-25 14:56:30
         compiled from "templates\gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40214f48f69e3085b3-13913328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c976a9fe1e4e4a88085d7b375ac80c57d262de39' => 
    array (
      0 => 'templates\\gallery.tpl',
      1 => 1330181728,
      2 => 'file',
    ),
    'f90be83b235fb03cc225b11607032e9ddd415899' => 
    array (
      0 => 'templates\\index.tpl',
      1 => 1330181172,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40214f48f69e3085b3-13913328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f48f69e3c2fd2_36403298',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f48f69e3c2fd2_36403298')) {function content_4f48f69e3c2fd2_36403298($_smarty_tpl) {?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</title>
  </head>
  <body>
     <div id="content">
       <h1 id="heading">this is the content in index.tpl</h1>  
        My HTML Page Body goes here 
<div id="gallery">
   <h1 id="heading">this is the heading of the gallery</h1>
   <p>this is some paragraph in the gallery</p>
   
</div>

     </div>
  </body>
</html>
<?php }} ?>