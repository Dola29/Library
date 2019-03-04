# Library
REST API para consumir el listado de libros disponibles en una librería(GBH). También se puede leer los libros pagina por pagina en formato: Texto plano y HTML.

<h3>Estos son los requerimientos necesarios para poder instalar el projecto:</h3>
<ul>
    <li>Servidor Apache</li>
    <li>MySql</li>
    <li>Composer</li>
</ul>

<h3>Pasos para usar el proyecto:</h3>
<ul>
    <li>Dentro de la carpeta del proyecto, atravez de la linea de comandos ejecutar: composer install</li>
    <li>Colocar el proyecto en la carpeta htdocs</li>
    <li>Importar o copiar y pegar en la consola de MySql lo comandos para crear las tablas e insertar la data. El archivo esta ubicado dentro de la carpeta migration</li>
    <li> revisar que las variables: $host, $db_name, $username, $password tengan los valores correctos dentro de la calse database en el floder config.</li>
    <li> acceder a: http://localhost/library/ </li>
</ul>