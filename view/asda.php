<script>
   // Función "añadir cero".
function addZero(x, n) {
  while (x.toString().length < n) {
    x = "0" + x;
  }
  return x;
}

// Añadir control al elemento "p" principal de la página.
function addControl() {
  var d = new Date();
  var x = document.getElementById("demo");
  var h = addZero(d.getHours(), 2);
  var m = addZero(d.getMinutes(), 2);
  var s = addZero(d.getSeconds(), 2);
  var ms = addZero(d.getMilliseconds(), 3);
  x.innerHTML += "<input type='text' id="'id'" value='" + h + m + s + ms + "' name='id'>
}
console.log(addControl())
</script>

<button onclick="addControl()">sdas</button>
<p id="demo"></p>

<form method="POST" action="index.php">
    <div id="demo">

    </div>
    <button type="submit"> enviar</button>
</form>