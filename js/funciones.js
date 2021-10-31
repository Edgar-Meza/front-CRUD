function d_nombre() {
    var nombre = document.getElementById('nombre');
    document.getElementById('nombred').value = nombre.value;
}
function d_usuario() {
    var apellidos = document.getElementById('usuario');
    document.getElementById('usuariod').value = apellidos.value;
}
function d_correo() {
    var correo = document.getElementById('correo');
    document.getElementById('correod').value = correo.value;
}
function eliminar(idel) {
    document.getElementById('idelete').value = idel;
}
function actualizar(idu, nombre, correo, usuario) {
    document.getElementById('save').style.display = 'none';
    document.getElementById('update').style.display = 'block';
    document.getElementById('idup').value = idu;
    document.getElementById('nombre').value = nombre;
    document.getElementById('usuario').value = usuario;
    document.getElementById('correo').value = correo;
    document.getElementById('nombred').value = nombre;
    document.getElementById('usuariod').value = usuario;
    document.getElementById('correod').value = correo;
}
function nuevo() {
    document.getElementById('idup').value = "";
    document.getElementById('nombre').value = "";
    document.getElementById('usuario').value = "";
    document.getElementById('correo').value = "";
    document.getElementById('nombred').value = "";
    document.getElementById('usuariod').value = "";
    document.getElementById('correod').value = "";
}