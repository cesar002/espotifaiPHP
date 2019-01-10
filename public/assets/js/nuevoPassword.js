function validarPasswords(){
    let form = document.forms["nuevoPass"];
    let pass = form["password"].value;
    let re_pass = form["re_password"].value;

    if(pass == re_pass && pass != "" && re_pass != ""){
        form.submit()
        return true
    }

    alert("Contraseñas incorrectas");
}