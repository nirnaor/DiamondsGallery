$(document).ready(function () {
  $(function() {
       $("input:file").change(function (){
         var fileName = $(this).val();
         if(fileName.lastIndexOf(".jpg")==-1 || 
            fileName.lastIndexOf(".jpeg")==-1){
           addErrorMessageById($(this).attr('id'),
                               "can only upload jpg or jpef files");
         }
       });
    });
  function addErrorMessageById(elementid,errormessage){
    $("#" + elementid).parent().children('.error').html(errormessage);
    $("#" + elementid).parent().children('.error').css('display','inline');
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

  function validateMainImage(elementid){
     console.log('validating main image');
     var fileName = $("#" +elementid).val();
     if(fileName.lastIndexOf(".jpg")==-1 && 
        fileName.lastIndexOf(".jpeg")==-1){
       addErrorMessageById(elementid, "can only upload jpg or jpef files");
     }
  };





  function validateInput(elementid){
    switch(elementid) {
      case 'jewelname':
        validateName(elementid)
        break;
      case 'mainimage':
        validateMainImage(elementid)
        break;
      
      default:
        // code
    }

  };
  function makeElementActive(element){
    // removing the error message from the previous input
    previousActiveElement = $('.active').children('select, input, textarea')
    removeErrorMessage(previousActiveElement.attr('id'));

    // validating the previous active element again (to see if the error has changed)
    validateInput(previousActiveElement.attr('id'));
    $(".active").removeClass("active")

		element.parent().addClass("active")
  };

  $(".input").focus(function() {
    makeElementActive($(this));
	});

  $('.input').mouseenter(function() {
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
