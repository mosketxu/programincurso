$(document).ready(function(){
    if(screen.height>1000) {
        $(".alturatabla").height(560);
        $(".alturatabla2").height(760);
        $(".alturatabla3").height(605);
    }
    else {
        $(".alturatabla").height(340);
        $(".alturatabla2").height(520);
        $(".alturatabla3").height(390);
    }

    $(".select2").select2({
        allowClear:true
    });

});

// funcion para añadir registros o actualizar en todos los formularios menos en los de conta
function update(formulario,ruta,limpiar) {
    var token= $('#token').val();

    $.ajaxSetup({
        headers: { "X-CSRF-TOKEN": $('#token').val() },
    });
    var formElement = document.getElementById(formulario);
    var formData = new FormData(formElement);

    $.ajax({
        type:'POST',
         url: ruta,
         data:formData,
         cache:false,
         contentType: false,
         processData: false,
         success: function(data) {
             toastr.success(data[1],{
             'progressBar':true,
             "positionClass":"toast-bottom-center",
             });
             if(limpiar==1)
             document.getElementById(formulario).reset();
         },
         error: function(data){
             var resp_e = data.responseJSON.errors;
             $.each(resp_e,function(key,value) {
                 toastr.error(value,{
                     "closeButton": true,
                     "progressBar":true,
                     "positionClass": "toast-top-center",
                     "options.escapeHtml" : true,
                     "showDuration": "300",
                     "hideDuration": "1000",
                     "timeOut": 0,
                 });
             });
             console.log(data);
            }
     });
 }

 // funcion para añadir registros o actualizar en todos los formularios  menos en los de conta
 function eliminar(ruta,id) {
     $confirmacion=confirm('¿Seguro que lo quieres eliminar?');
     if($confirmacion){
         var row= $(this).parents('tr');
         var form=$('#formDelete'+id);
         var url=ruta;
         var data=form.serialize();

         $.post(url,data,function(result){
             toastr.success(result[1],{
                 "progressBar":true,
                 "positionClass":"toast-top-left",
                 });
             toastr.options.positionClass = 'toast-top-left';
                 $('#tr'+id).fadeOut();
             // row.fadeOut();
         }).fail(function(){
             toastr.error('No se ha eliminado ',{
                 "closeButton": true,
                 "progressBar":true,
                 "positionClass":"toast-top-left",
                 "options.escapeHtml" : true,
                 "showDuration": "300",
                 "hideDuration": "1000",
                 "timeOut": 0,
             });
             console.log(data);
         });
     };
 }

 // funcion para saltar de input en input con ENTER
document.addEventListener('keypress', function(evt) {
    // Si el evento NO es una tecla Enter
    if (evt.key !== 'Enter') {
        return;
    }
    let element = evt.target;
    // Si el evento NO fue lanzado por un elemento con class "focusNext"
    if (!element.classList.contains('focusNext')) {
      return;
    }
    // AQUI logica para encontrar el siguiente
    let tabIndex = element.tabIndex + 1;
    var next = document.querySelector('[tabindex="'+tabIndex+'"]');
    // Si encontramos un elemento
    if (next) {
      next.focus();
      event.preventDefault();
    }
  });

