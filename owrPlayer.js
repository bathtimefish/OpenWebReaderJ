$( function () {

  $(window).load( function() {
    
    var apiUrl = 'http://ec2-50-17-144-29.compute-1.amazonaws.com/owr/core.php?callback=?';

    var doc = $('#owr').text();
    var data = { "text" : encodeURI(doc) };

    $.getJSON(apiUrl, data, function(json){
      var mp4Elem = $('<source src="'+json.audios.mp4+'">');
      var oggElem = $('<source src="'+json.audios.ogg+'">');
      $('#owrPlayer').append(mp4Elem).append(oggElem);
      $('#owrPlayer').css('display', 'block');
    });


  });

});
