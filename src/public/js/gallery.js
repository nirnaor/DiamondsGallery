var myNewFlow = null;

$(document).ready(function () {
    
    initGalleryFlow();
    printImagesArray();

    function printImagesArray(){
      console.log('this is the array from the server');
      console.log(window.gallery_files);
    }

    function initGalleryFlow() {
        if(Modernizr.touch){
          buildSlider();  
        }
        else{
          buildContentFlow();
        }
    }


    function buildContentFlow(){
      var flowDiv = $('#galleryflow')[0];
      if (myNewFlow == null) {
          myNewFlow = new ContentFlow(flowDiv,
              {
                onclickActiveItem: function (item) {
                      var jewelName = item.caption.innerHTML;
                      var url = "../php/jeweldisplay.php?name=" + jewelName;    
                      window.location = url; 
                    }
              }
          );
      }

      myNewFlow.init();

      var allImages = getImagesArray();
      for (var i = 0; i < allImages.length; i++) {
        myNewFlow.addItem(allImages[i], 'last');
      };
    }

    function buildSlider(){
      var ul = $('#slider ul');
      var sliderlist= $('#slider ul')[0];

      var allImages = getImagesArray();
      for (var i = 0; i < allImages.length; i++) {
        var img = allImages[i];
        console.log("img = " + img);

        var li = $('<li>').appendTo(ul);
        console.log(li);
        console.log(ul);

        var a = $('<a>').attr({
          href: "../php/jeweldisplay.php?name=" + img.title }).appendTo(li);
        a.append(img);
      }

      window.slider = new Swipe($('#slider')[0]);
    }
    function getImagesArray() {
      var imagesArray = new Array();
      
        for (var i = 0; i < window.gallery_files.length; i++) {
            var path = window.gallery_files[i]['mainImagePath'];
            var jewelName = window.gallery_files[i]['jewelName'];
            console.log('path : ' + path);
            var newImage = createNewImage(path, jewelName);
            imagesArray.push(newImage);
        }
      return imagesArray;
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


});
