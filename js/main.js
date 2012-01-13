$(document).ready(function () {

    showHomeAndHideOtherDivs();

    function showHomeAndHideOtherDivs() {
        $('#gallery').hide();
        $('#home').addClass('activediv');
    }



    $('#slidinggallery').crossSlide({
        fade: 1
    }, [
  {
      src: 'diamond1.jpg',
      alt: 'Sand Castle',
      from: '100% 80% 1x',
      to: '100% 0% 1.7x',
      time: 3
  }, {
      src: 'diamond2.jpg',
      alt: 'Sunflower',
      from: 'top left',
      to: 'bottom right 1.5x',
      time: 2
  }, {
      src: 'diamond3.jpg',
      alt: 'Flip Flops',
      from: '100% 80% 1.5x',
      to: '80% 0% 1.1x',
      time: 2
  }, {
      src: 'diamond4.jpg',
      alt: 'Rubber Ring',
      from: '100% 50%',
      to: '30% 50% 1.5x',
      time: 2
  }
], function (idx, img, idxOut, imgOut) {
    if (idxOut == undefined) {
        // starting single image phase, put up caption
        $('#slidinggallery.caption').text(img.alt).animate({ opacity: .7 })
    }
    else {
        // starting cross-fade phase, take out caption
        $('#slidinggallery.caption').fadeOut()
    }
});


    $('#menu a').click(function (e) {
        var divToShow = $(this).data('address');
        console.log('will now display the ' + divToShow);
        $('.activediv').hide();
        $('.activediv').removeClass('activediv');
        $('#' + divToShow).addClass('activediv');
        $('.activediv').show();

        if (divToShow == 'gallery') {
            initGalleryFlow();
        }
    });



    var myNewFlow;


    function initGalleryFlow() {
        var flowDiv = $('#galleryflow')[0];

        if (myNewFlow == null) {
            myNewFlow = new ContentFlow(flowDiv);
            myNewFlow.init();
            addPictuesToFlow(myNewFlow);
        }
        

    }


    function addPictuesToFlow(flowToAdd) {
        for (var i = 1; i <= 10; i++) {
            var path = 'images/diamonds/diamond' + i + '.jpg';
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