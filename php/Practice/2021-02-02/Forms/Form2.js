function validateForm(){

    if( document.Form2.fname.value == "" ) {
        alert( "Please provide your name!" );
        document.Form2.fname.focus() ;
        return false;
    }
    if( document.Form1.fpassword.value == "" ) {
        alert( "Please provide your password!" );
        document.Form2.fpassword.focus() ;
        return false;
    }
    if( document.Form1.faddress.value == "" ) {
        alert( "Please provide your address!" );
        document.myForm.faddress.focus() ;
        return false;
    }
    
    if (Form2.fgames.checked == false) {
        alert ('You didn\'t choose any of the checkboxes!');
        return false;
    }
    if( document.Form2.gender.value == "" ) {
        alert( "Please select your gender!" );
        document.Form2.gender.focus() ;
        return false;
    }
    if( document.Form2.mstatus.value == "" ) {
        alert( "Please select your Marital status!" );
        document.Form2.mstatus.focus() ;
        return false;
    }
    if (Form2.fterms.checked == false) {
        alert ('You have to accept aggriment!');
        return false;
    }

return (true);
}
