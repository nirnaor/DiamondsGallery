{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />
{/block}
{block name=htmlcontent}
<form enctpye="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <input type="text" name="jewelname" value="Jewel">
  <select name="shape" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>Round</option>
        <option>Circle</option>
        <option>Rectangle</option>
  </select>
  <textarea name="description" rows="5" cols="40"></textarea>
  <input type="text" name="depth" value="Jewel">
  <input type="text" name="Clarity" value="Clarity">
  <input type="text" name="Depth" value="Depth">
<p><input type="submit" name="submit" value="Continue &rarr;"></p>
</form>




{/block}
