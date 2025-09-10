<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="header-container">
                    <h5>Lista de Assuntos</h5>
                    <a class="btn btn-primary" href="<?= base_url() ?>assunto/cadastrar"><i class="fa fa-plus"></i> Novo Assunto</a>
                </div>

                <hr>
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <table id="tbAssunto" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php foreach($assuntos as $assunto): ?>
                            <tr>
                                <td>
                                    <?= $assunto['descricao'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="editarAssunto(<?= $assunto['codas'] ?>)"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-danger" onclick="excluirAssunto(<?= $assunto['codas'] ?>)"><i class="fa fa-trash"></i></button>
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
    <script src="<?= base_url() ?>/js/assuntos.js"></script>
<?= $this->endSection() ?>