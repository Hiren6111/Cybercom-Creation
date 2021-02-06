var array_user = [];
var comp = false;


function logout() {
    sessionStorage.clear();
    window.location.href = "login.html";
}

function insertUser() {
    if (document.getElementById("addUser").value == "Update") {

        var array_user1 = localStorage.getItem('array_user');
        var items = JSON.parse(array_user1);


        let link = document.querySelector("#aTag");
        let target1 = link.getAttribute('value');
        console.log(target1);

        for (var h = 0; h < items.length; h++) {


            if (target1 == items[h].index) {
                items[h].name = document.getElementById('name1').value;
                items[h].email = document.getElementById('email').value;
                items[h].password = document.getElementById('password').value;
                items[h].userbirthDate = document.getElementById('birthDate').value;
                console.log(items);
                localStorage.setItem("array_user", JSON.stringify(items));
                alert("Record Updated");
                location.reload();
            }
        }
    }

    if (document.getElementById("addUser").value == "Add User") {

        var index = 0;
        if (localStorage.getItem('array_user')) {
            array_user = JSON.parse(localStorage.getItem('array_user'));
        }

        for (var t = 0; t < array_user.length; t++) {
            index = array_user.indexOf(array_user[t]) + 1;
        }
        index;
        var name = document.getElementById('name1').value;
        var uemail = document.getElementById('email').value;
        var upwd = document.getElementById('password').value;
        var userbirthDate = document.getElementById('birthDate').value;

        var user = {
            index: index,
            name: name,
            email: uemail,
            password: upwd,
            userbirthDate: userbirthDate
        };


        function register() {
            for (var index1 = 0; index1 < array_user.length; ++index1) {

                var temp = array_user[index1];

                if (temp.email == uemail) {
                    hasMatch = true;
                    alert("user already exist with same email");
                    break;
                }
            }
        }
        register();
        if (comp === false) {
            array_user.push(user);
            console.log(array_user);
            localStorage.setItem("array_user", JSON.stringify(array_user));
            alert("User added");
            location.reload();
        }
    }
};
