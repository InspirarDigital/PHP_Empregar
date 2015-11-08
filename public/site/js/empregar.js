$(function() {

    $("[name=loginForm] input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();

            autenticar();
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});


function autenticar() {
    var jqxhr = $.post(
        "http://localhost/inspirar/empregar/public/login/",
        {'email': $('#email').val(), 'senha': $('#senha').val()},
        function (data) {
            console.log(data);
            if (data.sucesso == true) {
                alert('Bem vindo ' + data.nome + '!');
                location.reload();
            } else {
                $('#success').html("<div class='alert alert-danger'>");
                $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                    .append("</button>");
                $('#success > .alert-danger').append("<strong>"+data.mensagem+"</strong>");
                $('#success > .alert-danger').append('</div>');
            }
        }
    )
        .fail(function () {
            //alert( "Erro!!" );
        })
        .always(function () {
            //alert( "finished" );
        });
}