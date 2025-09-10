<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="header-container">
                    <h5>Lista de Livros</h5>
                    <a class="btn btn-primary" href="<?= base_url() ?>livros/cadastrar"><i class="fa fa-plus"></i> Novo Livro</a>
                </div>

                <hr>
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <table id="tbLivro" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <th>Titulo</th>
                        <th>Editora</th>
                        <th>Edição</th>
                        <th>Ano de publicação</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach($livros as $livro): ?>
                            <tr>
                                <td>
                                    <?= $livro['titulo'] ?>
                                </td>
                                <td>
                                    <?= $livro['editora'] ?>
                                </td>
                                <td>
                                    <?= $livro['edicao'] ?>
                                </td>
                                <td>
                                    <?= $livro['anopublicacao'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="editarItem({{ item.id }})"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="excluirItem({{ item.id }})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>