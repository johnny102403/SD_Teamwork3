//public/js/login.js
//click button to log in
$(function () {
    $("#logBtn").click(function () {
        getAcPs();
    });


});
//enter to log in
$(function () {
    $("#logAc").on("keypress", function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            e.preventDefault();
            getAcPs();
        }
    });
    $("#logPs").on("keypress", function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            e.preventDefault();
            getAcPs();
        }
    });
});


function getAcPs(){
    var user = $("#logAc").val();
    var password = $("#logPs").val();
    if (user == '') {
        alert('Please enter your acoount!');
    }
    else if(password == ''){
        alert('Please enter your password!');
    }
    else{
        checkAcount(user, password);
    }
}

function checkAcount(user,password){
    $.ajax({
        type: 'POST',
        url: 'checkAccount.php',
        data: {
            usr: user,
            psw: password
        },
        success: function (data) {
            if(data === 'noResult'){
                console.log(data);
                alert("Your account or password doesn't exist!");
            }
            else{
                console.log(data);
                updateID(user);
                location.href='messageBoard.html';
            }
        },
        error: function () {
            console.log("error!!!!");
        }
    });
}

function updateID(user){
    $.ajax({
        type: 'POST',
        url: 'checkAccount.php',
        data: {
            usr: user,
            id: 1
        },
        success: function (data) {
            console.log('suc: '+data);
        },
        error: function () {
            console.log("error!!!!");
        }
    });
}