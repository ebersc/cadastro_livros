let baseUrl = $("#base_url").val();
$(document).ready(function () {

    $("#btnSalvar").on('click', function () {
        var form = $('#formLivro')[0];
        var formData = new FormData(form);

        $.ajax({
            url: `${baseUrl}livro/salvar`,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                Swal.fire({
                    title: "Registro salvo com sucesso!",
                    icon: "success"
                }).then((result) => {
                    location.href = `${baseUrl}livro`;
                });
            }
        });
    });

    $("#btnCancelar").on('click', function(){
        location.href = `${baseUrl}livro`;
    })
});

function editarLivro(codl) {
    location.href = `${baseUrl}livro/editar/${codl}`;
}

function excluirLivro(codl) {
    Swal.fire({
        title: "Deseja excluir esse livro?",
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
                url: `${baseUrl}livro/deletar`,
                data: JSON.stringify({ 'codl': codl }),
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