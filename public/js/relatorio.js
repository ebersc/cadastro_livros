let baseUrl = $("#base_url").val();

$(document).ready(function(){
    $("#btnRelatorio").on('click', function(){
        $('#tabelaRelatorio').DataTable().ajax.reload();
    });

    $('#tabelaRelatorio').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: `${baseUrl}relatorio/datatables`,
            type: "GET",
            data: function (d) {
                // pega dados do formulário #filtros e anexa ao request
                let formData = $('#filtros').serializeArray();
                formData.forEach(item => {
                    d[item.name] = item.value;
                });
            }
        },
        columns: [
            { data : "autor_nome", title: "Autor" },
            { data : "livro_titulo", title: "Título" },
            { data : "livro_ano", title: "Ano" },
            { data : "livro_edicao", title: "Edição" },
            {
                data : "livro_valor",
                title: "Valor",
                render: function (data, type, row) {
                    if (type === 'display' || type === 'filter') {
                        return "R$ " + parseFloat(data).toFixed(2).replace('.', ',');
                    }
                    return data;
                }
            },
            { data : "assuntos", title: "Assuntos" }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar Excel',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        body: function (data, row, column, node) {
                            // adiciona R$ antes do número
                            if (column === 4) { // índice da coluna Valor
                                let num = parseFloat(data.replace(/[^\d,-]/g, '').replace(',', '.'));
                                return "R$ " + num.toFixed(2).replace('.', ',');
                            }
                            return data;
                        }
                    }
                }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar PDF',
                exportOptions: {
                    columns: ':visible',
                    format: {
                        body: function (data, row, column, node) {
                            if (column === 4) {
                                let num = parseFloat(data.replace(/[^\d,-]/g, '').replace(',', '.'));
                                return "R$ " + num.toFixed(2).replace('.', ',');
                            }
                            return data;
                        }
                    }
                },
                customize: function (doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.styles.tableHeader.fillColor = '#eeeeee';
                    doc.defaultStyle.fontSize = 10;
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i>',
                titleAttr: 'Imprimir',
                exportOptions: { columns: ':visible' }
            }
        ],
    });
});