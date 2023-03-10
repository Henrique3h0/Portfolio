fetch('projetos.json')
    .then(response => response.json())
    .then(data => {
        const projetos = data.projetos;
        const projetosContainer = document.getElementById('projetos');
        const pesquisaInput = document.getElementById('pesquisa');

        function exibirProjetos(projetos) {
            projetosContainer.innerHTML = '';
            projetos.forEach(projeto => {
                const projetoElement = document.createElement('div');
                projetoElement.classList.add('projeto');

                projetoElement.onclick = function () {
                    window.location.href = projeto.github;
                };

                const tituloElement = document.createElement('h2');
                tituloElement.textContent = projeto.titulo;

                const descricaoElement = document.createElement('p');
                descricaoElement.textContent = projeto.descricao;

                const linguagensElement = document.createElement('p');
                linguagensElement.textContent = `Linguagens: ${projeto.linguagens.join(', ')}`;

                const githubElement = document.createElement('button');
                githubElement.textContent = `GITHUB`;
                githubElement.onclick = function () {
                    window.location.href = projeto.github;
                };


                const imagemElement = document.createElement('img');
                imagemElement.src = projeto.imagem;
                imagemElement.alt = projeto.titulo;

                projetoElement.appendChild(tituloElement);
                projetoElement.appendChild(descricaoElement);
                projetoElement.appendChild(linguagensElement);
                projetoElement.appendChild(githubElement);
                projetoElement.appendChild(imagemElement);

                projetosContainer.appendChild(projetoElement);
            });
        }

        function pesquisarProjetos() {
            const termo = pesquisaInput.value.toLowerCase();
            const projetosFiltrados = projetos.filter(projeto => {
                return (
                    projeto.titulo.toLowerCase().includes(termo) ||
                    projeto.descricao.toLowerCase().includes(termo) ||
                    projeto.linguagens.join(', ').toLowerCase().includes(termo)
                );
            });
            exibirProjetos(projetosFiltrados);
        }

        pesquisaInput.addEventListener('keyup', pesquisarProjetos);

        exibirProjetos(projetos);
    });
