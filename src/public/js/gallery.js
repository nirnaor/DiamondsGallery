var myNewFlow = null;

$(document).ready(function () {
    
    function pageIsGallery(){
      // If this is admin page we would like to show the gallery
      // only after the admin says that he would like to edit/delete 
      // a certain jewel
      return location.href.indexOf("category") !=-1;
    }
    if(pageIsGallery()){
      initGalleryFlow();
      printImagesArray();
    }

    function printImagesArray(){
      console.log('this is the array from the server');
      console.log(window.gallery_files);
    }

    function initGalleryFlow() {
        if(Modernizr.touch){
          buildSlider();  
        }
        else{
          window.setTimeout(buildContentFlow, 200);
          //buildContentFlow();
        }
    }


    function buildContentFlow(){
      var flowDiv = $('#galleryflow')[0];

      var allImages = getImagesArray();

      window.onAllImagesLoaded = function() {

        var myNewFlow = new ContentFlow(flowDiv,
            {
              onclickActiveItem: function (item) {
                    var jewelName = item.caption.innerHTML;
                    var url = "../php/jeweldisplay.php?name=" + jewelName;    
                    window.location = url; 
                  }
            }
        );

        myNewFlow.init();
        for (var i = 0; i < allImages.length; i++) {
          myNewFlow.addItem(allImages[i], 'last');
        };
      }

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

    window.imagesLeftToLoad = window.gallery_files.length;
    function notifyImageLoaded() {
      window.imagesLeftToLoad--;
      console.log("images left to load: " + window.imagesLeftToLoad);
      if (window.imagesLeftToLoad <= 0) {
        window.onAllImagesLoaded();
      }
    }

    function getImagesArray() {
      var imagesArray = new Array();
      
        for (var i = 0; i < window.gallery_files.length; i++) {
            var path = window.gallery_files[i]['mainImagePath'];
            var jewelName = window.gallery_files[i]['jewelName'];
            console.log('path : ' + path);
            var newImage = createNewImage(path, jewelName);
            imagesArray.push(newImage);
            newImage.onload = notifyImageLoaded;
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
