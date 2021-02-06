var array = [];
var comp = false;

function addElement() {
    var rname = document.getElementById('fname').value;
    var remail = document.getElementById('email').value;
    var rpassword = document.getElementById('password').value;
    var rcpassword = document.getElementById('cpassword').value;
    var rcity = document.getElementById('city').value;
    var rstate = document.getElementById('state').value;

    var admin = {
        fname: rname,
        email: remail,
        password: rpassword,
        city: rcity,
        state: rstate,
    };

    if (localStorage.getItem('array')) {
        array = JSON.parse(localStorage.getItem('array'));
    }

    function register() {
        for (var i = 0; i < array.length; ++i) {

            var temp = array[i];

            if (temp.email == remail) {
                comp = true;
                alert("you are alredy registed");
                break;
            }

        }
    }
    register();
    if (comp === false) {
        array.push(admin);
        console.log(array);
        localStorage.setItem("array", JSON.stringify(array));
        var success = window.confirm("Successfully Registred");
        if (success) {
            window.location.href = "Login.html";
        }
    }

};

