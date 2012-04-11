$(document).ready(function () {

  function fillMetadata(){
    $('[name="jewelname"]').attr('value',window.jewelDetails[0]['jewelName']);
    $('[name="description"]').html(window.jewelDetails[0]['desc']);
    $('[name="category"]').attr('value',window.jewelDetails[0]['category']);
    $('[name="metalcolor"]').attr('value',window.jewelDetails[0]['metalColor']);
    $('[name="metalweight"]').attr('value',window.jewelDetails[0]['metalWeight']);
    $('[name="weight"]').attr('value',window.jewelDetails[0]['weight']);
    $('[name="clarity"]').attr('value',window.jewelDetails[0]['clarity']);
    $('[name="cut"]').attr('value',window.jewelDetails[0]['cut']);
    $('[name="jewelid"]').attr('value',window.jewelDetails[0]['jewelId']);
  }
  

  if(window.jewelDetails != null){
    if(window.jewelDetails[0] != null){
      fillMetadata();
//      $('#jewelform').attr("method","put");
      $('[name="deletejewel"]').attr('style','display:show');
    }
  }
});
