var myNewFlow = null;

$(document).ready(function () {
    
    initGalleryFlow();
    printImagesArray();

    function printImagesArray(){
      console.log('this is the array from the server');
      console.log(window.gallery_files);
    }

    function initGalleryFlow() {
        var flowDiv = $('#galleryflow')[0];

        if (myNewFlow == null) {
            myNewFlow = new ContentFlow(flowDiv);
            myNewFlow.init();
            addPictuesToFlow(myNewFlow);
        }
    }

    function addPictuesToFlow(flowToAdd) {
        for (var i = 1; i <= 6; i++) {
            var path = '../images/diamonds/transparent/trans' + i + '.gif';
            var newImage = createNewImage(path, 'picture ' + i);
            myNewFlow.addItem(newImage, 'last');
        }
    }

    function createNewImage(path, caption) {
        var result = document.createElement('img');
        result.setAttribute('src', path);
        result.setAttribute('title', caption);
        return result;
    }

});
