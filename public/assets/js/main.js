
const inputs = document.getElementsByTagName('input');
const mayuscula = function(e) {
    e.value = e.value.toUpperCase();
}

for (i = 1; i < inputs.length; i++) {
    if (inputs[i].getAttribute('type') == 'text' && inputs[i].id !== 'password') {
        let id = inputs[i].getAttribute('id');
        let input = document.getElementById(id);
        inputs[i].onkeyup = function() {
            mayuscula(input);
        }
    }
}



const deletePrograma = (id)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/programas/destroy/${id}`;
    }
  })
}

const deleteCurso = (id)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/cursos/destroy/${id}`;
    }
  })
}


const deleteProfesor = (dato)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/profesores/destroy/${dato}`;
    }
  })
}


const deleteEstudiante = (dato)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/estudiantes/destroy/${dato}`;
    }
  })
}



const deleteNota = (dato)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/notas/destroy/${dato}`;
    }
  })
}


const deleteMateria = (dato)=>{
  Swal.fire({
    icon: 'warning',
    title: '¿Seguro que deseas realizar esta acción?',
    showCancelButton: true,
    confirmButtonText: 'OK',
  }).then((result) => {
    if (result.isConfirmed) {
      location.href =`/materias/destroy/${dato}`;
    }
  })
}



(function() {
  "use strict";

  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }


  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function(e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }


  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function(e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  const mainContainer = select('#main');
  if (mainContainer) {
    setTimeout(() => {
      new ResizeObserver(function() {
        select('.echart', true).forEach(getEchart => {
          echarts.getInstanceByDom(getEchart).resize();
        })
      }).observe(mainContainer);
    }, 200);
  }

})();
