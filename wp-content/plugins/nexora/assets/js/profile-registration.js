document.addEventListener('DOMContentLoaded', function () {

    jQuery(document).on('submit', '#profile-registration-form', function (e) {

        e.preventDefault();

        const form = this;

        Swal.fire({
            title: 'Create Account?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {

            if (!result.isConfirmed) return;

            Swal.showLoading();

            const formData = new FormData(form);
            formData.append('action', 'profile_register');
            formData.append('nonce', profileData.nonce);

            jQuery.ajax({
                url: profileData.ajaxUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,

                success: function (res) {

                    if (res.success) {

                        Swal.fire('Success', res.data.message, 'success')
                        .then(() => {
                            window.location.href = res.data.redirect;
                        });

                    } else {
                        Swal.fire('Error', res.data, 'error');
                    }
                },

                error: function () {
                    Swal.fire('Error', 'Server error', 'error');
                }
            });

        });
    });

});


