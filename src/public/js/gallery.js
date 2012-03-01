var myNewFlow = null;

$(document).ready(function () {
    
    initGalleryFlow();
    
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