const brayan = document.querySelector('.brayan');
const menu = document.querySelector('.menu-navegacion');

console.log(brayan)
console.log(menu)

brayan.addEventListener('click', ()=> {
    menu.classList.toggle("spread")
})


window.addEventListener('click', e=>{
    if(menu.classList.contains('spread')
    && e.target !=menu && e.target != brayan){


        menu.classList.toggle("spread")
    }

})