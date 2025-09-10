<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link sidebar-text" href="<?= base_url() ?>eventos/cadastrar">
            <i class="fas fa-regular fa-calendar-plus sidebar-text"></i>
            <span>
                Novo evento
            </span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link sidebar-text" href="<?= base_url() ?>eventos/listar">
            <i class="fa-solid fa-list-check sidebar-text"></i>
            <span>
                Listar eventos
            </span>
        </a>
    </li>

	<hr class="sidebar-divider my-0">

	<li class="nav-item">
		<a class="nav-link sidebar-text" href="<?= base_url() ?>clientes">
			<i class="fa-solid fa-user sidebar-text"></i>
			<span>
				Clientes
			</span>
		</a>
	</li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
		<a class="nav-link sidebar-text" href="{{ base_url }}itens">
			<i class="fa-solid fa-box-open sidebar-text"></i>
			<span>
				Itens
			</span>
		</a>
	</li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link sidebar-text" href="{{ base_url }}temas">
            <i class="fa-solid fa-palette sidebar-text"></i>
            <span>
                Temas
            </span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline sidebar-text">
        <button class="rounded-circle border-0 sidebar-text" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
