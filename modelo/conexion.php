<?php

/*aquí creamos la conexión a la base de datos, luego ya solo importamos este
archivo php en donde lo necesitemos.

La gran ventaja de hacer eso es que basta con cambiar el código aquí y se actualiza
en todos los lugares donde es llamado.
*/

/*The connect() / mysqli_connect() function opens a new connection to the MySQL server:
mysqli_connect(host, username, password, dbname, port, socket)

En mi caso, cuand instale xampp nunca defini alguna contraseña por lo tanto,
el campo password es ""
*/
$conexion = mysqli_connect("localhost", "root", "", "db_letsave");





