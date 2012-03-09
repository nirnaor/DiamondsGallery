$(document).ready(function () {
  console.log('hello im master.js');

  $('.gallerymenuitem a').click(function(){
    console.log('this is the anchorId : ' );
    var anchorId = $(this).attr('id');
    console.log('this is the anchorId : ' + anchorId);
    
    var data = anchorId;
   
    $.get("gallery.php", { category: anchorId },
       function(data) {
         console.log('call to gallery.php is done');
       });

       return false;
  });

});
