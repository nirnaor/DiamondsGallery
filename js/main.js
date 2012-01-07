$(document).ready(function () {

    console.log('hello');
    $('#gallery').hide();

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
        console.log(img.alt);
    }
    else {
        // starting cross-fade phase, take out caption
        $('#slidinggallery.caption').fadeOut()
    }
});


});