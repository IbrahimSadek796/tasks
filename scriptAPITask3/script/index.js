//API
var myHttp = new XMLHttpRequest();
var apiContainer=[];
myHttp.open(`GET`,`https://newsapi.org/v2/top-headlines?country=eg&category=business&apiKey=ded52c1dc95a445494d1c73c6d12074a`);
myHttp.send();

myHttp.addEventListener(`readystatechange`,function(){
    if(myHttp.readyState == 4){
        var myRes = JSON.parse(myHttp.response);
        apiContainer = myRes.articles;
        console.log(apiContainer);
        display()
    }

})

// display

function display(){
    var container="";
    for(var i=0;i<apiContainer.length;i++){
        var x = apiContainer[i].title;
        var y = apiContainer[i].description;
        if(apiContainer[i].description!==null && apiContainer[i].urlToImage!==null){
                container+=`<div class="col-md-4 ">
                <div class="item bg-light text-center p-5">
                    <img clas="image w-100" src="${apiContainer[i].urlToImage}"/>
                    <h3>${x.split('  ').splice(0,4).join('  ')}</h3>
                    <P>${y.split('  ').splice(0,10).join('  ')}</P>
                    <a href="${apiContainer[i].url}" class='btn btn-outline-info'>Show Information</a>
                </div>
            </div>`
        }
        else{
            container+=`<div class="col-md-4 ">
            <div class="item bg-light text-center p-5">
                <div class="items"></div>
                <h3>${apiContainer[i].title.split('  ').splice(0,4).join('  ')}</h3>
                <a href="${apiContainer[i].url}" class='btn btn-outline-info'>Show Information</a>
            </div>
        </div>`
        }
    }
    document.getElementById('showDate').innerHTML=container;
}
