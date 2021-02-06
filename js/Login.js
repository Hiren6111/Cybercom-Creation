var array = [];
var temp;
var comp = false;



function validation() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function register() {
        for (var i = 0; i < array.length; i++) {

            temp = array[i];

            if (array[i].email == email && array[i].password == password) {
                comp = true;

                break;
            }
        }
    }
    register();

    if (comp == false) {
        comp = false;
        alert("Please enter valid email and password");
    }
    else {
        sessionStorage.setItem("fname", temp.fname);
        window.location.href = "Dashboard.html";
    }
};
