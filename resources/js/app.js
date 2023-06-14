require('./bootstrap');

function dataTableController (id) {
    return { 
        id,
        deleteItem() {
            Swal.fire({
                title: '¿Estás seguro que desea eliminar?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0E4D46',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrar esto'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteItem', this.id);
                }
            })
        }
    }
}
 
function dataTableMainController () {
    return {
        setCallback() {
            Livewire.on('deleteResult', (result) => {
                if (result.status) {
                    Swal.fire(
                        'Eliminado!',
                        result.message,
                        'success'
                    );
                } else {
                    Swal.fire(
                        'Error!',
                        result.message,
                        'error'
                    );
                }
            });
        }
    }
}

window.__controller = {
    dataTableController,
    dataTableMainController
}
