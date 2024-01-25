<?php
    include "_scripts/session.php";
    include "_scripts/protect.php";
    include "modelo/header.php";
?>

<body>
    <?php include "modelo/menu.php";?>
    <?php include "modelo/js.php";?>
    <script type="text/javascript" src="ajax.js"></script>

<div class="m-auto row">
<div class="mt-5 col-md-6">  
  <div class="container-fluid form-aluno">
  <div class="row">
    <form class="row g-3" method="post" action="">
      <legend class="text-center mb-5"><h1>Vendas</h1></legend>

      <div>
        <label class="form-label">Produto:</label> <br>
       <!-- <input type="text" class="form-control" name="fornecedor" placeholder="Digite o nome do fornecedor:" Required>-->
       <select name="produtos" id="produtos" onchange="getDados();"  class="col-md-6" placeholder="selecione">
        <option selected disabled value="-1">Selecione...</option>
          <?php
          $lista = listarProdutos();
          while ($dados = $lista->fetch_array()){
          ?>
          <option value="<?=$dados['codProd'];?>"><?=$dados['nomeProd'];?></option>
          
          <?php }?>
       <!--<option value="0" selected></option>
          <option value="1" >Op 1</option>
          <option value="2" >Op 2</option>
          <option value="3" >Op 3</option>-->
      </select>

      <script>
          $("#produtos").select2({
          theme: "classic"
          });
      </script>
      </div>


      <div class="col-md-12">
        <label class="form-label">Quantidade Vendida:</label>
        <input type="text" class="form-control" name="quantidade" placeholder="Digite a quantidade vendida:" required>
      </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
    </div>
  </div>
  </div>    
            <div class="m-auto  col-md-5" id="Resultado">
          </div>


</body>
</html>
<?php
if (!empty($_POST['quantidade'])){
  if(!empty($_POST['produtos'])){
   $produto = lerProduto($_POST['produtos']);
   $total = $_POST['quantidade'] * $produto['valorVenda'];
    
    if(cadastrarVenda($_POST['produtos'],$_POST['quantidade'], $_SESSION['id'], $total)){
      echo "
      <script> swal.fire({ 
        icon:'info',
        title: 'Valor Total da Venda: R$ {$total}',
        type: 'success'}).then(okay => {
          if (okay) {
            swal.fire({ 
              icon:'success',
              title: 'Venda Cadastrada com Sucesso! ',
              text: ''        
              });
          }
        });
    </script>
    
    ";
    }else{?>
      <script> swal.fire({ 
        icon:"error",
        text: "Ops! Houve um erro.",
        type: "success"}).then(okay => {
        if (okay) {
        }
      });
    </script>
    
     
  <?php
}
}
else{
  echo "
   <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops',
      text: 'Selecione um produto!',
    })
  </script>";
  
}
}
?>



