let random = document.getElementsByClassName('number')
let btnOut = document.getElementById('btnOut')
let welcom = document.getElementById('welcom')
let array = []
array = JSON.parse(localStorage.getItem("data"))
console.log(array[0].userName)
welcom.innerHTML=`Hi ${array[0].userName}`
// ................................................

function randomVlue(){
    for(let i = 0; i<random.length; i++){
        let value = Math.round(Math.random()*1000)+'K';
        random[i].innerHTML=value
    }
}

setInterval(randomVlue,1000)

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

btnOut.addEventListener('click',function(){
    localStorage.clear(array)
    window.open('./login.html','_self')
})



$(document).ready(function(){
    $('.loading img').fadeOut(2000, function(){
        $('.loading').slideUp(2000, function(){
            $('.loading').remove()
            $('body').css('overflow','auto')
            
        })
    })
})