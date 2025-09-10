<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="header-container">
                    <h5>Lista de Autores</h5>
                    <a class="btn btn-primary" href="<?= base_url() ?>autor/cadastrar"><i class="fa fa-plus"></i> Novo Autor</a>
                </div>

                <hr>
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <table id="tbAutor" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <th>Nome</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach($autores as $autor): ?>
                            <tr>
                                <td>
                                    <?= $autor['nome'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="editarAutor(<?= $autor['codau'] ?>)"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="excluirAutor(<?= $autor['codau'] ?>)"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="<?= base_url() ?>/js/autores.js"></script>
<?= $this->endSection() ?>