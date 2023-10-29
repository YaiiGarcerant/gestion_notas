(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => { 
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()



const validarForm = (form)=>{
  event.preventDefault();
  let formulario = document.getElementById(`formEdit${form}`)
  if (!formulario.checkValidity()) {
    let elements = formulario.elements;
    let arr = [].slice.call(elements);
    arr.forEach(element => {
      let mensaje = document.getElementsByClassName(element.id)
      if(!element.checkValidity()){
        mensaje[0].classList.remove('d-none');
        element.classList.add('border-danger');
      }else{
        if(mensaje[0] && !mensaje[0].classList.contains('d-none')){
          mensaje[0].classList.add('d-none');
          element.classList.remove('border-danger');
        }
      }
    });
  }else{
    Swal.fire({
      icon: 'warning',
      title: '¿Seguro que deseas realizar esta acción?',
      showCancelButton: true,
      confirmButtonText: 'OK',
    }).then((result) => {
      if (result.isConfirmed) {
        formulario.submit();
      }
    })
  }
}


new DataTable('.table-datatable', {
  responsive: true,
  info: false,
  "language": {
    "lengthMenu": "Mostrar _MENU_ registros por páginas",
    "zeroRecords": "No se encontro ningun registro - Disculpa",
    "infoEmpty": "No records available",
    "search": "Buscar Registros:",
    "loadingRecords": "Cargando Registros...",
    "paginate": {
      "first":      "Primera",
      "last":       "Última",
      "next":       "Siguiente",
      "previous":   "Previa"
    }
  },  
});


const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

if(myModal){
  myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
  })
}

