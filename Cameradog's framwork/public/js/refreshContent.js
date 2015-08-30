//refresh index site content
//every 5 seconds


function refresh() {
    $('.message').load('refresh');
};

$(window).load(function(){
    setInterval(refresh, 5000);
});
