<?php
    function cadastrarProduto($dados){
        include "_scripts/conexao.php";
        include "_scripts/session.php";

        $id_vendedor = $_SESSION['id'];
        $produto = $dados['produto'];
        $fornecedor = $dados['fornecedor'];
        $custo = $dados['custo'];
        $venda = $dados['venda'];
        $quantidade = $dados['quantidade'];
        if($custo <=0 || $venda <=0 || $quantidade <=0){
            return false;
        }
        //Verificação
        $sql_code = "SELECT * FROM produtos WHERE nomeProd = '$produto' AND fornecedor = '$fornecedor'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução da busca SQL: ".$mysqli->error);
        $encontrados = $sql_query->num_rows;
        if($encontrados == 0){
            $sql = "INSERT INTO produtos (vendedor,nomeProd,fornecedor,custo,valorVenda,quantidade) VALUES ('$id_vendedor','$produto','$fornecedor','$custo','$venda','$quantidade')";
            $query = $mysqli->query($sql);
            return $query;
        }
        //Fim da Verificação
        
    }

    function editarProduto($dados, $id_prod){
        include "_scripts/conexao.php";
        include "_scripts/session.php";

        $id_vendedor = $_SESSION['id'];
        $custo = $dados['custo'];
        $venda = $dados['venda'];
        $quantidade = $dados['quantidade'];
        if($custo <=0 || $venda <=0 || $quantidade <=0){
            return false;
        }
        $sql = "UPDATE produtos SET vendedor='$id_vendedor', custo='$custo', valorVenda='$venda', quantidade='$quantidade' WHERE codProd='$id_prod'";
        $query = $mysqli->query($sql);
        return $query;

        
    }

    function listarProdutos(){
        include "_scripts/conexao.php";
        $sql = "SELECT * FROM produtos";
        $query = $mysqli->query($sql);

        return $query;
    }

    function deletarProduto($id){
        include "_scripts/conexao.php";
        $sql = "DELETE FROM produtos WHERE codProd = '$id'";
        $query = $mysqli->query($sql);
        return $query;
    }

    function lerProduto($id){
        include "_scripts/conexao.php";
        $sql = "SELECT * FROM produtos WHERE codProd = '$id'";
        $query = $mysqli->query($sql);

        return $query->fetch_array();


    }

    function cadastrarVenda($id, $quantidadeVenda, $vendedor,$valorVenda){
        include "_scripts/conexao.php";
        $produto = lerProduto($id);
        if($quantidadeVenda <=0){
            return false;
        }
        if($produto['quantidade']>=$quantidadeVenda){
            $sql = "UPDATE produtos SET quantidade = quantidade - '$quantidadeVenda' WHERE codProd = '$id'";
            $query = $mysqli->query($sql);
            if($query){
                $nomeProd = $produto['nomeProd'];
                $sql = "INSERT INTO vendas (quantidade, codProd, nomeProd, vendedor, valorVenda) VALUES ('$quantidadeVenda', '$id', '$nomeProd', '$vendedor', '$valorVenda')";
                $query = $mysqli->query($sql);
                return $query;
            }    
        } 
        return false;
    }

    function listarVendasAdm(){
        include "_scripts/conexao.php";
        $sql = "SELECT * FROM vendas ORDER BY dataVenda DESC";
        $query = $mysqli->query($sql);

        return $query;
    }

    function listarVendasVendedor($id){
        include "_scripts/conexao.php";
        $sql = "SELECT * FROM vendas WHERE vendedor = '$id' ORDER BY dataVenda DESC";

        $query = $mysqli->query($sql);

        return $query;
    }

    function topDezAdmMes(){
        include "_scripts/conexao.php";
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM `vendas` WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function topDezAdmDia(){
        include "_scripts/conexao.php";
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM `vendas` WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function topDezVendDia($id){
        include "_scripts/conexao.php";
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM vendas WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())  AND vendedor = '$id'  GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }
    function topDezVendMes($id){
        include "_scripts/conexao.php";
        $sql = "SELECT nomeProd, SUM(quantidade) AS qtd_total FROM vendas WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW()) AND vendedor = '$id' GROUP BY codProd ORDER BY SUM(quantidade) DESC LIMIT 10";
        $query = $mysqli->query($sql);

        return $query;
    }

    function totalAdmDia($id){
        include "_scripts/conexao.php";
        $sql = "SELECT SUM(quantidade) AS qtd_total FROM vendas WHERE DAY(dataVenda) = DAY(NOW()) AND MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())";
        $query = $mysqli->query($sql);

        return $query;
    }

    function totalAdmMes($id){
        include "_scripts/conexao.php";
        $sql = "SELECT SUM(quantidade) AS qtd_total FROM vendas WHERE MONTH(dataVenda) = MONTH(NOW()) AND YEAR(dataVenda) = YEAR(NOW())";
        $query = $mysqli->query($sql);

        return $query;
    }

    



  


?>