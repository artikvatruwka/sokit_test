const errorBox = document.getElementById("errors");

function addCategory(parentId,name,descripton){
    let body = "action=add&name="+name+"&parentId="+parentId+"&description="+descripton;
    httpPostAsync('./handler/category.php',body,(response)=>{
        handleResponse(response);
    });
}
function deleteCategory(id){
    let body = "action=delete&id="+id;
    httpPostAsync('./handler/category.php',body,(response)=>{
        handleResponse(response);
    });
}
function editCategory(id,name,description){
    let body = "action=edit&name="+name+"&description="+description+"&id="+id;
    httpPostAsync('../views/handler/category.php',body,(response)=>{
        handleResponse(response);
    });
}

function handleResponse(response) {
    response = JSON.parse(response);
    errorBox.innerHTML="";
    if(response.status === "error"){
        showError();
    }
    if(response.status == "success"){
        location.reload();
    }
}
function showError(){
    let div = document.createElement("div");
    div.id = "error";
    div.className = "alert alert-danger";
    div.innerHTML = response.message;
    div.style.maxWidth="800px";
    errorBox.appendChild(div);
}
window.onload = function () {
    let addBtns = document.querySelectorAll("[name=add]");
    let editBtns = document.querySelectorAll("[name=edit]");
    let deleteBtns = document.querySelectorAll("[name=delete]");
    for(let btn of addBtns){
        btn.addEventListener("click",() => {


            let name = prompt("Input category name:");
            if(name!=null){
                let description = prompt("Input category description:");
                if(description !=null){
                    addCategory(btn.dataset.id,name,description);
                }
            }

        })
    }
    for(let btn of editBtns){
        btn.addEventListener("click",()=>{
            let name = prompt("Input new category name:");
            if(name!=null){
                let description = prompt("Input new category description:");
                if(description !=null){
                    editCategory(btn.dataset.id,name,description);
                }
            }
        })
    }
    for(let btn of deleteBtns){
        btn.addEventListener("click",() => {
            if(confirm("Are you sure? All subcategories will be deleted")){
                deleteCategory(btn.dataset.id);
            }
        })
    }
};