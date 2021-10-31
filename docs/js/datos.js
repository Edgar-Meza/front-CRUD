window.onload = function(){
    obtener = () =>{
        axios.get('https://crudbpke.herokuapp.com/public/read')
        .then(res=>{
            var tabla = document.getElementById('datos');
            res.data.map(datos=>{
                tabla.innerHTML = tabla.innerHTML+'<tr><td>'+datos.idusuario+'</td>'+
                                                '<td>'+datos.Nombre+'</td>'+
                                                '<td>'+datos.Correo+'</td>'+
                                                '<td>'+datos.Nombre_usuario+'</td>'+
                                                '<td class="text-primary btn-actualizar p-0 text-center" data-bs-toggle="modal" data-bs-target="#datosi" onClick="actualizar('+datos.idusuario+',\''+datos.Nombre+'\',\''+datos.Correo+'\',\''+datos.Nombre_usuario+'\')"><span class="bi-pencil-square"></span></td>'+
                                                '<td class="text-danger btn-eliminar p-0 text-center" data-bs-toggle="modal" data-bs-target="#eliminar" onClick="eliminar('+datos.idusuario+')"><span class="bi-trash"></span></td></tr>';
            })
        })
    }

    obtener();
}

agregar = () =>{
    var nom, mail, user;

    nom = document.getElementById('nombred').value;
    mail = document.getElementById('correod').value;
    user = document.getElementById('usuariod').value;

    var body = {
        "Nombre": nom,
        "Correo": mail,
        "Nombre_usuario": user
    };

    axios.post('https://crudbpke.herokuapp.com/public/create', body)
    .then(res=>console.log('enviado'));

    alert('Dato agregado!!');

}

actualizarr = () =>{
    var id, nom, mail, user;

    id = document.getElementById('idup').value;
    nom = document.getElementById('nombred').value;
    mail = document.getElementById('correod').value;
    user = document.getElementById('usuariod').value;

    var body = {
        "Nombre": nom,
        "Correo": mail,
        "Nombre_usuario": user
    };

    axios.put('https://crudbpke.herokuapp.com/public/update/'+id, body)
    .then(res=>console.log('enviado'));

    alert('Dato Actualizado!!');
    
}

eliminarr = () => {
    var id = document.getElementById('idelete').value;
    
    axios.delete('https://crudbpke.herokuapp.com/public/delete/'+id)
    .then(res=>console.log('enviado'));

    alert('Dato Eliminado!!');
}