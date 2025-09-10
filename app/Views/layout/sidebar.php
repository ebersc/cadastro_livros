<!-- Sidebar -->
<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseLivros" aria-expanded="false" aria-controls="collapseLivros">
            <i class="fas fa-book sidebar-text"></i>
            <span>Livros</span>
        </a>
        <div id="collapseLivros" class="collapse" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="<?= base_url() ?>livro">
                    <i class="fas fa-list me-2"></i>Listar Livros
                </a>
                <a class="collapse-item" href="<?= base_url() ?>livro/cadastrar">
                    <i class="fas fa-plus me-2"></i>Adicionar Livro
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseAutor" aria-expanded="false" aria-controls="collapseAutor">
            <i class="fas fa-user-pen sidebar-text"></i>
            <span>Autores</span>
        </a>
        <div id="collapseAutor" class="collapse" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="<?= base_url() ?>autor">
                    <i class="fas fa-list me-2"></i>Listar autores
                </a>
                <a class="collapse-item" href="<?= base_url() ?>autor/cadastrar">
                    <i class="fas fa-plus me-2"></i>Adicionar autor
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link collapsed sidebar-text" href="#" data-toggle="collapse" data-target="#collapseAssunto" aria-expanded="false" aria-controls="collapseAssunto">
            <i class="fas fa-comment-dots sidebar-text"></i>
            <span>Assunto</span>
        </a>
        <div id="collapseAssunto" class="collapse" data-parent="#accordionSidebar">
            <div class="collapse-inner">
                <a class="collapse-item" href="<?= base_url() ?>assunto">
                    <i class="fas fa-list me-2"></i>Listar assuntos
                </a>
                <a class="collapse-item" href="<?= base_url() ?>assunto/cadastrar">
                    <i class="fas fa-plus me-2"></i>Adicionar assunto
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

    <hr class="sidebar-divider my-0">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline sidebar-text">
        <button class="rounded-circle border-0 sidebar-text" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

