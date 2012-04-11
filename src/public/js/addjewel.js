$(document).ready(function () {

$('[name="jewelname"]').attr('value','nir')
$('[name="description"]')
  function fillMetadata(){
    $('[name="jewelname"]').attr('value',window.jewelDetails[0]['jewelName']);
    $('[name="description"]').html(window.jewelDetails[0]['desc']);
    $('[name="category"]').attr('value',window.jewelDetails[0]['category']);





    $('[name="jewelname"]').text();
    $('#clarity').text(window.jewelDetails[0]['clarity']);
    $('#weight').text(window.jewelDetails[0]['weight'] + ' kt');
    $('#cut').text(window.jewelDetails[0]['cut']);

    var metalText = window.jewelDetails[0]['metalColor'] + 
      ' ' + window.jewelDetails[0]['metalWeight'] + ' kt';
    $('#metal').text(metalText);
  }
  

  fillMetadata();
                      
});
