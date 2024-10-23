<html>
<body>

<?PHP
define ("CONSTANTE", "Hola Mundo");
printf (CONSTANTE);
?>

</body>
</html>

$basedatos = "mydb";

//conectamos con el servidor

$link = @mysql_connect("localhost", "root", "");

 

// comprobamos que hemos estabecido conexión en el servidor

if (! $link){

echo "<h2 align='center'>ERROR: Imposible establecer conección con el servidor</h2>";

exit;

}

// obtenemos una lista de las bases de datos del servidor

$db = mysql_list_dbs();

 

// vemos cuantas BD hay

$num_bd = mysql_num_rows($db);

 

//comprobamos si la BD que quermos crear exite ya

$existe = "NO" ;

for ($i=0; $i<$num_bd; $i++) {

if (mysql_dbname($db, $i) == $basedatos) {

$existe = "SI" ;

break;

}

}

 

// si no existe la creamos

if ($existe == "NO") {

/* manera 1 */

if (! mysql_create_db($basedatos, $link)) {

echo "<h2 align='center'>ERROR 1: Imposible crear base de datos</h2>";

exit;

} 

/* class="codigo" style="margin-left: 50"> /* manera 2 

if (! mysql_query("CREATE DATABASE $basedatos", $link)){

echo "<h2 align='center'>ERROR2: Imposible crear base de datos</h2>";

exit;

} */

}

 

// craamos la tabla

$sql = "CREATE TABLE agenda (";

$sql .= "id INT NOT NULL AUTO_INCREMENT, ";

$sql .= "nombre CHAR(50), ";

$sql .= "direccion CHAR(100), ";

$sql .= "telefono CHAR(15), ";

$sql .= "email CHAR(50), ";

$sql .= "KEY (id) ) ";

 

if (@mysql_db_query($basedatos, $sql, $link)) {

echo "<h2 align='center'>La tabla se ha creado con éxito</h2>";

} else {

echo "<h2 align='center'>No se ha podido crear la tabla</h2>";

}

 

?>

 

</body>
</html>
