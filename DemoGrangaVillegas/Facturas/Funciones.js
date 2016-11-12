
/* global total */

//globales
var precio;
var ids = 1;
var idsub = 100;
var listaProductos = new Array();
var listaProductosFinal = new Array();
var posicionlista = 0;
var totalFactura = 0;

function Factura() {

    var value1 = 1;


    var oRadio1 = document.forms[0].elements["group1"];
    // recorremos todos los valores hasta encontrar el seleccionado
    for (var i = 0; i < oRadio1.length; i++)
    {
        if (oRadio1[i].checked)
        {
            value1 = oRadio1[i].value;

            break;
        }

    }

    if (value1 == "credito") {


        str = value1;
        if (str.length == 0) {

            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            document.getElementById("tipoFactura").setAttribute("value", 2);
            xmlhttp.open("GET", "buscarClienteCredito.php?q=" + str, true);
            xmlhttp.send();
        }
        //Dentra si marco Contado   
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };


        xmlhttp.open("GET", "AgregarProductos.php?metodo=metodo", true);
        xmlhttp.send();

    }

}
function tipoFactura() {

    var value1 = 1;


    var oRadio1 = document.forms[0].elements["group1"];
    // recorremos todos los valores hasta encontrar el seleccionado
    for (var i = 0; i < oRadio1.length; i++)
    {
        if (oRadio1[i].checked)
        {
            value1 = oRadio1[i].value;

            break;
        }

    }

    if (value1 == "credito") {


        str = value1;
        if (str.length == 0) {

            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "buscarClienteCredito.php?q=" + str, true);
            xmlhttp.send();
        }
        //Dentra si marco Contado   
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };


        xmlhttp.open("GET", "AgregarProductos.php?metodo=metodo", true);
        xmlhttp.send();

    }

}



//Metodo probado sirve
function buscarCliente() {

    var nombre = document.getElementById("nombre").value;
    var cedula = document.getElementById("cedula").value;


    if ((nombre.length == 0) && (cedula.length == 0)) {

        document.getElementById("txtHint").innerHTML = "";

        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;

            }
        };

        var metodo = "BuscarCliente";
        xmlhttp.open("GET", "buscarClienteCredito.php?nombre=" + nombre + "&cedula=" + cedula + "&metodo=" + metodo, true);
        xmlhttp.send();
    }

}
///////////////////Fin Metodo////

function buscarDeudas(id) {

    var nombre = "";
    var cedula = "";
    var j = 0;

    for (var i = 0; i < id.length; i++) {

        if (id.charAt(i) == '-') {
            j = 1
        }
        if (j == 0) {
            nombre += id.charAt(i);
        } else {
            if (id.charAt(i) != '-') {
                cedula += id.charAt(i);
            }
        }
    }

    if ((nombre.length == 0) && (cedula.length == 0)) {

        document.getElementById("txtHint").innerHTML = "";

        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {


                document.getElementById("txtHint").innerHTML = this.responseText;

            }
        };
        //alert("nombre "+nombre+"Cedula "+cedula);
        var metodo = "ListaDeudas";
        xmlhttp.open("GET", "buscarClienteCredito.php?nombre=" + nombre + "&cedula=" + cedula + "&metodo=" + metodo, true);
        xmlhttp.send();
    }

}
function refrescar() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {


            document.getElementById("txtHint").innerHTML = "";
        }
    };


    xmlhttp.open("GET", "FormFactura.php?", true);
    xmlhttp.send();

}
// pasar el nombre y cedula a factura
function Facturar() {

    var nombre = document.getElementById("nombreFinal").value;
    var cedula = document.getElementById("cedulaFinal").value;



    if (nombre.length == 0) {
        document.getElementById("nombreFCliente").setAttribute('value', nombre);
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            document.getElementById("nombreFCliente").setAttribute('value', nombre);
            document.getElementById("cedulaFCliente").setAttribute('value', cedula);
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AgregarProductos.php?nombre=" + nombre + "&cedula=" + cedula, true);
        xmlhttp.send();
    }
}


