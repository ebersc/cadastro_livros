<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <?= $titulo ?> autor
                </h5>
            </div>
            <div class="card-body">
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <form id="formAutor" name="formAutor">
                    <div class="container mt-2">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="<?= isset($autor['codau']) ? $autor['codau'] : '' ?>">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-header m-0 font-weight-bold text-primary">Autor</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="nome">Nome:</label>
                                                    <input type="text" class="form-control" id="nome" maxlength="40" name="nome" placeholder="Nome do autor" value="<?= isset($autor['nome']) ? $autor['nome'] : '' ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <div class="row col-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="btnSalvar"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                            &nbsp;
                            <button type="button" class="btn btn-danger" id="btnCancelar"btnCancelar><i class="fa-solid fa-close"></i> Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script src="<?= base_url() ?>/js/autores.js"></script>
<?= $this->endSection() ?>