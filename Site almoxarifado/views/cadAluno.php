<div class="container-fluid form-aluno">
<form class="row g-3" method="post" action="">
  <div class="col-md-6">
    <label  class="form-label">Nome do Aluno</label>
    <input type="text" class="form-control" name="nome">
  </div>
  <div class="col-md-6">
    <label class="form-label">Data de Nascimento</label>
    <input type="date" class="form-control" name="dt_nascimento">
  </div>
  <div class="col-12">
    <label class="form-label">Nome da Mãe</label>
    <input type="text" class="form-control" name="nome_mae">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">CPF</label>
    <input type="text" class="form-control" name="cpf">
  </div>
  <div class="col-md-6">
    <label class="form-label">Bairro</label>
    <input type="text" class="form-control" name="bairro">
  </div>
  <div class="col-md-6">
    <label class="form-label">Sexo</label>
    <select class="form-select" name="sexo">
      <option value="M">Masculino</option>
      <option value="F">Feminino</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

<?php

    if(isset($_POST)){
        if(cadastrar($_POST)){
            echo "DEU BOM";
        }else{
            echo "ME LASQUEI!";
        };
    }

?>