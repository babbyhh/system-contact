export function mensg(mensg, tipo, show = 300, hide = 1000, time = 5000, extended = 1000) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": show,
        "hideDuration": hide,
        "timeOut": time,
        "extendedTimeOut": extended,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    if (tipo == 1) {
        //Sucesso
        $("#alert-target").ready(function () {
            toastr.success(mensg, { closeButton: true })
        });
    } else if (tipo == 3) {
         //Informações básicas, dicas, ajudas
        $("#alert-target").ready(function () {
            toastr.info(mensg, { closeButton: true })
        });
    } else if (tipo == 4) {
        //Informações importantes
        $("#alert-target").ready(function () {
            toastr.warning(mensg, { closeButton: true })
        });
    } else {
        //Alerts Críticos
        $("#alert-target").ready(function () {
            toastr.error(mensg, { closeButton: true })
        });
    }
}
