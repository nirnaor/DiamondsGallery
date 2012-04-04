{extends file="master.tpl"}
{block name=scriptsandlinks}
      <link type="text/css" rel="Stylesheet" href="../css/jeweldisplay.css" />
      <script language="JavaScript" type="text/javascript" src="../js/jquery.cross-slide.min.js"></script>
      <script language="JavaScript" type="text/javascript" src="../js/jeweldisplay.js"></script>
      <script type="text/javascript">
        window.jewelDetails= {$jewelDetails}
      </script>

      <!--[if lte IE 8]>
        <link rel="stylesheet" type="text/css" href="../css/ie8-and-down.css" />
      <![endif]-->

{/block}
{block name=htmlcontent}


          <img id="mainimage" alt="nirnaor" src=""/>
          <div id="description">
            <p></p>
          </div>

          <div id="details">
            <dl>
              <dt>Clarity:</dt>
                <dd id="clarity">consectetur</dd>
              <dt>Weight:</dt>
                <dd id="weight">ectus</dd>
            </dl>
            <dt>Cut:</dt>
              <dd id="cut">consectetur </dd>
            <dt>Metal:</dt>
              <dd id="metal">ectus </dd>
        </div>

        <div id="emptydiv"></div>

          <div id="birth">
          </div>


{/block}
