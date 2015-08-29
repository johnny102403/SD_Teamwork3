//public/js/submit.js
//control html and message submit with php


var usrName = '';
var cont; //content which sent
var scrolled = false; //is user scroll the message
var messageHeight = 200;
var scrollAmount = 0;
var dbIniCount = 0;
var dbRowCount;

//when window loaded, load message and set initial message count 
$(window).load(function (e) {
    e.preventDefault();
    //get message data
    getDbMessage();
    //get initial message count
    initialMsCount();
    //get log in user name from db
    getUserName();
});

//get message data from db
function getDbMessage() {
    $.ajax({
        type: 'POST',
        url: 'messageManager.php',
        data: {
            mode: 'load'
        },
        success: function (data) {
            setText(data);
        },
        error: function () {
            console.log("error!!!!");
        }
    });
}
//get initial message count
function initialMsCount() {
    $.ajax({
        type: 'POST',
        url: 'messageManager.php',
        data: {
            mode: 'detect'
        },
        success: function (data) {
            dbIniCount = parseInt(data);
            dbRowCount = parseInt(data);
            initialFunc();
        },
        error: function () {
            console.log("error!!!!");
        }
    });

    function initialFunc() {
        scrollAmount = dbRowCount * messageHeight;
        scrollMs();
    }
}
//get user name
function getUserName() {
    $.ajax({
        type: 'POST',
        url: 'checkAccount.php',
        data: {
            getUser: 1
        },
        success: function (data) {
            console.log(data);
            usrName = data;
//            if (usrName === '') {
//                location.href = 'index.html';
//            }
        },
        error: function () {
            console.log("error!!!!");
        }
    });

}

//detect message db change and refresh message text 
$(window).load(function () {
    //detect message db
    function detectDb() {
        $.ajax({
            type: 'POST',
            url: 'messageManager.php',
            data: {
                mode: 'detect'
            },
            success: function (data) {
                dbRowCount = parseInt(data);
                dbChange();
            },
            error: function () {
                console.log("error!!!!");
            }
        });
    }

    //if db change
    function dbChange() {
        if (dbIniCount === dbRowCount) {
            //db not change
        } else {
            getDbMessage();
            scrollAmount = dbRowCount * messageHeight;
            $(".message").effect("highlight", 500);
            scrollMs();
            dbIniCount = dbRowCount;
        }
    }

    //detect every one second
    setInterval(detectDb, 1000);
});



//if user scroll, stop autoscroll
//$('.message').on('scroll', function () {
//    scrolled = true;
//});
//$('.message').on('scroll',function () {
//    scrolled = true;
//});
//
//$('.message').click(function () {
//    scrolled = false;
//    scrollMs();
//});


//click button to send message
$(function () {
    $("#sub").click(function (e) {
        //e.preventDefault();
        sendToPhp(e);
    });


});
//enter to send message
$(function () {
    $("#content").on("keypress", function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            sendToPhp(e);
        }
    });
});
//communicate with php to send and get DB data
function sendToPhp(e) {
    e.preventDefault();
    scrolled = false;
    cont = $("#content").val();
    $.ajax({
        type: 'POST',
        url: 'messageManager.php',
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {
            usr: usrName,
            cont: cont
        },
        success: function (data) {
            setText(data);
            scrollMs();
        },
        error: function () {
            console.log("error!!!!");
        }
    });
    $("#content").val('');
}

//set Text
function setText(data) {
    $("#disMs").html(data);
}

//scroll messages up
function scrollMs() {
    //    $('.message').animate({
    //        scrollTop: $(document).height()
    //    }, "slow");
    $('.message').animate({
        scrollTop: scrollAmount
    }, 500);
}






//subButton.addEventListener("click", getPlayerName, false);
//document.getElementById("getName").addEventListener("keypress", function (e) {
//    var key = e.which || e.keyCode;
//    if (key === 13) {
//        getPlayerName();
//    }
//}, false);
