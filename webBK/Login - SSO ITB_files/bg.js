 

	


$(window).on('load',function() {
    var randomImages = ['background-b.png','bg1.jpg','bg2.jpg','bg3.jpg','bg4.jpg'];
    var rndNum = Math.floor(Math.random() * randomImages.length);
    var url = 'url(https://dev-login.itb.ac.id/aset/' + randomImages[rndNum] +') no-repeat';

    jQuery('.tesimage').css({
        'background': url + ' no-repeat center center fixed', 
           });

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

var service= getUrlParameter('service');

$.ajax({
  url: service,
   success: function(data) {
    var matches = data.match(/<title>(.*?)<\/title>/);
    console.log(matches[0]);
  }   
});


var html = "<div class='text-center'><b>Anda akan login ke sistem :</b><br>" +service + "</span></div>";

$('#serviceui').html(html);


 });



