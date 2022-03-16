const registerLink = document.getElementById("register-link");
const loginBox = document.getElementById("login-box");
const registerBox = document.getElementById("register-box");
const loginLink = document.getElementById("login-link");
const forgotLink = document.getElementById("forgot-link");
const forgotBox = document.getElementById("forgot-box");
const backLink = document.getElementById("back-link");
const registerBtn = document.getElementById("register-btn");
const registerForm = document.getElementById("register-form");
const Name = document.getElementById("name");
const remail = document.getElementById("remail");
const rPassword = document.getElementById("rpassword");
const cPassword = document.getElementById("cpassword");
const passwordError = document.getElementById("passError");
const regAlert = document.getElementById("regAlertErr");

registerLink.addEventListener("click", () => {
    loginBox.hide();
    registerBox.show();
});

loginLink.addEventListener("click", () => {
    loginBox.show();
    registerBox.hide();
});

forgotLink.addEventListener("click", () => {
    forgotBox.show();
    loginBox.hide();
});

backLink.addEventListener("click", () => {
    forgotBox.hide();
    loginBox.show();
});

// register
function check_input_Validity(name,email,rPassword,cPassword) {
    if(name.value() != "" || email.value() != "" || rPassword.value() != "" || cPassword.value() != ""){
        checkMatch(rPassword,cPassword)
    } else{
        registerBtn.textContent ="All field is required";
    }

    name.value = "";
    email.value = "";
    rPassword.value = "";
    cPassword.value = "";
}

function checkMatch(rPass,cPass){
    if(rPass.value != cPass.value){
        passwordError.textContent="password didn't Match";
        registerBtn.textContent ="Sign up"
    } else{
        passwordError.textContent=""
    }
}



registerBtn.addEventListener("submit", (e) => {
    e.preventDefault();
    check_input_Validity(Name,remail,rPassword,cPassword);

    fetch('assets/php/action.php',{
        method: 'POST',
        data: new FormData(document.getElementById("register-form"))
    })
    .then((res) =>res.json())
    .then(data =>{
        if(data.status == "success"){
            window.location.replace('home.php');
        } else{
            regAlert.innerText=res
        }
    })
});


