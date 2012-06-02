$(document).ready(function () {
  function addErrorMessageById(elementid,errormessage){
    $('#jewelname').parent().children('.error').html().replace(errormessage)
    $("#" + elementid).parent().children('.error').css('display','inline')
  };

  function removeErrorMessage(elementid){
    $("#" + elementid).parent().children('.error').html().replace('');
    $("#" + elementid).parent().children('.error').css('display','none')
  };

  function validateName(elementid){
    if ($("#" + elementid).val() == "")
      addErrorMessageById(elementid);
    else
      removeErrorMessage(elementid);
  };
  function validateInput(elementid){
        console.log(elementid);
    switch(elementid) {
      case 'jewelname':
        validateName(elementid)
        break;
      
      default:
        // code
    }

  };
  function makeElementActive(element){
    previousActiveElement = $('.active').children('select, input, textarea')
    validateInput(previousActiveElement.attr('id'));

    $(".active").removeClass("active")
		element.parent().addClass("active")
  };

  $("input").focus(function() {
    makeElementActive($(this));
	});

  $("select").focus(function() {
    makeElementActive($(this));
	});

  $("textarea").focus(function() {
    makeElementActive($(this));
	});

  $('input:file').mouseenter(function() {
    makeElementActive($(this));
	});




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
