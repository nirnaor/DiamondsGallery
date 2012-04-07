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
        result.setAttribute('class', 'birthpicture');
        return result;
    }

  
  function setImages(){
    console.log('will now fill the main image : ' + window.jewelDetails[0]['mainImagePath']);
    $('#mainimage').attr('src',window.jewelDetails[0]['mainImagePath']);
    addBirthImages();

  }
  fillMetadata();
  setImages();
                      
});
