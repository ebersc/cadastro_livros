<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    <?= $titulo ?> livro
                </h5>
            </div>
            <div class="card-body">
                <input type="hidden" id="base_url" value="<?= base_url() ?>">
                <form id="formItem" name="formItem">
                    <div class="container mt-2">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="<?= isset($livro[0]['id']) ? $livro[0]['id'] : '' ?>">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-header m-0 font-weight-bold text-primary">Livro</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="titulo" maxlength="40" name="titulo" placeholder="Titulo" value="<?= isset($livro[0]['descricao']) ? $livro[0]['descricao'] : '' ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="editora" maxlength="40" name="editora" placeholder="Editora" value="<?= isset($livro[0]['editora']) ? $livro[0]['editora'] : '' ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição" value="<?= isset($livro[0]['edicao']) ? $livro[0]['edicao'] : '' ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <input type="text" class="form-control" id="anopublicacao" name="anopublicacao" placeholder="Ano publicação" value="<?= isset($livro[0]['anopublicacao']) ? $livro[0]['anopublicacao'] : '' ?>">
                                                </div>
                                                <div class="mb-2">
                                                    <select class="form-control" id="autor" name="autor" placeholder="Selecione um autor">
                                                        <option value ="">
                                                            --- Selecione um autor ----
                                                        </option>
                                                        <?php foreach($autores as $autor): ?>
                                                            <option value="<?= $autor['id'] ?>" <?= ($livro['autor'] == $autor['id']) ? 'selected' : '' ?> ><?= $autor['nome'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <select class="form-control" id="assunto" name="assunto" placeholder="Selecione um Assunto">
                                                        <option value ="">
                                                            --- Selecione um autor ----
                                                        </option>
                                                        <?php foreach($assuntos as $assunto): ?>
                                                            <option value="<?= $assunto['id'] ?>" <?= ($livro['assunto'] == $assunto['id']) ? 'selected' : '' ?> ><?= $assunto['descricao'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
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
                            <button type="button" class="btn btn-primary" id="btnSalvarItem"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                            &nbsp;
                            <button type="button" class="btn btn-danger" id="btnCancelar" onclick="window.history.back()"><i class="fa-solid fa-close"></i> Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>