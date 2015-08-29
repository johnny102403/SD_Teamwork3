//setup

//click button to log in
$(function () {
    $("#setAcBtn").click(function () {
        setAcPs();
    });


});
//enter to log in
$(function () {
    $("#setAc").on("keypress", function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            e.preventDefault();
            setAcPs();
        }
    });
    $("#setPs").on("keypress", function (e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            e.preventDefault();
            setAcPs();
        }
    });
});

function setAcPs(){
    var user = $("#setAc").val();
    var password = $("#setPs").val();
    if (user == '') {
        alert('Please enter your acoount!');
    }
    else if(password == ''){
        alert('Please enter your password!');
    }
    else{
        setAcount(user, password);
    }
}

function setAcount(user,password){
    $.ajax({
        type: 'POST',
        url: 'NewAccount.php',
        data: {
            usr: user,
            psw: password
        },
        success: function (data) {
            if(data === 'accept'){
                location.href='index.html';
            }
            else if(data === 'nonAc'){
                alert('This Account has been used!');
                $("#setAc").val('');
                $("#setPs").val('');
            }
            else if(data === 'nonPs'){
                alert('This Password has been used!');
                $("#setPs").val('');
            } 
        },
        error: function () {
            console.log("error!!!!");
        }
    });
}