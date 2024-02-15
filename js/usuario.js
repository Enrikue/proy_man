function verificarUsr(){

    var usr = $("#usr_txt").val();
    var pass = $("#passwd_txt").val();

    if(usr.length == 0 || pass.length == 0){
        return Swal.fire("Mensaje de alerta", "Llene los campos vacios", "warning");
    }

    alert("hoka")

}