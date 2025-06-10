<?php
require_once 'model/PratoDAO.php';

$dao = new PratoDAO();
$pratos = $dao->listarTodos();

include 'view/listar.php';