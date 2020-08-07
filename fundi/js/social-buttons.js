
window.CSbuttons = window.CSbuttons || {};

var currentUrl = document.location.href;
var url = "http://www.facebook.com/sharer.php?u="+currentUrl;
var url2 = "http://www.facebook.com/sharer.php?u="+currentUrl;



CSbuttons.init = function () {
  var $shareLinks = $('.social-sharing').find('a');

  // Share popups
  $shareLinks.on('click', function(e) {
    var el = $(this),
        popup = el.attr('class').replace('-','_'),
        link = el.attr('href'),
        w = 700,
        h = 400;

    // Set popup sizes
    switch (popup) {
      case 'share_twitter':
        h = 300;
        url = "http://twitter.com/share?url="+currentUrl;
        break;
   
    }

    if (popup) {
      e.preventDefault();
      window.open(url, popup, 'width=' + w + ', height=' + h);
    }
  });
}

$(function() {
  window.CSbuttons.init();
  var copyText2 = document.getElementById("myInput").value = currentUrl;
});

function myFunction() {
  var copyText = document.getElementById("myInput"); 
  copyText.style.display = "block";
   copyText.select();
  document.execCommand("copy");

}
