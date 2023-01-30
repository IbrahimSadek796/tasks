
let Api;
let btnOut = document.getElementById('btnOut')
let welcom = document.getElementById('welcom')
let array = []
//.......................................................................................................
array = JSON.parse(localStorage.getItem("data"))
console.log(array[0].userName)
welcom.innerHTML=`Hi ${array[0].userName}`

//..........................................................................................................

async function getApi(){
let res= await fetch(`https://api.themoviedb.org/3/trending/movie/day?api_key=a21363f167baec8a6596a822125e8df3`)
let finalResult = await res.json()
Api = finalResult.results
console.log(Api)
displayMovies()
}
getApi()


function displayMovies(){
    let container= ``
    for( let i=0 ; i<Api.length; i++){
        container+= `
        <div class="col-md-3">
        <div class="movie position-relative rounded">
            <div style="width:30%; text-align:center;" class="rate position-absolute end-0  top-2 bg-danger text-white">
                <span>${Api[i].vote_average}</span>
            </div>
            <img class=" card-img-top w-100" src="https://image.tmdb.org/t/p/w500/${Api[i].poster_path}" alt="">
        </div>
    </div>`
    }
    document.getElementById('show').innerHTML=container
    
}

//.............................................. -----------------------
window.addEventListener('scroll',function(){
    let windowScroll =window.scrollY
    if(windowScroll > 100){
        $('.navbar').animate({'top':'0px' , 'width':'100%'})
        $('.up-top').css('display', 'flex')
    }
    else if(windowScroll < 100)
    {
        $('.navbar').animate({'top':'50px','width':'70%'})
        $('.up-top').css('display', 'none')
    }
    $('.up-top').click(function(){
        window.scrollTo(0,0)
    })
})

//....................................................................................................................

btnOut.addEventListener('click',function(){
    localStorage.clear(array)
    window.open('./login.html','_self')
})

//......................................................................................................................

$(document).ready( $('body').css('overflow' , 'auto'))
