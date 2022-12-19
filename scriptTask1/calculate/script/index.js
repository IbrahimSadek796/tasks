var firestNumber = prompt("Enter The Firest Number");
var operator = prompt("Enter The operator");
var secondNumber = prompt("Enter The Second Number");
var result;
switch(operator){
    case `+`:
        var calc=(firestNumber+secondNumber);
        console.log(calc);
        break
    case '-':
        result=firestNumber-secondNumber;
        console.log(result);
        break
    case '*':
        result=firestNumber*secondNumber;
        console.log(result);
        break
    case '/':
        result=firestNumber/secondNumber;
        console.log(result);
        break
    case '%':
        result=firestNumber%secondNumber;
        console.log(result);
        break
    default:
        console.log("try againe");
    
}