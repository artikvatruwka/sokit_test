function addCategory(parentId,name,descripton){
    let body = "action=add&name="+name+"&parentId="+parentId+"&description="&descripton;
    httpPostAsync('../handler/category.php',body,()=>{
        location.reload();
    });
}
function deleteCategory(id){
    let body = "action=delete&name="+name+"&parentId="+id;
    httpPostAsync('../handler/category.php',body,(response)=>{
            const buttons = document.querySelectorAll('[data-id]');
            for(el of buttons){

            }
    });
}
function editCategory(id,name,description){
    httpPostAsync('../handler/category.php',body,(response)=>{

    });
}