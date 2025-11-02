//Destination script
let next = document.querySelector('.next')
let prev = document.querySelector('.prev')

next.addEventListener('click', function(){
    let pics = document.querySelectorAll('.pic')
    document.querySelector('.slide').appendChild(pics[0])
})

prev.addEventListener('click', function(){
    let pics = document.querySelectorAll('.pic')
    document.querySelector('.slide').prepend(pics[pics.length-1])
})