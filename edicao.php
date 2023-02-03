<?php
require 'config.php';
$usuarios = [];
$id = filter_input(INPUT_GET, 'id');
if($id){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){

        $usuarios = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: index.php");
       exit;   
    }

}else{
        header("Location: index.php");

    }
   ?>
   <h1>Editar info do usuario</h1>
   <form method = "POST" action= "edicao_action.php">
    <input type="hidden" name="id" value="<?=$usuarios['id'];?>"/>

   <label>
Nome: <input type="text" name="nome" value="<?=$usuarios['nome'];?>"/>

</label>

<label>
    Email: <input type= "email" name="email" value="<?=$usuarios['email'];?>"/>
</label>

<label>

    Senha: <input type="password" name="senha" value="<?=$usuarios['senha'];?>"/>
</label>


<label>
    Nascimento: <input type="date" name="nascimento" value="<?=$usuarios['nascimento'];?>"/>
</label>

<input type="submit" value="Atualizar infos"/>
   </form>