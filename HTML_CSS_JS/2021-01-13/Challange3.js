/*************************************
 * CODING CHALLANGE 3
 */

//Storing value of Bills in Array.Values Are in Dollar.

var Bill,
Bill=[124,48,268];

// Function For Calculation Of Tip

function cal(amount){
    if(amount<=50){
        return amount*1.2;
    }
    else if(amount>50 && amount<=200){
        return amount*1.15;
    }
    else if(amount>200){
        return amount*1.1;
    }
}

var Tips=[];
var Total_bill=[];

//Store values for Tips and Totalbill in array
for(var i=0;i<Bill.length;i++){
    Total_bill[i]=cal(Bill[i]);
    Tips[i]=Total_bill[i]-Bill[i];
}

//Print Array

console.log(Tips);
console.log(Total_bill);