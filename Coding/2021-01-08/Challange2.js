//Write you js code here.

/*
j1,j2,j3 john's team score
m1,m2,m3 mike's team score
javg=Average of johns team
mavg=Average og mikes tema
*/

var j1, j2, j3, m1, m2, m3, javg, mavg;
j1 = 89;
j2 = 125;
j3 = 103;
m1 = 112;
m2 = 98;
m3 = 85;
javg = (j1 + j2 + j3) / 3;
mavg = (m1 + m2 + m3) / 3;

console.log(javg);
console.log(mavg); //Average of john and mike's team.

if (javg > mavg) {
    console.log('Johns team winner and average score is' + javg);
}
else if (mavg > javg) {
    console.log('Mikes team winner and average score is' + mavg);
}
else {
    console.log('Match is tie');
}
