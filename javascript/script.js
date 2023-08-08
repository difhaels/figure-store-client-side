$(document).ready(function () {
    
    // hilangkan tombol cari
    $('#search').hide();

    // Event ketika keyup
    $('#key').on("keyup", function () {
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load (simple tapi tidak flexible)
        // $("#items").load('ajax/items.php?key='+$('#key').val());

        // ajax menggunakan $.get()
        $.get('ajax/items.php?key='+$('#key').val(), function(data) {
            $('#items').html(data);

            $('.loader').hide();
        })
    })
})
