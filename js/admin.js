function modificar(id, id_estado){

                $.ajax({
                    url: "modificarUsr.php",
                    type: "post",
                    data: {
                        id: id,
                        id_estado: id_estado
                    },
                    dataType: "json"
                }).done(
                    function(data){
                        if (data == '1'){
                            location.reload(true);
                            //header("Location: sesionAdministrador.php");
                        } else {
                            alert("Error al comunicarse con el servidor");
                        }
                        
                    }
                ).fail(
                    function(error){
                        alert("Error al comunicarse con el servidor");
                    }
                );

}


function reporte(){
            window.location.href = 'reporte.php';
}