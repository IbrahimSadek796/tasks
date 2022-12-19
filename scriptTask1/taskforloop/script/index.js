var userId = "A2456"
var userName = "none"

if(userId==userName){
    console.log("Hello");
}
else{
    console.log("sory");
}

var userAdmin = 123
var userSystem = 123


switch(userAdmin){
    case userSystem:
        console.log("Hello");
        break
    default:
        console.log("sory");
}


var image=``
for(var i=0;i<10;i++){
    image +=`<div class="col-md-4">
    <div class="item w-100">
        <div class="image">
            <img src="./image/christopher-gower-m_HRfLhgABo-unsplash.jpg" alt="" class="w-100 h-100">
        </div>
        <h6 class="text-white my-2">Welcom In JavaScript</h6>
        <button class="btn btn-outline-info text-info text-white">Visit Us</button>
    </div>
</div>`
}
document.getElementById("dom").innerHTML=image;