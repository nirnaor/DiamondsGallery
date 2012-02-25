<?php /*%%SmartyHeaderCode:251134f48ff4cae07f7-32694128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8b037a9f7713792d5f196564dfd573ab59064f' => 
    array (
      0 => '../templates\\gallery.tpl',
      1 => 1330185645,
      2 => 'file',
    ),
    'ee4186df630c936001c077ec9e0190a9a58c0484' => 
    array (
      0 => '../templates\\master.tpl',
      1 => 1330185379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251134f48ff4cae07f7-32694128',
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f4905afb77112_03417212',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4905afb77112_03417212')) {function content_4f4905afb77112_03417212($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Kre8tive Collection</title>
    <link rel="Shortcut Icon" href="../images/diamondskullnoback.ico" />
    <link type="text/css" rel="Stylesheet" href="../css/default.css" />
    <script language="JavaScript" type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Eater|Fredericka+the+Great|Just+Me+Again+Down+Here|Asul|Amaranth' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Bilbo+Swash+Caps|Merienda+One' rel='stylesheet' type='text/css'>
   
    <script language="JavaScript" type="text/javascript" src="../js/gallery.js"></script>
    <link type="text/css" rel="Stylesheet" href="../css/gallery.css" />
    <script language="JavaScript" type="text/javascript" src="../js/contentflow.js"></script>
    <link type="text/css" rel="Stylesheet" href="../css/contentflow_src.css" />


</head>
<body>
    <div id="main">
        <div id="logoandmenu">
        <div id="banner">
              <img src="../images/blacklogo.gif" alt="skull" />
            </div>
            <div id="menu">
                <ul id="menulist">
                    <li><a href="gallery.html">Rings</a> </li>
                    <li><a href="gallery.html">Necklaces</a> </li>
                    <li><a href="contactus.html">Bracelets</a> </li>
                    <li><a href="contactus.html">Earings</a> </li>
                    <li><a href="about.html">Contact Us</a> </li>
                </ul>
            </div>
            
            
        </div>
        <div id="content">
        
        
                <div id="galleryflow">
                    <div class="loadIndicator"><div class="indicator"></div></div>
                    <div id="imagescontainer" class="flow">
                    </div>
                    <div class="globalCaption"></div>
                    <div class="scrollbar"><div class="slider"><div class="position"></div></div></div>    
                 </div>

            
        </div>
        <div id="footer">
            <h1>
                "Seize the day, I heard him say"
            </h1>
        </div>
    </div>
</body>
</html>
<?php }} ?>