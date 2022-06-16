function alert_success()
{
    Swal.fire({
        toast: true,
        position: 'top-right',
        icon: 'success',
        iconColor: 'green',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        title: 'Operação completada com sucesso!'
    });
}

function alert_fail(message)
{
    Swal.fire({
        toast: true,
        position: 'top-right',
        icon: 'error',
        iconColor: 'red',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        title: message
    });
}