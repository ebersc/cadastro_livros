<?= $this->extend('layout/template') ?>

<?= $this->section('style') ?>
    <style>
        .dt-button i.fas.fa-file-excel {
            color: #28a745;
        }

        .dt-button i.fas.fa-file-pdf {
            color: #dc3545;
        }

        .dt-button i.fas.fa-print {
            color: #007bff;
        }

        .dt-button i.fas {
            font-size: 1.2em;
        }
    </style>
<?= $this->endSection () ?>

<?= $this->section('content') ?>

    <div class="container-fluid"> <div class="card">
        <div class="card-body">
            <div class="header-container">
                <h5>Gerar relatório</h5>
            </div>

            <hr>
            <input type="hidden" id="base_url" value="<?= base_url() ?>">
            <div class="col-12">
                <form name="filtros" id="filtros">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="autor_filtro">Autor(es):</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" id="autor" name="autor[]" title=" --- Selecione um ou mais autores ----">
                                    <?php foreach($autores as $key => $autor){ ?>
                                        <option value="<?= $autor['codau'] ?>"><?= $autor['nome'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="assunto_filtro">Assunto:</label>
                                <select class="form-control selectpicker" multiple data-live-search="true" id="assunto" name="assunto[]" title=" --- Selecione um ou mais assuntos ----">
                                    <?php foreach($assuntos as $key => $assunto){ ?>
                                        <option value="<?= $assunto['codas'] ?>"><?= $assunto['descricao'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ano_filtro">Ano:</label>
                                <input type="text" id="ano_filtro" name="ano_filtro" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary" id="btnRelatorio">Gerar relatório</button>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="col-12">
                <table id="tabelaRelatorio" class="display table-striped table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Autor</th>
                            <th>Título</th>
                            <th>Ano</th>
                            <th>Edição</th>
                            <th>Valor</th>
                            <th>Assuntos</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url() ?>/js/relatorio.js"></script>
<?= $this->endSection() ?>
