const btn = document.getElementById("register-btn");
const login = document.getElementById("login");
const password = document.getElementById("password");
const errorBox = document.getElementById("errors");

btn.addEventListener("click",()=>{
    let body = "login="+login.value+"&password="+password.value;
    httpPostAsync('../views/handler/registration.php',body,(response)=>{
        response = JSON.parse(response);
        errorBox.innerHTML="";
        if(response.status === "error"){
            let div = document.createElement("div");
            div.id = "error";
            div.className = "alert alert-danger";
            div.innerHTML = response.message;
            div.style.maxWidth="800px";
            errorBox.appendChild(div);
        }
        if(response.status === "success"){
            window.location.href = "./Main.php";
        }

    });
});
