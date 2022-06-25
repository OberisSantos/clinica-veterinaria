<?php
    //comandos SQL para tabela cliente
    class Cliente_model{

        function add_cliente($cliente, $conn){
                $sql = "INSERT INTO cliente(cpf, idpessoa) VALUES('{$cliente['cpf']}', '{$cliente['idpessoa']}')";

                if($conn ->query($sql)){
                    return True;
                }else{
                    echo $conn ->error;
                    return False;
                }

                $conn ->close();
        }

        function alterar_cliente($cliente, $conn)
        {
            $sql = "UPDATE cliente SET cpf = '{$cliente['cpf']}' WHERE idcliente = '{$cliente['idcliente']}'";

            if ($conn ->query($sql)) {
                return True;
            }else{
                return False;
            }
            $conn ->close();
        }

        function buscar_id($cpf, $conn)
        {
            $sql = "SELECT idcliente FROM cliente WHERE cpf = $cpf";

            $resultado = $conn ->query($sql);
            return $resultado;
            

            $conn ->close();
        }
        
        function buscar_cpf($cpf, $conn)
        {
           $sql = "SELECT * FROM cliente as c INNER JOIN pessoa as p on c.idpessoa = p.idpessoa
           INNER JOIN endereco as e on p.idendereco = e.idendereco
           WHERE c.cpf = $cpf";

            $resultado = $conn ->query($sql);
            return $resultado;
            

            $conn ->close();
        }

        function buscar_cliente_avancado($idcliente, $conn)
        {
           $sql = "SELECT * FROM cliente as c INNER JOIN pessoa as p on c.idpessoa = p.idpessoa
           INNER JOIN endereco as e on p.idendereco = e.idendereco
           WHERE c.idcliente = $idcliente";

            $resultado = $conn ->query($sql);
            return $resultado;
            

            $conn ->close();
        }

        function buscar_cliente($idcliente, $conn)
        {
            $sql = "SELECT * FROM cliente WHERE idcliente = $idcliente";
            $resultado = $conn ->query($sql);
            return $resultado;
            $conn ->close();
        }

        
        function listar_cliente($conn)
        {
           $sql = "SELECT * FROM cliente as c INNER JOIN pessoa as p on c.idpessoa = p.idpessoa
           INNER JOIN endereco as e on p.idendereco = e.idendereco";

            $resultado = $conn ->query($sql);
            return $resultado;
            

            $conn ->close();
        }

        function deletar_clienteCpf($cpf, $conn){
            $resultado= $this ->buscar_cpf($cpf, $conn);#chamada mo metodo buscar_cpf()

            if($resultado ->num_rows > 0){
                while($linha = $resultado ->fetch_assoc()){#quebrar em linhas
                    $idcliente = $linha['idcliente'];
                    $idpessoa = $linha['idpessoa'];
                    $idendereco = $linha['idendereco'];
                    
                    $conn ->query("DELETE FROM cliente WHERE idcliente = $idcliente");
                    $conn ->query("DELETE FROM pessoa WHERE idpessoa = $idpessoa");
                    $conn ->query("DELETE FROM endereco WHERE idendereco = $idendereco");
                   
                }  
                return True;           
            }else{
                return "Cliente não encontrado.";
            }
            $conn ->close();
            
        }

        function deletar_cliente($idcliente, $conn){
            $sql = "DELETE FROM cliente WHERE idcliente = $idcliente";
            
            if($conn ->query($sql)){
                return True;  
            }
            return False;

            $conn ->close();
            
        }

    }
  

?>