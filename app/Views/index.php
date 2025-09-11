<?= $this->extend('layout/template') ?>

<?= $this->section('style') ?>
    <style>
.home {
    color: black;
}

.nav-item {
    list-style: none;
}

.inicio {
    display: none;
}

body {
    height: 100%;
    background-color: #F8F9FC;
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseLivrosHome" aria-expanded="false" aria-controls="collapseLivrosHome">
                            <i class="fas fa-book sidebar-text"></i>
                            <span>Livros</span>
                        </a>
                        <div id="collapseLivrosHome" class="collapse" data-parent="#accordionSidebar">
                            <div class="collapse-inner">
                                <a class="collapse-item" href="<?= base_url() ?>livro">
                                    <span class="home">
                                        <i class="fas fa-list me-2"></i>Listar Livros</span>
                                </a>
                                <a class="collapse-item" href="<?= base_url() ?>livro/cadastrar">
                                    <span class="home">
                                        <i class="fas fa-plus me-2 home"></i>Adicionar Livro</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <hr class="sidebar-divider my-0">

                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseAutorHome" aria-expanded="false" aria-controls="collapseAutorHome">
                            <i class="fas fa-user-pen sidebar-text"></i>
                            <span>Autores</span>
                        </a>
                        <div id="collapseAutorHome" class="collapse" data-parent="#accordionSidebar">
                            <div class="collapse-inner">
                                <a class="collapse-item" href="<?= base_url() ?>autor">
                                    <span class="home">
                                        <i class="fas fa-list me-2"></i>Listar autores</span>
                                </a>
                                <a class="collapse-item" href="<?= base_url() ?>autor/cadastrar">
                                    <span class="home">
                                        <i class="fas fa-plus me-2"></i>Adicionar autor</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <hr class="sidebar-divider my-0">

                    <li class="nav-item">
                        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseAssuntoHome" aria-expanded="false" aria-controls="collapseAssuntoHome">
                            <i class="fas fa-comment-dots sidebar-text"></i>
                            <span>Assunto</span>
                        </a>
                        <div id="collapseAssuntoHome" class="collapse" data-parent="#accordionSidebar">
                            <div class="collapse-inner">
                                <a class="collapse-item" href="<?= base_url() ?>assunto">
                                    <span class="home">
                                        <i class="fas fa-list me-2"></i>Listar assuntos</span>
                                </a>
                                <a class="collapse-item" href="<?= base_url() ?>assunto/cadastrar">
                                    <span class="home">
                                        <i class="fas fa-plus me-2"></i>Adicionar assunto</span>
                                </a>
                            </div>
                        </div>
                    </li>

                    <hr class="sidebar-divider my-0">

                    <li class="nav-item">
                        <a class="nav-link sidebar-text" href="<?= base_url() ?>relatorio">
                            <i class="fa-solid fa-chart-line sidebar-text"></i>
                            <span>
                                Relatório
                            </span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>