function buscarProducto() {

    var codigo = document.getElementById("codigo").value;
    var producto = document.getElementById("producto").value;


    if ((producto.length == 0) && (codigo.length == 0)) {

        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        var metodo = "consulta";
        xmlhttp.open("GET", "AgregarProductos.php?producto=" + producto + "&codigo=" + codigo + "&metodo=" + metodo, true);
        xmlhttp.send();
    }

}
function crearCampoModificable() {

    var td = document.createElement('td');

    var txt = document.createElement('input');

    txt.type = 'text';


    txt.setAttribute('value', 0);
    txt.setAttribute('id', 'cant');
    // txt.setAttribute('onkeyup','totalproducto(this)');
    td.appendChild(txt);

    // totalproducto(txt);
    return txt;
}


//Metodos para la tabla agregar Productos
function crearCampo(nombre, valor, precio) {

    var td = document.createElement('td');

    var txt = document.createElement('input');

    txt.type = 'text';


  

    txt.setAttribute('name', nombre);
    txt.setAttribute('value', valor);
    txt.setAttribute('precio', precio);
    txt.setAttribute('readonly', "readonly");
    td.appendChild(txt);


    return td;
}

function crearProducto(codigo, precio, nombre, cantidad) {
    var codigo;
    var precio;
    var nombre;
    var cantidad;

    this.codigo = codigo;
    this.precio = precio;
    this.nombre = nombre;
    this.cantidad = cantidad;

    this.setNombre = function (nombre) {
        this.nombre = nombre;
    };
    this.getNombre = function () {
        return this.nombre;
    };
    this.setPrecio = function (precio) {
        this.precio = precio;
    };
    this.getPrecio = function () {
        return this.precio;
    };


    this.setCodigo = function (codigo) {
        this.codigo = codigo;
    };
    this.getCodigo = function () {
        return this.codigo;
    };
    this.setCantidad = function (cantidad) {
        this.cantidad = cantidad;
    };
    this.getCantidad = function () {
        return this.cantidad;
    };


}


function nuevoProducto(codigo, nombre, precio, cantidad) {
    // codigo,precio,nombre,cantidad     
    //codigo,precio,nombre,cantidad) 

    //   alert("Precio Nuevo="+precio);
    var producto = new crearProducto(codigo, precio, nombre, 1);
    listaProductos.push(producto);
    var destino = document.getElementById('tbDetalle');
    var tr = document.createElement('tr');
    totalFactura = totalFactura + precio;
    tr.appendChild(crearCampo("name", nombre));
    tr.appendChild(crearCampo("codigo", codigo));


    tr.appendChild(crearCampo("precio", precio));

    //  var cant=crearCampoModificable();


    var td = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');

    var x = document.createElement('button');

    var subtotal = document.createElement('input');

    var txt = document.createElement('input');

    txt.type = 'text';


    txt.setAttribute('value', 1);
    txt.setAttribute('id', ids);

    idsub = 100 + ids;

    subtotal.type = 'text';
    subtotal.setAttribute('readonly', "readonly");
    subtotal.setAttribute('id', idsub);
    // subtotal.setAttribute('value',1);
    subtotal.setAttribute('name', 'sub');




    txt.setAttribute('onkeyup', 'totalproducto(this,this.id)');

    x.type = 'button';
    x.innerHTML = 'Eliminar';
    x.setAttribute("id", posicionlista);

    x.setAttribute('onclick', 'eliminarFila(this,this.id)');

    posicionlista = posicionlista + 1;
    // alert("Posicion="+posicionlista);
    td3.appendChild(txt);
    td2.appendChild(subtotal);
    td.appendChild(x);
    //----------------
    tr.appendChild(td3);
    tr.appendChild(td2);
    tr.appendChild(td);
    //------------------


    //agrega a la tabla
    destino.appendChild(tr);
    totalproducto(txt, ids);
    ids++;
}
function eliminarFila(btn, id) {

    if (confirm("Quiere eliminar producto de la lista")) {
        var posicion = parseInt(id);
        totalFactura = totalFactura - listaProductos[posicion].getPrecio();
        delete  listaProductos[posicion];
        listaProductos.splice(posicion, posicion);

        fila = btn.parentNode.parentNode;
        fila.parentNode.removeChild(fila);

    }
}

