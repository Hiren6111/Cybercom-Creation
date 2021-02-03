   
    function validateForm(){

        if( document.Form3.fname.value == "" ) {
            alert( "Please provide your name!" );
            document.Form3.fname.focus() ;
            return false;
        }
        if( document.Form3.lname.value == "" ) {
            alert( "Please provide your name!" );
            document.Form3.lname.focus() ;
            return false;
        }
        if( document.Form3.date.value == "-1" ) {
            alert( "Please select date!" );
            document.Form3.fname.focus() ;
            return false;
        }
        if( document.Form3.month.value == "-1" ) {
            alert( "Please select month!" );
            document.Form3.month.focus() ;
            return false;
        }
        if( document.Form3.year.value == "-1" ) {
            alert( "Please select year!" );
            document.Form3.year.focus() ;
            return false;
        }
        if( document.Form3.country.value == "-1" ) {
            alert( "Please select your country" );
            document.Form3.country.focus() ;
            return false;
        }
        var emailID = document.Form3.email.value;
                 atpos = emailID.indexOf("@");
                 dotpos = emailID.lastIndexOf(".");
                 
                 if (atpos < 1 || ( dotpos - atpos < 2 )) {
                    alert("Please enter correct email ID")
                    document.Form3.email.focus() ;
                    return false;
        }
        if( document.Form3.phone.value == "" ) {
            alert( "Please Enter your phone number" );
            document.Form3.phone.focus() ;
            return false;
        }
        if( document.Form3.password.value == "" ) {
            alert( "Please Enter your password" );
            document.Form3.password.focus() ;
            return false;
        }
        if( document.Form3.password.value == document.Form3.cpassword.value ) {
            alert( "Your confirm password not match" );
            document.Form3.cpassword.focus() ;
            return false;
        }
        if( document.Form3.fterms.value == "" ) {
            alert( "Please checked Terms and conditions" );
            document.Form3.fterms.focus() ;
            return false;
        }
        
        return (true);
        }
        