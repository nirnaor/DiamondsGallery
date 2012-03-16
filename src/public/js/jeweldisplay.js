$(document).ready(function () {

  function fillMetadata(){
    $('#description').text(window.jewelDetails[0]['desc']);
    $('#clarity').text(window.jewelDetails[0]['clarity']);
    $('#weight').text(window.jewelDetails[0]['weight'] + ' kt');
    $('#cut').text(window.jewelDetails[0]['cut']);

    var metalText = window.jewelDetails[0]['metalColor'] + 
      ' ' + window.jewelDetails[0]['metalWeight'] + ' kt';
    $('#metal').text(metalText);
  }
  

  function addBirthImages(flowToAdd) {
        $('#birth img').remove();
        var birthArray = window.jewelDetails[0]['birthImagesPaths']; 
        for (var i = 0; i < birthArray.length; i++) {
            var path = birthArray[i];
            console.log('path : ' + path);
            var jewelName = window.jewelDetails[0]['jewelName'];
            var newImage = createNewImage(path, jewelName);
            $('#birth').append(newImage);
        }
    }

    function createNewImage(path, caption) {
        var result = document.createElement('img');
        result.setAttribute('src', path);
        return result;
    }

  
  function setImages(){
    /*$('#mainImage img').remove();
    var mainImage = createNewImage(window.jewelDetails[0]['mainImagePath'],'nirnaor');
    $('#mainImage').append(mainImage);*/
    $('#mainimage').attr('src',window.jewelDetails[0]['mainImagePath']);
    addBirthImages();

  }
  fillMetadata();
  setImages();
                      
});
