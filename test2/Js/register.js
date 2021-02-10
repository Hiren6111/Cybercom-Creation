function validateForm() {

if (document.Form1.prefix.value == "") {
    alert("Please provide prefix!");
    document.Form1.prefix.focus();
    return false;
}
if (document.Form1.fname.value == "") {
    alert("Please provide First name!");
    document.Form1.fname.focus();
    return false;
}
if (document.Form1.lname.value == "") {
    alert("Please provide your Lastname!");
    document.Form1.phone.focus();
    return false;
}
if (document.Form1.email.value == "") {
    alert("Please provide your email!");
    document.Form1.email.focus();
    return false;
}
if (document.Form1.phone.value == "") {
    alert("Please provide your mobile number");
    document.Form1.phone.focus();
    return false;
}
if (document.Form1.password.value == "") {
    alert("Please provide your password");
    document.Form1.password.focus();
    return false;
}
if (document.Form1.password.value ==document.Form1.cpassword.value ) {
    alert("password did not match");
    document.Form1.password.focus();
    return false;
}
if (document.Form1.info.value == "") {
    alert("Please provide Information");
    document.Form1.info.focus();
    return false;
}
if (document.Form1.terms.value == "") {
    alert("Please check the box");
    document.Form1.terms.focus();
    return false;
}
return (true);


}
