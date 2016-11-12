<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" href="CCS.css">
        <script>
       //Buscamos todos los span que tiene la clase editar.
var a = document.querySelectorAll(".editar");
for(var b in a){ //Como nos devuelve un array iteramos
  var c = a[b];
  if(typeof c == "object"){ //Solo buscamos los objetos
     c.onclick = function (){ //Asignamos un evento onclick
       var td = this.offsetParent; //Localizamos el TD
       var tr = td.parentElement;  //LLegamos hasta el TR
       var columna2 = tr.children[1]; // Buscamos la Columna NOMBRE
       alert("Quieres editar al Usuario: "+columna2.textContent);
     }
  }
}

var d = document.querySelectorAll(".eliminar");
for(var e in d){
  var f = d[e];
  if(typeof f == "object"){
     f.onclick = function (){
       var td = this.offsetParent;
       var tr = td.parentElement;
       var columna1 = tr.children[0]; // Buscamos la Columna #
       alert("Quieres eliminar al ID: "+columna1.textContent);
     }
  }
}
</script>
<table>
  <thead>
    <tr><th>#</th><th>Nombre</th><th>Acciones</th></tr>
  </thead>
  <tbody>
    <tr><td>1</td> <td>Juanito Pérez</td><td> <span class="editar">editar</span> <span class="eliminar">eliminar</span></td></tr>
<tr><td>2</td><td>Juanito Ramiez</td><td><span class="editar">editar</span><span class="eliminar">eliminar</span></td></tr>
    <tr><td>3</td><td>Juanito Carrasco</td><td><span class="editar">editar</span><span class="eliminar">eliminar</span></td></tr>
    <tr><td>4</td><td>Juanito Méndez</td><td><span class="editar">editar</span><span class="eliminar">eliminar</span></td></tr>
  </tbody>
</table> 
    </body>
</html>
