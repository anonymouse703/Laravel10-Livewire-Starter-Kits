<script>
    document.addEventListener('livewire:load', function() {
        document.addEventListener("DOMContentLoaded", () => {


            Livewire.hook('message.processed', (component) => {
                setTimeout(function() {
                    $('#alert').fadeOut('fast');
                },3000);
            });
        });


        window.livewire.on('closeSampleModal', () => {
            $('#sampleModal').modal('hide');
        });

        window.livewire.on('openSampleModal', () => {
            $('#sampleModal').modal('show');
        });

        window.addEventListener('confirmSampleDelete', event => {
            // alert('hey click');
            swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: event.detail.showCancelButton,
                confirmButtonColor: event.detail.confirmButtonColor,
                cancelButtonColor: event.detail.cancelButtonColor,
                confirmButtonText: event.detail.confirmButtonText,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('deleteSample', event.detail.id)
                    swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                   
                }
            });

            // Swal.fire()
        });
    });
</script>