//agrega el precio segun la cantidad
function totalproducto(txt, idc) {

    var cantidad = txt.value;
    var idSubtotal = 0;

    idSubtotal = (100 + parseInt(idc));
    var i = parseInt(idc) - 1;

    if (cantidad != 0) {
        totalFactura = totalFactura - listaProductos[i].getPrecio();
        precio = listaProductos[i].getPrecio() * cantidad;
        totalFactura = totalFactura + precio;
        //  precio=0;
        //  alert("totalFactura="+totalFactura);
    }
    listaProductos[i].setPrecio(precio);
    listaProductos[i].setCantidad(cantidad);
    //alert("Precio MOdificado en lista=>>"+ listaProductos[i].getPrecio()+ " "+ listaProductos[i].getCantidad());
    document.getElementById(idSubtotal).setAttribute('value', precio);
    // precio=0;
    // alert(" lista=>>"+ listaProductos[i].getCodigo()+ " "+ listaProductos[i].getNombre()+ " "+ listaProductos[i].getPrecio()+ " "+ listaProductos[i].getCantidad());    

}
////Fin

function GuardarFactura() {

    if (confirm("Confirmar factura")) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                // document.getElementById("txtHint").innerHTML = this.responseText;
                document.getElementById("txtHint").innerHTML = "";
                //document.getElementById("txtHint").innerHTML = "";
            }
        };
        var metodo = "consulta";
        var nombre = document.getElementById("nombreFCliente").value;
        var cedula = document.getElementById("cedulaFCliente").value;
        var fecha = document.getElementById("fechaFactura").value;
        var tipoFactura = document.getElementById("tipoFactura").value;
        //  alert("cedula="+cedula+" "+nombre);
        //  var j=0;
        for (var i = 0; i < listaProductos.length; i++) {



            listaProductosFinal.push(listaProductos[i].getCodigo());

            listaProductosFinal.push(listaProductos[i].getPrecio());


            listaProductosFinal.push(listaProductos[i].getCantidad());

            //listaProductosFinal.push(",");

        }



        xmlhttp.open("GET", "RegistrarFactura.php?lista=" + listaProductosFinal + "&cedula=" + cedula + "&nombre=" + nombre + "&tipoFactura=" + tipoFactura + "&totalFactura=" + totalFactura + "&fecha=" + fecha, true);
        xmlhttp.send();
    }
}

function agregarProducto(id) {
    document.getElementById("registrar").setAttribute("type", "button");
    var nombre = "";
    var codigo = "";
    var precioL = "";
    var j = 0;
    if (confirm("Quiere agregar este producto a la lista")) {
        for (var i = 0; i < id.length; i++) {

            if (id.charAt(i) == '-') {
                j = j + 1;
            }
            if (j == 0) {
                nombre += id.charAt(i);

            }
            if (j == 1) {
                if (id.charAt(i) != '-') {
                    codigo += id.charAt(i);
                }
            }
            if (j == 2) {
                if (id.charAt(i) != '-') {
                    precioL += id.charAt(i);
                }
            }

        }

        ////
        if ((nombre.length == 0) && (codigo.length == 0)) {


        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    precio = parseInt(precioL);
                    var cantidad;
                    cantidad = 1;
                    //  alert("nombre "+nombre);
                    //   alert("codigo "+codigo);
                    //  alert("precio= "+precio);
                    // (codigo,precio,nombre,cantidad)

                    nuevoProducto(codigo, nombre, precio, cantidad);



                }
            };


            xmlhttp.open("GET", "FormFactura.php", true);
            xmlhttp.send();
        }
    }

}














//////////////////
function buscar() {

    alert("inicia -->>")
    var tableReg = document.getElementById('tabla');
    //var searchText = document.getElementById('searchTerm').value.toLowerCase();
    var cellsOfRow = "";
    var found = false;
    var compareWith = "";
    alert("Sirve -->>")
    // Recorremos todas las filas con contenido de la tabla

    for (var i = 1; i < tableReg.rows.length; i++)
    {


        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {

            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (compareWith.options[j].on) {
                alert("Dentra -->>")
            }

            alert(tableReg.rows[i].style.display = '');


        }

    }
    alert("sale -->>")
}
