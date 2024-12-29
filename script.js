//confirmation de mot de pass
//verifions si le mode pass et la confirmation sont identique

let password1=document.querySelector('.password1');
let password2=document.querySelector('.password2');
let error_msg=document.querySelector('.error-msg');

//on compare les valeux des 2 mots de pass au fure e a mesure qu'on ecrit
password2.onkeyup = function(){
    if(password1.value != password2.value){
        error_msg.innerHTML = "Les Mots de pass ne  sont pas conformes";
    }
    else{
        error_msg.innerHTML = "";
    }
};
