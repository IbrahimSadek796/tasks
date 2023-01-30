let nameInput = document.getElementById('nameInput')
let emailInput = document.getElementById('emailInput')
let passInput = document.getElementById('passInput')
let btnLogin = document.getElementById('btnLogin');
let alert = document.getElementById('alert');
let userInformation = []


// ......................validation.............................................
btnLogin.addEventListener('click',function(){
    if(validateUserName()==true && validateUserEmail()==true && validateUserPass()==true){
        let user={
            userName:nameInput.value,
            userEmail:emailInput.value,
            userpass:passInput.value
        }
        userInformation.push(user);
        localStorage.setItem('data',JSON.stringify(userInformation))
        window.open(`./index.html`,'_self')
        document.getElementById('error').innerHTML=''
    }
 })


let validation;

function validateUserName(){
    let regular = /^[A-Z][a-z]{3,9}$/;
    if(regular.test(document.getElementById(`nameInput`).value) == true){
        return true;
    }
    else{
        document.getElementById('error').innerHTML=`<span class="text-danger">Invalid Name...!</span>`;
    }
}

function validateUserEmail(){
    let regular = /^[A-Z|a-z]{3,9}@(yahoo|gmail|hotmail).com$/;
    if(regular.test(document.getElementById(`emailInput`).value) == true){
        return true;
    }
    else{
        document.getElementById('error').innerHTML= `<span class="text-danger">invalid Email....!</span>`;
    }
}

function validateUserPass(){
    let regular = /^[A-Z|a-z]{3,9}[0-9]{3,6}$/;
    if(regular.test(document.getElementById(`passInput`).value) == true){
        return true;
    }
    else{
        document.getElementById('error').innerHTML= `<span class="text-danger">Invalid Password.....!</span>`;
    }
}





// ........................................................
alert.addEventListener('click',function(){
    swal.fire({
        title:'معلش ههه',
        text:'ألعب غيرها ههههه',
        imageUrl:'./asset/image/image/icon.png',
        imageWidth:50,
        imageHeight:50,
        // icon:'error',
        timer:4000,
        className: 'alert'

    }
        
);
})


// ...................