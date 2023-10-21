<?php
function eliminarTokenSiCaduco($conn) {
    $query = "DELETE FROM sesiones where TIMEDIFF(NOW(),creacion) > '01:00:00';";
    $result = mysqli_query($conn, $query);
}
?>