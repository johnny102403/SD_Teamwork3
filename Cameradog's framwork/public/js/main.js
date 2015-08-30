//all main site button controll

$(function() {
    $("#newMs").click(function(e) {
        window.location = 'main/create';
    });
});
//edit button for each messages
$(function() {
    $(".editBtn").click(function(e) {
        var messageId = $(this).attr('value');
        window.location = 'main/'+messageId+'/edit';
    });
});

//do not delete
$(function() {
    $("#notDelete").click(function(e) {
        window.location = '/main';
    });
});
//delete button for each messages
$(function() {
    $(".deleteBtn").click(function(e) {
        var messageId = $(this).attr('value');
        window.location = 'main/'+messageId;
    });
});
