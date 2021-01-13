//write your js here

//Stored value in object
var John={
    name:'John',
    height: 1.5,
    mass :60,
    calculateBMI:function(){
        return this.mass/(this.height*this.height);
    }
};
    John.calculateBMI();
    console.log(John);

var Mark={
    name : 'Mark',
    height : 1.7,
    mass : 80, 
    calculateBMI:function(){
        return this.mass/(this.height*this.height);
    }
};

    Mark.calculateBMI();
    console.log(Mark);

    if(Mark.BMI>John.BMI)
    {
        console.log(Mark.name + "has highest BMI with" + Mark.BMI);
    }
    
    else if(Mark.BMI<John.BMI)
    {
        console.log(John.name + "has highest BMI with" + John.BMI);
    }
    
    else
    {
        console.log(Mark.name + "and" + John.name +"have same BMI");
    }





