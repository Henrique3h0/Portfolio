<link href="style_adm.css" rel="stylesheet" type="text/css">

<form class="gradient-form" action="adicionar_projeto.php" method="post" enctype="multipart/form-data">
  <label for="titulo">Título:</label>
  <input type="text" id="titulo" name="titulo" required>

  <label for="descricao">Descrição:</label>
  <textarea style="width: 331px; height: 112px;" id="descricao" name="descricao" required></textarea>

  <label for="linguagens">Linguagens:</label>
  <input type="text" id="linguagens" name="linguagens" required>

  <label for="github">Github:</label>
  <input type="text" id="github" name="github" required>

  <label for="imagem">Imagem:</label>
  <input type="file" id="imagem" name="imagem" required>

  <button type="submit">Adicionar Projeto</button>

</form>