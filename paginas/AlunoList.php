<?php
    include './aula03_funcao.php';
    include "./db.class.php";

    head();

    $db = new db();
    $db->conn();

    if(!empty($_GET['id'])){
      $db->destroy($_GET['id']);
    }

    $dados = $db->all();


?>

<div class="col">

<h3>Listagem de Alunos </h3>

<div class="container-fluid">
      <form class="d-flex" role="search">
    <div class="col-4 px-2">
        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
    </div>
    <div>
        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        <a class="btn btn-outline-primary" href="./AlunoForm.php">Novo</a>
      </form>
    </div>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">CPF</th>
    </tr>
  </thead>
  <tbody>
    <?php

      foreach($dados as $item){
        
      
    echo"<tr>
      <th scope='row'>$item->id</th>
      <td>$item->nome</td>
      <td>$item->telefone</td>
      <td>$item->cpf</td>
      <td><a href='AlunoForm.php?id=$item->id'>Editar</a></td>
      <td><a onclick='return confirm(\"Deseja Excluir?\")' href='AlunoList.php?id=$item->id'>Deletar</a></td>
    </tr>";
    }

  ?>
  </tbody>
</table>
</div>
<?php
    footer();
?>