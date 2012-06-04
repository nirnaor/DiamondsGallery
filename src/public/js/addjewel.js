$(document).ready(function () {
  function addErrorMessageById(elementid,errormessage){
    $("#" + elementid).parent().children('.error').html(errormessage);
    $("#" + elementid).parent().children('.error').css('display','inline');
  };

  function removeErrorMessage(elementid){
    $("#" + elementid).parent().children('.error').html().replace('');
    $("#" + elementid).parent().children('.error').css('display','none')
  };

  function validateTextField(elementid){
    if ($("#" + elementid).val() == "")
      addErrorMessageById(elementid);
    else
      removeErrorMessage(elementid);
  };
  
  function fileIsNotSupported(fileName){
    return (fileName.lastIndexOf(".jpg")==-1 && 
        fileName.lastIndexOf(".jpeg")==-1)
  };

  function validateMainImage(elementid){
     console.log('validating main image');
     var fileName = $("#" +elementid).val();
     if(fileIsNotSupported(fileName))
       addErrorMessageById(elementid, "can only upload jpg or jpef files");
     else
       removeErrorMessage(elementid);
  };

  function validateBirthImageSet(elementid){
     console.log('validating main image');
     var fileName = $("#" +elementid).val();
     console.log('this is fileName' + fileName);
     var allFilesAreGood = true;
     for (var i = 0; i < filenName.length; i += 1) {
         if(fileIsNotSupported(fileName)){
           addErrorMessageById(elementid, "can only upload jpg or jpef files");
           allFilesAreGood = false;
         }
       };
       if (allFilesAreGood)
         removeErrorMessage(elementid);
  };
  function validateInput(elementid){
    switch(elementid) {
      case 'jewelname':
        validateTextField(elementid)
        break;
      case 'mainimage':
        validateMainImage(elementid)
        break;
      case 'description':
        validateTextField(elementid)
        break;
      case 'birth':
        validateBirthImageSet(elementid)
        break;
      
      
      default:
        // code
    }

  };
  function makeElementActive(element){
    // revalidating the old active element
    previousActiveElement = $('.active').children('select, input, textarea')
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

   $('#jewelform').submit(function(){
      $('input[type=submit]', this).attr('disabled', 'disabled');
  }); 

  if(window.jewelDetails != null){
    if(window.jewelDetails[0] != null){
      fillMetadata();
//      $('#jewelform').attr("method","put");
      $('[name="deletejewel"]').attr('style','display:show');
    }
  }
});
