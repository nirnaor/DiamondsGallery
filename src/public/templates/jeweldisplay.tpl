{extends file="master.tpl"}
{block name=scriptsandlinks}
      <link type="text/css" rel="Stylesheet" href="../css/jeweldisplay.css" />
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
              <dt>lectus:</dt>
                <dd>consectetur</dd>
              <dt>iaculis:</dt>
                <dd>ectus</dd>
            </dl>
            <dt>lectus:</dt>
              <dd>consectetur </dd>
            <dt>iaculis:</dt>
              <dd>ectus </dd>
        </div>

        <div id="emptydiv"></div>

          <div id="birth">
           <img src="../images/butterfly/butterfly3.jpg" />
           <img src="../images/butterfly/butterfly8.jpg" />
           <img src="../images/butterfly/butterfly2.jpg" />
           <img src="../images/butterfly/butterfly12.jpg" />
           <img src="../images/butterfly/butterfly7.jpg" />
          </div>


{/block}
