let baseUrl = $("#base_url").val();
$(document).ready(function () {

    $("#btnSalvar").on('click', function () {
        var form = $('#formAutor')[0];
        var formData = new FormData(form);

        $.ajax({
            url: `${baseUrl}autor/salvar`,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                Swal.fire({
                    title: "Registro salvo com sucesso!",
                    icon: "success"
                }).then((result) => {
                    location.href = `${baseUrl}autor`;
                });
            }
        });
    });

    $("#btnCancelar").on('click', function(){
        location.href = `${baseUrl}autor`;
    })
});

function editarAutor(codau) {
    location.href = `${baseUrl}autor/editar/${codau}`;
}

function excluirAutor(codau) {
    Swal.fire({
        title: "Deseja excluir esse autor?",
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
                url: `${baseUrl}autor/deletar`,
                data: JSON.stringify({ 'codau': codau }),
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