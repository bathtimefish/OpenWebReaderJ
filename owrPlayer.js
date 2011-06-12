$( function () {

  $(window).load( function() {

    var apiUrl = location.protocol + '//' + location.hostname + '/owr/core.php?key=12345&callback=?';
    //var apiUrl = 'http://ec2-50-19-37-197.compute-1.amazonaws.com/owr/core.php?callback=?';

    var doc = $('#owr').text();
    var modifiedSerial = Date.parse(document.lastModified);
    var data = {
      "text": encodeURI(doc),
      "modified": modifiedSerial
    };

    $.getJSON(apiUrl, data, function(json){
      var mp4Elem = $('<source src="'+json.audios.mp4+'">');
      var oggElem = $('<source src="'+json.audios.ogg+'">');
      $('#owrPlayer').append(mp4Elem).append(oggElem);
      $('#owrPlayer').css('display', 'block');
    });


  });

});
