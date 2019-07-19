<?php

require("classConnectionMySQL.php");

// Creamos una nueva instancia
$NewConn = new ConnectionMySQL();

// Creamos una nueva conexion
$NewConn->CreateConnection();


//////////////////////////////
// INSERTAR
//////////////////////////////
$query = "INSERT INTO users( first_name, last_name, email, password) VALUES ('Antoriop','Gutierrez','jg250274@gmail.com','21232f297a57a5a743894a0e4a801fc3')";
$result = $NewConn->ExecuteQuery($query);

if ($result) {
    $RowCount = $NewConn->GetCountAffectedRows();
    if ($RowCount > 0) {
        echo "Query ejecutado exitosamente<BR>";
    }
} else {
    echo "<h3>Error ejecutando la consulta</h3>";
}

//////////////////////////////
// CONSULTAR
//////////////////////////////
$query = "SELECT * FROM users ";
$result = $NewConn->ExecuteQuery($query);
if ($result) {

    while ($row = $NewConn->GetRows($result)) {

        echo "El usuario es:" . $row[1] . " " . $row[2] . " " . $row[3];
        echo "<br>" ;

    }

    $NewConn->SetFreeResult($result);

} else {
    echo "<h3>Error generando la consulta</h3>";
}

////////////////////////////////
// UPDATE
////////////////////////////////

$query = "UPDATE users SET first_name='Elieser' WHERE first_name='Jorge'";
$result = $NewConn->ExecuteQuery("$query");
if ($result) {
    if ($result > 0) {
        echo "Registro actualizado correctamente";
    }

} else {
    echo "<h3>Error ejecutando la consulta</h3>";
}

///////////////////////////////
// ELIMINAR
///////////////////////////////
$query = "DELETE FROM users WHERE id > 1";
$result = $NewConn->ExecuteQuery($query);
if ($result) {
    $RowCount = $NewConn->GetCountAffectedRows();
    if ($RowCount > 0) {
        echo "Eliminado exitosamente";
    }
} else {
    echo "<h3>Error ejecutando la consulta</h3>";
}


// Cerramos la Conexion a la BD
$NewConn->CloseConnection();

?>