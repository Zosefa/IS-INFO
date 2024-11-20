document.addEventListener('DOMContentLoaded', function () {
    const toasts = document.querySelectorAll('.toast');

    toasts.forEach(function (toast) {
        toast.classList.add('show');

        setTimeout(function () {
            toast.classList.add('fade-out');
        }, 5000); 
        toast.addEventListener('transitionend', function () {
            if (toast.classList.contains('fade-out')) {
                toast.remove();
            }
        });
    });
});
