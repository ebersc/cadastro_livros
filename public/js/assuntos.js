let baseUrl = $("#base_url").val();
$(document).ready(function () {

    $("#btnSalvar").on('click', function () {
        var form = $('#formAssunto')[0];
        var formData = new FormData(form);

        $.ajax({
            url: `${baseUrl}assunto/salvar`,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                Swal.fire({
                    title: "Registro salvo com sucesso!",
                    icon: "success"
                }).then((result) => {
                    location.href = `${baseUrl}assunto`;
                });
            }
        });
    });

    $("#btnCancelar").on('click', function(){
        location.href = `${baseUrl}assunto`;
    })
});

function editarAssunto(codas) {
    location.href = `${baseUrl}assunto/editar/${codas}`;
}

function excluirAssunto(codas) {
    Swal.fire({
        title: "Deseja excluir esse assunto?",
        text: "Essa ação não pode ser desfeita!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim",
        cancelButtonText: "Não"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${baseUrl}assunto/deletar`,
                data: JSON.stringify({ 'codas': codas }),
                processData: false,
                contentType: false,
                type: 'DELETE',
                success: function (data) {
                    data = JSON.parse(data);
                    Swal.fire({
                        title: data.message,
                        icon: (data.status == 200) ? 'success' : 'error'
                    }).then((result) => {
                        location.reload();
                    });
                }
            });
        }
    });
}