<?php
require 'config.php';


$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0 ){
   $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Lista de usuarios</h1>

<table border="1">
     <tr>
        <th>id</th>
        <th>Nome:</th>
        <th>Email:</th>
        <th>Senha</th>
        <th>Data de nascimento</th>
        <th>Atividades</th>   
      </tr>
     <?php foreach($lista as $usuarios): ?>
      <tr>
         <td><?=$usuarios['id']?></td>
         <td><?=$usuarios['nome']?></td>
         <td><?=$usuarios['email']?></td>
         <td><?=$usuarios['senha']?></td>
         <td><?=$usuarios['nascimento']?></td>

         <td>
               <a href="edicao.php?id=<?=$usuarios['id'];?>">[Editar informações]</a>
               <a href="exclusao.php?id=<?=$usuarios['id'];?>">[Excluir informações]</a>

         </td>       
      </tr>

     <?php endforeach; ?>


</table>

<a href="cadastrar.php"> Cadastrar usuario
</a>   