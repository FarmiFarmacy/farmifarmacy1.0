const imagenes= document.querySelectorAll('.img-galeria')
const imagenlight = document.querySelector('.agregar-imagen')
const contenedorLight =document.querySelector('.imagen-light')
const brayan1 = document.querySelector('.brayan');
imagenes.forEach(imagen => {
    imagen.addEventListener('click', ()=> {
        aparecerImagen (imagen.getAttribute('src'))

    })
})

contenedorLight.addEventListener('click', (e)=> {
    if(e.target !== imagenlight){
        contenedorLight.classList.toggle('show')
        imagenlight.classList.toggle('showImagen')
        brayan1.style.opacity = '1'
    }

})

const aparecerImagen = (imagen)=>{
    imagenlight.src = imagen;
    contenedorLight.classList.toggle('show')
    imagenlight.classList.toggle('showImagen')
    brayan1.style.opacity = '0'
}