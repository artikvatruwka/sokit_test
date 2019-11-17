const btn = document.getElementById("register");
let login = document.getElementById("login");
let password = document.getElementById("password");
let errorBox = document.getElementById("errors");
btn.addEventListener("click",()=>{
    let body = "login="+login.value+"&password="+password.value;
    // body = {
    //    login: login.value,
    //    password: password.value
    // };
    // body = JSON.stringify(body);
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
            window.location.href("./Main.php")
        }

    });
});
