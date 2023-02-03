<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');
$nascimento = filter_input(INPUT_POST, 'nascimento');

if($id && $nome && $email && $senha && $nascimento){

    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
    $sql-> bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header("Location: index.php");
exit;
}else{
   header("Location: index.php");
exit;
echo "aqui";
}