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
  

  function addPictuesToFlow(flowToAdd) {
        for (var i = 0; i < window.jewelDetails[0]['birthPathes'].length; i++) {
            var path = window.jewelDetails[0]['birthPathes'];
            console.log('path : ' + path);
            var newImage = createNewImage(path, jewelName);
            myNewFlow.addItem(newImage, 'last');
        }
    }

    function createNewImage(path, caption) {
        var result = document.createElement('img');
        result.setAttribute('src', path);
        return result;
    }

  
  function setImages(){
    $('#mainimage').attr('src',window.jewelDetails[0]['mainImage']);

  }
  fillMetadata();
  setImages();
                      
});
