{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />
    <script language="JavaScript" type="text/javascript" src="../js/addjewel.js"></script>
      <script type="text/javascript">
        window.jewelDetails= {$jewelDetails}
      </script>
{/block}
{block name=htmlcontent}
<form id="jewelform" enctype="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <div class="active">
    <label for="Jewel Name">Jewel Name</label>
    <input type="text" class="input" name="jewelname" value="" id="jewelname">
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div >
    <label for="Jewel Name">Primary Image File:</label>
    <input type="file" class="input" name="mainimage" value=""id="mainimage"/>
    <label class="error" for="name"></label>
  </div>
  <div>
    <label for="Jewel Name">Category:</label>
    <select name="category" class="input" id="category">
          <option>Rings</option>
          <option>Earings</option>
          <option>Bracelets</option>
          <option>Necklaces</option>
    </select>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Description:</label>
  <textarea name="description" class="input" id="description" rows="5" cols="50">
  </textarea>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Metal Color:</label>
    <select name="metalcolor" id="metalcolor" class="input" >
          <option>Gold</option>
          <option>Silver</option>
          <option>Platinum</option>
    </select>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Metal weight:</label>
  <select name="metalweight" id="metalweight" class="input" >
        <option>14</option>
        <option>18</option>
        <option>22</option>
  </select>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Weight:</label>
    <input type="text" name="weight" value="" class="input" id="weight">
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Clarity:</label>
    <select name="clarity" id="clarity" class="input" >
          <option>Flawless</option>
          <option>ws1</option>
          <option>ws2</option>
          <option>vs1</option>
          <option>vs2</option>
          <option>si1</option>
         <option>si2</option>
          <option>si3</option>
    </select>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Cut:</label>
    <select name="cut" class="input" id="cut">
          <option>round</option>
          <option>oval</option>
          <option>peer</option>
          <option>heart</option>
          <option>asher</option>
          <option>emrald</option>
          <option>marquise</option>
          <option>radiant</option>
    </select>
    <label class="error" for="name">Field cannot be empty</label>
  </div>
  <div>
    <label for="Jewel Name">Birth Image Set:</label>
    <input type="file" class="input" name="birth[]" id="birth" multiple="" value="">
    <label class="error" for="name">Field cannot be empty</label>
  </div>


<p><input type="submit" name="submit" value="Continue &rarr;"></p>
<p><input type="button" name="deletejewel" style="display:none" value="Delete The Jewel"></p>
<p><input type="text" name="jewelid" style="display:none" ></p>
</form>




{/block}
