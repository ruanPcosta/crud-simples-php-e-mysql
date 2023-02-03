<?php

require 'config.php';
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$nascimento = filter_input(INPUT_POST,'nascimento' );

if($nome && $email && $senha && $nascimento){

     $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email && senha = :senha");
     $sql->bindValue(":email", $email);
     $sql->bindValue(":senha",$senha );
     $sql-> execute();

if($sql->rowCount() === 0){



$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nascimento) VALUES (:nome, :email, :senha, :nascimento)");
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->bindValue(':senha', $senha);
$sql->bindValue(':nascimento', $nascimento);
$sql->execute();

header("location: index.php");
exit;
}else{
    header("Location: cadastrar.php");
}

}else{
      header("Location: cadastrar.php");
      exit;
}