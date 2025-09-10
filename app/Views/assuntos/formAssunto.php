<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <?= $titulo ?> assunto
                </h5>
            </div>
            <div class="card-body">
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <form id="formAssunto" name="formAssunto">
                    <div class="container mt-2">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="<?= isset($assunto['codas']) ? $assunto['codas'] : '' ?>">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-header m-0 font-weight-bold text-primary">Assunto</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="descricao">Descrição:</label>
                                                    <input type="text" class="form-control" id="descricao" maxlength="40" name="descricao" placeholder="Descrição do assunto" value="<?= isset($assunto['descricao']) ? $assunto['descricao'] : '' ?>">
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
    <script src="<?= base_url() ?>js/assuntos.js"></script>
<?= $this->endSection() ?>