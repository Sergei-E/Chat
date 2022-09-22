/*alert("js подключен");*/

$(document).ready(function() {
    $('#MessForm').submit(function(e) {
        e.preventDefault();
        var text = document.getElementById('sms').value;
        $.ajax({
            type: "POST",
            url: 'insert.php',
            data: {
                text1: text
            },
            success: function() {
                console.log("Данные добавлены");
                /*document.getElementById('MessageSMS').innerHTML += "<p>" + text + "</p></br>";*/

            }
        });

    });
});

function Output() {
    $.ajax({
        url: 'select.php',
        method: 'get',
        cache: false,
        dataType: 'html',
        data: {},
        success: function(data) {
            document.getElementById('MessageSMS').innerHTML = data;
            Times();
            block.scrollTop = 9999;
            document.getElementById('sms').value = '';
        }
    });
}

function Times() {
    for (var i = 0; i < 20; i++) {
        setTimeout(Output, 15000 * (i + 1));
    }
}