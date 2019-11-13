function showPassword(){
    var element = document.getElementById("password");
    if (showPasswordCheckBox.checked) {
        element.type = "text";
    } else {
        element.type = "password";
    }
}
var showPasswordCheckBox = document.getElementById("show-password");
showPasswordCheckBox.addEventListener("click",showPassword());