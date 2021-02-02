
    function validateForm(){

        if( document.Form1.fname.value == "" ) {
            alert( "Please provide your name!" );
            document.myForm.fname.focus() ;
            return false;
         }
         if( document.Form1.fpassword.value == "" ) {
            alert( "Please provide your password!" );
            document.myForm.fpassword.focus() ;
            return false;
         }
         if( document.Form1.faddress.value == "" ) {
            alert( "Please provide your address!" );
            document.myForm.faddress.focus() ;
            return false;
         }
         
         if (Form1.ffootball.checked == false) {
            alert ('You didn\'t choose any of the checkboxes!');
            return false;
         }
         if( document.Form1.fgender.value == "" ) {
            alert( "Please select your gender!" );
            document.myForm.fgender.focus() ;
            return false;
         }
         if( document.Form1.filename.value == "" ) {
            alert( "Please choose your file!" );
            document.myForm.filename.focus() ;
            return false;
         }

         return (true);
        }
