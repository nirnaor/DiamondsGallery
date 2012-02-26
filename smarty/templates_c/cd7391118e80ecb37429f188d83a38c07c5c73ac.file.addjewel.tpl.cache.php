<?php /* Smarty version Smarty-3.1.8, created on 2012-02-26 19:42:16
         compiled from "../templates\addjewel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110904f4a8b1830ae36-43895392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd7391118e80ecb37429f188d83a38c07c5c73ac' => 
    array (
      0 => '../templates\\addjewel.tpl',
      1 => 1330284383,
      2 => 'file',
    ),
    'ee4186df630c936001c077ec9e0190a9a58c0484' => 
    array (
      0 => '../templates\\master.tpl',
      1 => 1330190038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110904f4a8b1830ae36-43895392',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f4a8b183809d7_17523563',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4a8b183809d7_17523563')) {function content_4f4a8b183809d7_17523563($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Kre8tive Collection</title>
    <link rel="Shortcut Icon" href="../images/diamondskullnoback.ico" />
    <link type="text/css" rel="Stylesheet" href="../css/default.css" />
    <script language="JavaScript" type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Eater|Fredericka+the+Great|Just+Me+Again+Down+Here|Asul|Amaranth' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Bilbo+Swash+Caps|Merienda+One' rel='stylesheet' type='text/css'>
   
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />

</head>
<body>
    <div id="main">
        <div id="logoandmenu">
        <div id="banner">
              <a href="home.php">
              <img src="../images/blacklogo.gif" alt="skull" />
              </a>
            </div>
            <div id="menu">
                <ul id="menulist">
                    <li><a href="gallery.php">Rings</a> </li>
                    <li><a href="gallery.php">Necklaces</a> </li>
                    <li><a href="gallery.php">Bracelets</a> </li>
                    <li><a href="gallery.php">Earings</a> </li>
                    <li><a href="about.php">About</a> </li>
                </ul>
            </div>
            
            
        </div>
        <div id="content">
        
        
<form enctpye="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <input type="file" id="screenshot" name="screenshot" />
  
  <input type="text" name="jewelname" value="Jewel">

  <select name="category" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>one</option>
        <option>two</option>
        <option>three</option>
  </select>
      
  <textarea name="description" rows="5" cols="40"></textarea>

  <input type="text" name="depth" value="Jewel">
  <input type="text" name="Clarity" value="Clarity">
  <input type="text" name="Depth" value="Depth">
<p><input type="submit" name="submit" value="Continue &rarr;"></p>
</form>

            
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