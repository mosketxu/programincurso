$(document).ready(function(){
    
    $("#fechaasiento").focus();

    $("#ctrlFacturaYes").click(function(){
        $("#concepto").focus();
    })            
    $("#ctrlFacturaNo").click(function(){
        $("#factura").val('');
        $("#factura").focus();
    })            
 
    // $("#fechaasiento").change(function(){
    //     let ff=$('#fechafactura').val();
    //     if (ff==='')
    //         $('#fechafactura').val($("#fechaasiento").val());
    // });

    $("#baseretencion").change(function(){
        let b=$("#baseretencion").val();
        b=b.replace(',','');
        let v=b*$("#porcentajeretencion").val();
        (Math.round( v * 100 )/100 ).toString();
        $('#retencion').val(v.toFixed(2));
        total();
    });

    $("#porcentajeretencion").change(function(){
        let b=$("#baseretencion").val();
        b=b.replace(',','');
        let v=b*$("#porcentajeretencion").val();
        (Math.round( v * 100 )/100 ).toString();
        $('#retencion').val(v.toFixed(2));
        total();
    });

    $("#baserecargo").change(function(){
        let b=$("#baserecargo").val();
        b=b.replace(',','');
        let v=b*$("#porcentajerecargo").val();
        (Math.round( v * 100 )/100 ).toString();
        $('#recargo').val(v.toFixed(2));
        total();
    });

    $("#porcentajerecargo").change(function(){
        let b=$("#baserecargo").val();
        b=b.replace(',','');
        let v=b*$("#porcentajerecargo").val();
        (Math.round( v * 100 )/100 ).toString();
        $('#recargo').val(v.toFixed(2));
        total();
    });


    $("#provcli_id").change(function() {
        let prov=$("#provcli_id").val();
        categoriairpf(prov);
    })


    // $("#tablaasientos").tablesorter();
    
    // $("#tablaasientos").tablesorter( {sortList: [[4,0]]} );

});

function baseporiva(base,iva,piva){
    let b=$(base).val();
    b=b.replace(',','');
    let v=b*piva;
    (Math.round( v * 100 )/100 ).toString();
    $(iva).val(v.toFixed(2));
    if(base=="#base21"){
        var br=0;
        var pr=$('#porcentajeretencion').val();
        if(pr>0){
            br=$("#base21").val();
            $('#baseretencion').val(br);
            let r=br*pr;
            (Math.round( r * 100 )/100 ).toString();
            $('#retencion').val(r.toFixed(2));
        }
    }
    total();
}

function total(){
    var base21=$("#base21").val();
    var iva21=$("#iva21").val();
    var base10=$("#base10").val();
    var iva10=$("#iva10").val();
    var base4=$("#base4").val();
    var iva4=$("#iva4").val();
    var exento=$("#exento").val();
    var retencion=$("#retencion").val();
    var recargo=$("#recargo").val();
    var total;
    base21= base21=='' ? 0 : parseFloat(base21);
    iva21= iva21=='' ? 0 : parseFloat(iva21);
    base10= base10=='' ? 0 : parseFloat(base10);
    iva10= iva10=='' ? 0 : parseFloat(iva10);
    base4= base4=='' ? 0 : parseFloat(base4);
    iva4= iva4=='' ? 0 : parseFloat(iva4);
    exento= exento =='' ? 0 : parseFloat(exento);
    retencion=retencion=='' ? 0 : parseFloat(retencion);
    if(recargo)
        alert('recargo si');
    else
        recargo=0;
    recargo=recargo=='' ? 0 : parseFloat(recargo);
    total=base21+iva21+base10+iva10+base4+iva4+exento-retencion+recargo; 
    (Math.round( total * 100 )/100 ).toString();
    $('#totalnuevo').val(total.toFixed(2));
}

