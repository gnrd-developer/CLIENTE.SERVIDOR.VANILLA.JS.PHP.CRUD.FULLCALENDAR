
var myModal = new bootstrap.Modal(document.getElementById('myModal'));
let frm = document.getElementById('formulario');
let eliminar = document.getElementById('btnEliminar');

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar: {
        left: 'prev,next,today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      events: base_url + 'Home/listar',

      editable: true,

        dateClick: function(info) {
          console.log(info);
          frm.reset();
          eliminar.classList.add('d-none');
          document.getElementById('id').classList.add('d-none');
          document.getElementById('start').value = info.dateStr;
          document.getElementById('btnAccion').textContent = 'Registralo';
          document.getElementById('titulo').textContent = 'Registra tu evento ahora';
          myModal.show();
        },
        eventClick: function(info) {
          console.log(info);
          document.getElementById('titulo').textContent = 'Edita tu evento';
          eliminar.classList.remove('d-none');
          document.getElementById('btnEliminar').textContent = 'Eliminalo';
          document.getElementById('btnAccion').textContent = 'Modificalo';
          document.getElementById('id').value = info.event.id;
          document.getElementById('title').value = info.event.title;
          document.getElementById('start').value = info.event.startStr;
          document.getElementById('color').value = info.event.backgroundColor;
          myModal.show();
        },
        eventDrop: function(info) {
          const id = info.event.id;
          const start = info.event.startStr;
          console.log(id, start);
          const url = base_url + 'Home/drop';
          const http = new XMLHttpRequest();
          const data = new FormData();
          data.append('id', id);          
          data.append('start', start);
          http.open('POST', url, true);
          http.send(data);
          http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              const respuesta = JSON.parse(http.responseText);
              if (respuesta.estado) {
                calendar.refetchEvents();
              }
              swal.fire(
                'Aviso',
                respuesta.msg,
                respuesta.tipo
              );
            }
          }
        }
    });
    calendar.render();
    /* Despues del render a continuacion a la variable frm
      se le agrega un evento de escucha 'addEventListener' al momento que se hafa submit el formulario
      y se ejecute una funsión, esta funcción será anonima, y le llega como parametro un evento.
    */
    frm.addEventListener('submit', function(e) {
      e.preventDefault();
      const title = document.getElementById('title').value;
      const fecha = document.getElementById('start').value;
      const color = document.getElementById('color').value;
      if (title == '' || fecha == '' || color == '') {
        Swal. fire(
          'Aviso',
          'Todos los campos son obligatorios',
          'warning'
        );
      }else {
        const url = base_url + 'Home/registrar';
        const http = new XMLHttpRequest(); //aqui creamos una constante.
        http.open('POST', url, true); //aqui abrimos la conexion con el servidor. el true es para que sea asincrono.
        http.send(new FormData(frm)); //aqui enviamos los datos del formulario.
        http.onreadystatechange = function() {
          //aqui creamos una funcion anonima. Donde verificamos los estados.
          if (this.readyState == 4 && this.status == 200) {//a continuación hacemos un parseo
            const respuesta = JSON.parse(http.responseText);
            if (respuesta.estado) {
              calendar.refetchEvents();
            }
            myModal.hide();
            swal.fire(
              'Aviso',
              respuesta.msg,
              respuesta.tipo
            );
          }
        }
      }
  });


  eliminar.addEventListener('click', function() {
    
    myModal.hide();
    Swal.fire({
      title: '¿Estas seguro?',
      text: "No podras revertir esto",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminalo!',
      cancelButtonText: 'No, cancelar!'
    }).then((result) => {
      if (result.isConfirmed){
        const url = base_url + 'Home/eliminar/' + document.getElementById('id').value;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            const respuesta = JSON.parse(http.responseText);
            if (respuesta.estado) {
              calendar.refetchEvents();
            }
            swal.fire(
              'Aviso',
              respuesta.msg,
              respuesta.tipo
            );
          }
        }
      }
    })

  });

} );

  /*
  dateClick: function(info) {
    console.log(info);
    document.getElementById('start').value = info.dateStr;
  }
  console.log(info);
  En consola se 
  puede ver que al hacer clic en una fecha 
  en consola gracias a la funcion dateClick
  me devuelve un array con datos de la fecha
  */