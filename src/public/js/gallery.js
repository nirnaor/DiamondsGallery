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
            myNewFlow = new ContentFlow(flowDiv,
                {
                  onclickActiveItem: function (item) {
                        console.log('2pac rules');
                      },
                }
            );
            myNewFlow.init();
            addPictuesToFlow(myNewFlow);
        }
    }

    function addPictuesToFlow(flowToAdd) {
      
        for (var i = 0; i < window.gallery_files.length; i++) {
            var path = window.gallery_files[i]['mainImage'];
            console.log('path : ' + path);
            var newImage = createNewImage(path, 'picture ' + i);
            myNewFlow.addItem(newImage, 'last');
        }
    }

    function createNewImage(path, caption) {
        var result = document.createElement('img');
        result.setAttribute('src', path);
        result.setAttribute('class', 'nir');
        result.setAttribute('title', caption);
        return result;
    }

  function activeClicked()
  {
      console.log('active item clicked');
  }

   $('.active.item').click(function(){
      console.log('active item clicked');
      return false;
   });

});
