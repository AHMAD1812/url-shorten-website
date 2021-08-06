
const form=document.querySelector('.wrapper form'),
FULLurl=form.querySelector('input'),
SHORTENbtn =form.querySelector('button'),
blurEffect=document.querySelector('.blur-effect'),
popup=document.querySelector('.popup-box');
short_url=popup.querySelector('.shorten-url');

form.onsubmit = (e) =>{
    e.preventDefault();
}

SHORTENbtn.onclick = ()=>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","php_files/url_control.php",true);
    xhr.onload=()=>{
        if(xhr.readyState==4 && xhr.status==200){
            let data=xhr.response;
            if(data.length <=5){
                blurEffect.style.display='block';
                popup.classList.add('show');

                let domain="localhost:8090/url shorten?u=";
                short_url.value=domain+data;
            }            
            else{
                alert(data);
            }
            
        }
    }

    let formData= new FormData(form);
    xhr.send(formData);
}