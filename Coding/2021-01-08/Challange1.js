 //write your js here


 var Mheight,Mmass,Jheight,Jmass,JBMI,MBMI
 /*
 Mheight =Mark's height
 Mmass   =Mark's mass
 Jheight =John's height
 Jmass   =John's mass
  */
 Mheight=45;
 Mmass=2;
 Jheight=50;
 Jmass=1.5;             //stored all the values
 JBMI=Jmass/(Jheight*Jheight);
 MBMI=Mmass/(Mheight*Mheight);

 console.log(JBMI);
 console.log(MBMI);   //calculation of John's and Mark's mass

 //boolean variable
 var BMI=JBMI<MBMI
 console.log(BMI);

