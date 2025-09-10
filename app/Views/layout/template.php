<!DOCTYPE html>
<html lang="pt_br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de livros</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="favicon.ico" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Estilos para submenus */
        .collapse-inner {
            border-radius: 0.5rem;
            background-color: rgba(255, 255, 255, 0.1); /* Fundo branco semi-transparente */
            padding: 0.5rem 0;
            margin: 0.5rem 1rem;
            border-left: 3px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            backdrop-filter: blur(5px); /* Efeito de desfoque no fundo */
        }

        /* Estilos para os itens do submenu */
        .collapse-item {
            padding: 0.75rem 1.25rem;
            margin: 0.1rem 0.5rem;
            display: block;
            color: rgba(255, 255, 255) !important;
            text-decoration: none !important;
            border-radius: 0.35rem;
            white-space: nowrap;
            font-size: 0.85rem;
            font-weight: 500;
            border: none;
            background: rgba(255, 255, 255, 0.05); /* Fundo ainda mais sutil para cada item */
            transition: all 0.2s ease-in-out;
        }

        .collapse-item:hover {
            color: #fff !important;
            background-color: rgba(255, 255, 255, 0.2) !important; /* Fundo mais opaco no hover */
            text-decoration: none !important;
            transform: translateX(5px); /* Pequeno movimento para a direita */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .collapse-item:focus {
            color: #fff !important;
            background-color: rgba(255, 255, 255, 0.2) !important;
            outline: none;
        }

        /* Item ativo no submenu */
        .collapse-item.active {
            color: #fff !important;
            background-color: rgba(255, 255, 255, 0.25) !important;
            font-weight: bold;
            border-left: 3px solid #fff;
        }

        /* Ajustar espaçamento dos ícones no submenu */
        .collapse-item i {
            width: 1.2rem;
            text-align: center;
            opacity: 0.8;
        }

        .collapse-item:hover i {
            opacity: 1;
        }

        /* Para o efeito me-2 (margin-end) */
        .collapse-item .me-2 {
            margin-right: 0.5rem;
        }

        /* Seta para indicar submenu */
        .nav-link[data-toggle="collapse"]::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free', 'Font Awesome 5 Free';
            font-weight: 900;
            float: right;
            transition: transform 0.3s ease-in-out;
            margin-left: auto;
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .nav-link[data-toggle="collapse"]:hover::after {
            opacity: 1;
        }

        .nav-link[data-toggle="collapse"][aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        .nav-link[data-toggle="collapse"] {
            display: flex !important;
            justify-content: space-between;
            align-items: center;
        }

        .nav-link[data-toggle="collapse"] span {
            flex-grow: 1;
        }

        /* Animação suave para o colapso */
        .collapse {
            transition: all 0.3s ease-in-out;
        }

        /* Variação mais escura (opcional) */
        .collapse-inner.dark {
            background-color: rgba(0, 0, 0, 0.2);
        }

        .collapse-inner.dark .collapse-item {
            background: rgba(0, 0, 0, 0.1);
        }

        .collapse-inner.dark .collapse-item:hover {
            background-color: rgba(0, 0, 0, 0.3) !important;
        }
    </style>
    <?= $this->renderSection('style') ?>

</head>

<body id="page-top">

<div id="wrapper">
    <?= view('layout/sidebar') ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?= view('layout/topbar') ?>
        <?= $this->renderSection('content') ?>
<?= view('layout/footer') ?>



