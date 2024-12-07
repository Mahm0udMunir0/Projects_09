function confirm_delete(id){
    let del=confirm("Do you want to delete the user ? ");
    if(del==true){
        window.location.href="index.php?action=del&&id="+id;
    }
}
function edit(id){
   
        window.location.href="add_user.php?action=edit&&id="+id;
}