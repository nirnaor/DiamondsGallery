{extends file="master.tpl"}
{block name=scriptsandlinks}
      <link type="text/css" rel="Stylesheet" href="../css/jeweldisplay.css" />
      <script language="JavaScript" type="text/javascript" src="../js/jquery.cross-slide.min.js"></script>
      <script language="JavaScript" type="text/javascript" src="../js/jeweldisplay.js"></script>
      <script type="text/javascript">
        window.jewelDetails= {$jewelDetails}
      </script>
{/block}
{block name=htmlcontent}

           <img id="mainimage" src="../images/butterfly/butterfly5.jpg" />

          <div id="description">
            <p>Ut euismod tempus elementum. Donec hendrerit, nisi vel elementum viverra, nisi metus pulvinar eni
            m, eleifend fermentum lorem libero non lorem. Vestibulum ante 
            ipsum primis in faucibus</p>
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
