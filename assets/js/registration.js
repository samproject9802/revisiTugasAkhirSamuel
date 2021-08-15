$(document).ready(() => {
    $('#signupForm').on('submit', (e) => {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: 'assets/php/register.php',
            data: $('#signupForm').serialize(),
            success: function (response) {
                if (response = "New record created successfully") {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: "Data Anda Ditemukan",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById("signupForm").reset();
                        }
                    })
                } else {
                    Swal.fire(
                        'Gagal!',
                        response,
                        'error'
                    )
                }
            }
        })
    })
})