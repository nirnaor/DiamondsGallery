{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />
{/block}
{block name=htmlcontent}
<form enctype="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <input type="text" name="jewelname" value="Jewel">
  <input type="file" name="mainimage" value="">
  <select name="shape" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>Round</option>
        <option>Circle</option>
        <option>Rectangle</option>
  </select>
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
  <textarea name="description" rows="5" cols="40"></textarea>
  <input type="text" name="depth" value="Jewel">
  <input type="text" name="Clarity" value="Clarity">
  <input type="text" name="Depth" value="Depth">
<p><input type="submit" name="submit" value="Continue &rarr;"></p>
</form>




{/block}
