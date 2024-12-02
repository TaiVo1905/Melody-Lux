const $=document.querySelector.bind(document);
const $$=document.querySelectorAll.bind(document);
document.addEventListener("DOMContentLoaded", () => {
    $('.sidebar_top .bar_title:nth-child(1)').classList.add("active");
})

const profile_head_list = document.querySelectorAll('.library-nav--item');


profile_head_list.forEach((item, index) => {
    item.onclick = function (){
        document.querySelector('.library-nav--item.active').classList.remove('active');
        this.classList.add('active');
    }
})


const img_animate_first = document.querySelectorAll('.libarary-img--animaiton-item')[0];
const img_animate_second = document.querySelectorAll('.libarary-img--animaiton-item')[1];
const img_animate_third = document.querySelectorAll('.libarary-img--animaiton-item')[2];
setTimeout(function(){
setTimeout(function(){
    img_animate_first.classList.remove('second')
    img_animate_second.classList.remove('third')
    img_animate_third.classList.remove('first')

    img_animate_first.classList.add('first')
    img_animate_second.classList.add('second')
    img_animate_third.classList.add('third')
},1000)
setTimeout(function(){
    img_animate_first.classList.remove('first')
    img_animate_second.classList.remove('second')
    img_animate_third.classList.remove('third')

    img_animate_first.classList.add('third')
    img_animate_second.classList.add('first')
    img_animate_third.classList.add('second')
},3000)
setTimeout(function(){
    img_animate_first.classList.remove('third')
    img_animate_second.classList.remove('first')
    img_animate_third.classList.remove('second')
    
    img_animate_first.classList.add('second')
    img_animate_second.classList.add('third')
    img_animate_third.classList.add('first')
},5000)
},0)
setInterval(function(){
setTimeout(function(){
    img_animate_first.classList.remove('second')
    img_animate_second.classList.remove('third')
    img_animate_third.classList.remove('first')

    img_animate_first.classList.add('first')
    img_animate_second.classList.add('second')
    img_animate_third.classList.add('third')
},1000)
setTimeout(function(){
    img_animate_first.classList.remove('first')
    img_animate_second.classList.remove('second')
    img_animate_third.classList.remove('third')

    img_animate_first.classList.add('third')
    img_animate_second.classList.add('first')
    img_animate_third.classList.add('second')
},3000)
setTimeout(function(){
    img_animate_first.classList.remove('third')
    img_animate_second.classList.remove('first')
    img_animate_third.classList.remove('second')
    
    img_animate_first.classList.add('second')
    img_animate_second.classList.add('third')
    img_animate_third.classList.add('first')
},5000)
},6000)