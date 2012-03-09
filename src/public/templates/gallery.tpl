{extends file="master.tpl"}
{block name=scriptsandlinks}
    <script language="JavaScript" type="text/javascript" src="../js/gallery.js"></script>



   <script type="text/javascript">
   window.gallery_files = {$imagesArray}
  </script>




    <link type="text/css" rel="Stylesheet" href="../css/gallery.css" />
    <script language="JavaScript" type="text/javascript" src="../js/contentflow.js"></script>
    <link type="text/css" rel="Stylesheet" href="../css/contentflow_src.css" />

{/block}
{block name=htmlcontent}
                <div id="galleryflow">
                    <div class="loadIndicator"><div class="indicator"></div></div>
                    <div id="imagescontainer" class="flow">
                    </div>
                    <div class="globalCaption"></div>
                    <div class="scrollbar"><div class="slider"><div class="position"></div></div></div>    
                 </div>
{/block}
