<?php
function erroAcesso(){
	echo "<script> Swal.fire({
                    title: 'Usuário sem permissão de acesso!',
                    width: 450,
                    type: 'error'
           }) </script>";
}
?>