// funcion para añadir registros solo en los de conta
function addline() {
    let controlfecha;
    controlfecha=controlperiodo();
    if(controlfecha==0){

        $("#creaForm").submit();
        // var token= $('#token').val();
        // ruta="/conta/store";
        // formulario='creaForm';
        // $.ajaxSetup({
        //     headers: { "X-CSRF-TOKEN": $('#token').val() },
        // });
        // var formElement = document.getElementById(formulario);
        // var formData = new FormData(formElement);
        // var fila="";
        // var id='';
        // var cierre='';
        // var form='';
        // var i="0";
        // var clase=""

        // $.ajax({
        //     type:'POST',
        //     url: ruta,
        //     data:formData,
        //     cache:false,
        //     contentType: false,
        //     processData: false,
        //     success: function(data) {
        //         toastr.success('Asiento Añadido',{
        //         'progressBar':true,
        //         "positionClass":"toast-bottom-center",
        //         });
        //         document.getElementById(formulario).reset();
        //         $('#provcli_id').val(null).trigger('change');
        //         $('#categoria_id').val(null).trigger('change');
        //         fila="<tr id='tr"+data.id+"'><td><a href='#' title='Editar' disabled><i class='far fa-edit text-muted fa-lg ml-2'></i></a>"+
        //             "<a href='#' title='Actualizar' disabled><i class='fas fa-check-circle text-muted fa-lg ml-2'></i></a></td>";
        //         $.each(data,function(key,value){
        //             if (i>9) clase='class="text-right"';
        //             i++;
        //             if(key=='id') {
        //                 id="'"+value+"'";
        //                 form='formDelete'+value;
        //             };
        //             if(key=='token') token=value
        //             else if(i>2)
        //                 fila=fila + '<td '+clase+'>'+value+'</td>' ;
        //         });
        //         cierre="<td class='text-right m-0 pr-3'>"+
        //                 "<form  id="+form+">"+
        //                 "<input type='hidden' name='_method' value='POST' />"+
        //                 "<input type='hidden' name='_token' value="+token+" />"+
        //                 "<a href='#!' class='btn-delete' title='Eliminar' " +  
        //                 'onclick="eliminarfila('+id+')"><i class="far fa-trash-alt text-danger fa-lg ml-1"></i></a>'+
        //                 "</form>";

        //         fila=fila+cierre+'</tr>';
                
        //         $('#bodyasientos tr:first').before(fila);
        //         if(data.tipo=='E')
        //             $("#factura").val(data.facturanueva);

        //         $('#fechaasiento').focus();

        //     },
        //     error: function(data){
        //         var resp_e = data.responseJSON.errors;
        //         $.each(resp_e,function(key,value) {
        //             toastr.error(value,{
        //                 "closeButton": true,
        //                 "progressBar":true,
        //                 "positionClass": "toast-top-center",
        //                 "options.escapeHtml" : true,
        //                 "showDuration": "300",
        //                 "hideDuration": "1000",
        //                 "timeOut": 0,
        //             });
        //         });
        //         console.log(data);
        //         }
        // });
    }
 }

// funcion para añadir registros solo en los de conta
function updateon(form) {
    var token= $('#token').val();
    ruta="/conta/updateon";
    formulario=form;
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
            toastr.success('Asiento Actualizado');
            $('#fechaasiento').focus();
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

// funcion para eliminar registros solo en los de conta
function eliminarfila(id) {
     ruta = "/conta/" + id;
     
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

// funcion para controlar factura repetida en conta
function controlfactura(formulario,ruta) {
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
            if (data>0)
                $("#controlfactura").modal()
         },
     });
 }



// Funcion para ejecutar guardar en conta sin tener que hacer clic con CTRL-S (desactiva el CTRL-S por defecto)
$(document).keydown(function (e) {
    e = e || event;
    if (e.ctrlKey && e.shiftKey && String.fromCharCode(e.keyCode) == 'S')
    {
        e.preventDefault();
        // document.getElementById("btn_nuevo").click();
        $('#btn_add').click();
    }
});

$(document).keydown(function (e) {
    e = e || event;
    if (e.ctrlKey && e.shiftKey && String.fromCharCode(e.keyCode) == 'V')
    {
        e.preventDefault();
        $('#btn_volver').click();
    }
});


// dar formato a numero
function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}

function controlperiodo(){
    let f=$('#fechaasiento').val();
    var date = new Date(f);
    let periodo=$("#periodo").val();
    let anyo=$("#anyo").val();
    month = date.getMonth() + 1;
    year = date.getFullYear();
    let control=0;

    switch (periodo) {
        case '13':
            if(year!=anyo || month>3){
                control=1;
            }
            break;
        case '14':
            if(year!=anyo || month>6 || month<4){
                control=1;
            }
            break;
        case '15':
            if(year!=anyo || month>9 || month<7){
                control=1;
            }
            break;
        case '16':
            if(year!=anyo || month<10){
                control=1;
            }
            break;
        default:
            if(year!=anyo || month!=periodo){
                control=1;
            }
    }
    if (control!=0){
        var opcion;
        opcion=confirm("La fecha no corresponde al periodo. ¿Deseas continuar?");
        if (opcion == true) {
            control = 0;
        } 
    }
    return control;
};

// funcion para recuperar la categoria de un proveedor
function categoriairpf(prov) {
    ruta='/provcli/categoriairpf/'+prov;
    $.get(ruta,function(data){
        console.log(data);
        if(data.id){
            $('#categoria_id').val(data.id);
            $('#categoria_id').val(data.id).attr('selected','selected')
        }
        $('#porcentajeretencion').val(data.irpf);
        $('#porcentajeretencion').val(data.irpf).attr('selected','selected')
    })
 }

