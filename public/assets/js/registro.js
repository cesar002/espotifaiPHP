function validarPass(){
    let form = document.forms["registro"];
    let pass = form["pass"].value;
    let passr = form["passre"].value;

    if (pass == passr && pass != "" && passr != "") {
        if(validarEmail(form["email"].value)){
            form.submit();
            return true;
        }else{
            showEmailError();
            return false;
        }
        
    }

    showPassError();
}

function validarEmail(email){
    let expresion = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return expresion.test(email) ? true : false;
}

function removeErrors(){
    let errorEmail = document.getElementById("email-error");
    let errorPass = document.getElementById("pass-error");

    errorEmail.classList.add("email-error");
    errorPass.classList.add("pass-error");
}

function showEmailError(){
    let error = document.getElementById("email-error");
    error.classList.remove("email-error");
}

function showPassError(){
    let error = document.getElementById("pass-error");
    error.classList.remove("pass-error");
}