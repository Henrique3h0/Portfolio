<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $linguagens = explode(',', $_POST['linguagens']);
    $github = $_POST['github'];

    // Salva a imagem no servidor
    $imagem = $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], 'imagens/' . $imagem);

    // Verifica se o arquivo JSON existe e contém o array "projetos"
    if (file_exists('projetos.json')) {
        $dados = file_get_contents('projetos.json');
        $dadosArray = json_decode($dados, true);

        if (isset($dadosArray['projetos'])) {
            $projetosArray = $dadosArray['projetos'];
        } else {
            $projetosArray = array();
        }
    } else {
        $projetosArray = array();
    }

    // Adiciona o novo projeto ao array de projetos
    $novoProjeto = array(
        'titulo' => $titulo,
        'descricao' => $descricao,
        'linguagens' => $linguagens,
        'imagem' => 'imagens/' . $imagem,
        'github' => $github
    );
    array_push($projetosArray, $novoProjeto);

    // Salva os dados atualizados no arquivo JSON
    $dadosArray['projetos'] = $projetosArray;
    file_put_contents('projetos.json', json_encode($dadosArray));


    // Redireciona o usuário de volta à página do portfólio
    header('Location: index.html');
    exit;
}
