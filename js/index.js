const message = document.querySelector('.message')

if(document.querySelector('.button_cerrar')){
    document.querySelector('.button_cerrar').addEventListener('click',()=>{
        message.style.display='none'
    })
}
