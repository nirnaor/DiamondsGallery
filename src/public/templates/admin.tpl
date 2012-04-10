{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/admin.css" />
    
    <script language="JavaScript" type="text/javascript" src="../js/gallery.js"></script>
    <script type="text/javascript">
      window.gallery_files = {$imagesArray}
    </script>
    <script language="JavaScript" type="text/javascript" src="../js/contentflow.js"></script>
    <link type="text/css" rel="Stylesheet" href="../css/contentflow_src.css" />
    <script language="JavaScript" type="text/javascript" src="../js/modernizr.js"></script>
    <script language="JavaScript" type="text/javascript" src="../js/swipe.js"></script>
{/block}
{block name=htmlcontent}
<h1 class="title">What would you like to do ??</h1>
<a href="addjewel.php"><h1 class="action">Add a jewel</h1></a>
<a href="editjewel.php"><h1 class="action">Edit/delete a jewel a jewel</h1></a>

<div id="imagesToEditOrDelete">
  <div id="galleryflow">
      <div class="loadIndicator"><div class="indicator"></div></div>
      <div id="imagescontainer" class="flow">
      </div>
      <div class="globalCaption"></div>
   </div>


  <div id='slider'>
    <ul>
    </ul>
  </div>
</div>

{/block}
