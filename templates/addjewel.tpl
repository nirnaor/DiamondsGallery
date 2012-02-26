{extends file="master.tpl"}
{block name=scriptsandlinks}
    <link type="text/css" rel="Stylesheet" href="../css/addjewel.css" />
{/block}
{block name=htmlcontent}
<form enctpye="multipart/form-data" action="addjewel_submit.php" method="post" accept-charset="utf-8">
  <input type="file" id="screenshot" name="screenshot" />
  
  <input type="text" name="jewelname" value="Jewel">

  <select name="category" onchange="combo(this, 'theinput')" onmouseout="comboInit(this, 'theinput')">
        <option>one</option>
        <option>two</option>
        <option>three</option>
  </select>
      
  <textarea name="description" rows="5" cols="40"></textarea>

  <input type="text" name="depth" value="Jewel">
  <input type="text" name="Clarity" value="Clarity">
  <input type="text" name="Depth" value="Depth">
<p><input type="submit" name="submit" value="Continue &rarr;"></p>
</form>
{/block}
