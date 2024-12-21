import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.start();


window.confirmDelete = function (taskId) {
    Swal.fire({
        title: 'Delete Confirmation',
        text: "Are you sure you want to delete this task? This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, Delete it',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-task-form-${taskId}`).submit();
        }
    });
}


window.copyToClipboard = function (taskId) {
    const linkInput = document.getElementById(`share-link-${taskId}`);
    linkInput.select();
    linkInput.setSelectionRange(0, 99999); // Dla mobilnych urządzeń

    navigator.clipboard.writeText(linkInput.value)
        .then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Copied!',
                text: 'The link has been copied to your clipboard.',
                timer: 2000,
                showConfirmButton: false,
            });
        })
        .catch(err => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Failed to copy the link. Please try again.',
                timer: 2000,
                showConfirmButton: false,
            });
            console.error('Failed to copy link:', err);
        });
}
