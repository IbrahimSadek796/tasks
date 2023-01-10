// //API

var myCategories = document.querySelectorAll('.navbar li');
console.log(myCategories);
var items;
var categorySrc;


for(var i=0;i<myCategories.length;i++){
    myCategories[i].addEventListener(`click`,function(e){
        categorySrc=e.target.getAttribute(`category`)
        console.log(categorySrc);
        getAPI(categorySrc)
    })
}

async function getAPI(categorySrc){
    var result = await fetch(`https://newsapi.org/v2/top-headlines?country=us&category=${categorySrc}&apiKey=ded52c1dc95a445494d1c73c6d12074a`);
    var finalResult = await result.json();
    //console.log(finalResult.articles);
    items = finalResult.articles;
    console.log(items);
    display()
    
}
getAPI('general')


// display

function display(){
    var container=``;
    for(var i=0;i<items.length;i++){
        if(items[i].description !==null && items[i].urlToImage !==null){
                container+=`<div class="col-md-4 py-2">
                <div class="responses shadow rounded position-relative  bg-light overflow-hidden">
                    <img class="w-100" src="${items[i].urlToImage}" alt="">
                
                    <div class ="caption text-center p-1">
                        <h3>${items[i].title.split(' ').splice(0,4).join(' ')}</h3>
                        <P>${items[i].description.split(' ').splice(0,10).join(' ')}</P>
                        <a href="${items[i].url}" class='btn btn-outline-info'>Show Information</a>
                    </div>
                </div>
            </div>`
        }
    }
    document.getElementById('showDate').innerHTML=container;
}