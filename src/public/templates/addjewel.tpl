{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />
{/block}
{block name=htmlcontent}
<form enctype="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <input type="text" name="jewelname" value="Jewel">
  <input type="file" name="mainimage" value="">
  <select name="metalcolor" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>Gold</option>
        <option>Silver</option>
        <option>Platinum</option>
  </select>
  <select name="metalweight" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>14</option>
        <option>18</option>
        <option>22</option>
  </select>
  <input type="text" name="weight" value="">
  <select name="clarity" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>Flawless</option>
        <option>ws1</option>
        <option>ws2</option>
        <option>vs1</option>
        <option>vs2</option>
        <option>si1</option>
        <option>si2</option>
        <option>si3</option>
  </select>
  <select name="cut" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>round</option>
        <option>oval</option>
        <option>peer</option>
        <option>heart</option>
        <option>asher</option>
        <option>emrald</option>
        <option>marquise</option>
        <option>radiant</option>
  </select>

<p><input type="submit" name="submit" value="Continue &rarr;"></p>
</form>




{/block}