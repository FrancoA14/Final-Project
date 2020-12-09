const form = document.getElementById("Memberform");
function validateForm(event){
    event.preventDefault();
    const first = form.elements["fname"].value;
    const last = form.elements["lname"].value;
    const phone = form.elements["phonenum"].value;
    const email = form.elements["email"].value;
    const add = form.elements["address"].value;
    const pass = form.elements["password"].value;
    const conf = form.elements["confirm"].value;

    if (first === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("first").style.border="solid";
        document.getElementById("first").style.borderColor="red";
        document.getElementById("first").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("first").style.border="transparent";
    }

    if (last === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("last").style.border="solid";
        document.getElementById("last").style.borderColor="red";
        document.getElementById("last").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("last").style.border="transparent";
    }

    if (phone === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("phonenum").style.border="solid";
        document.getElementById("phonenum").style.borderColor="red";
        document.getElementById("phonenum").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("phonenum").style.border="transparent";
    }

    if (email === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("email").style.border="solid";
        document.getElementById("email").style.borderColor="red";
        document.getElementById("email").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("email").style.border="transparent";
    }

    if (add === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("address").style.border="solid";
        document.getElementById("address").style.borderColor="red";
        document.getElementById("address").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("address").style.border="transparent";
    }

    if (pass === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("password").style.border="solid";
        document.getElementById("password").style.borderColor="red";
        document.getElementById("password").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("password").style.border="transparent";
    }

    if (conf === ""){
        document.getElementById("form-errors").innerHTML = "You left field blank";
        document.getElementById("confirm").style.border="solid";
        document.getElementById("confirm").style.borderColor="red";
        document.getElementById("confirm").style.borderWidth="2px";
    }
    else{
        document.getElementById("form-errors").innerHTML = "";
        document.getElementById("confirm").style.border="transparent";
    }
}
form.addEventListener('submit',validateForm)