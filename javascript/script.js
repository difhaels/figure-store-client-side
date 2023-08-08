$(document).ready(function () {
    
    // Event ketika keyup
    $('#key').on("keyup", function () {
        $("#items").load('ajax/items.php?key='+$('#key').val());
    });

})

