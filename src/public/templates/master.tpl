<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title>Kre8tive Collection</title>
    <link rel="Shortcut Icon" href="../images/diamondskullnoback.ico" />
    <link type="text/css" rel="Stylesheet" href="../css/default.css" />
    <script language="JavaScript" type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Eater|Fredericka+the+Great|Just+Me+Again+Down+Here|Asul|Amaranth' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Bilbo+Swash+Caps|Merienda+One' rel='stylesheet' type='text/css'>
   {block name=scriptsandlinks}{/block}
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
                    <li class="gallerymenuitem"><a id="rings" href="gallery.php?category=rings">Rings</a> </li>
                    <li class="gallerymenuitem"><a id="necklaces" href="gallery.php?category=necklaces">Necklaces</a> </li>
                    <li class="gallerymenuitem"><a id="bracelets" href="gallery.php?category=bracelets">Bracelets</a> </li>
                    <li class="gallerymenuitem"><a id="earings" href="gallery.php?category=earings">Earings</a> </li>
                    <li><a href="about.php">About</a> </li>
                </ul>
            </div>
            
            
        </div>
        <div id="content">
        
        {block name=htmlcontent}{/block}
            
        </div>
        <div id="footer">
            <h1>
                "Seize the day, I heard him say"
            </h1>
        </div>
    </div>
</body>
</html>
