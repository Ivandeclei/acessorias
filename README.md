# Teste Prático de Lógica + PHP + MySQL

Este projeto é uma aplicação que utiliza Docker Compose para criar um ambiente de desenvolvimento com PHP e MySQL. O objetivo é listar registros de clientes com paginação personalizada. 

## Objetivo

1. **Criação da Tabela de Clientes**

   Crie uma tabela `clients` com a seguinte estrutura:

   - `id` (INT, auto-increment, chave primária)
   - `name` (VARCHAR)
   - `phone` (VARCHAR)
   - `email` (VARCHAR)
   - `created_at` (TIMESTAMP)
   - `updated_at` (TIMESTAMP)

2. **População da Tabela**

   Alimente a tabela `clients` com no mínimo 120 registros fictícios.

3. **Desenvolvimento da Aplicação**

   Em PHP puro + HTML e Bootstrap, desenvolva uma página que liste os registros da tabela com a seguinte paginação:

   - Exiba 10 registros por página.
   - Sempre exiba o link da página atual + 4 links de página. Sempre que possível, exiba 2 páginas antes e 2 depois da atual; se não for possível, exiba 4 links mesclando entre próximas e anteriores.
   - Sempre deve haver um link para a última página precedido por `…`.
   - Caso não esteja na página 1, também deve haver um link para a página inicial (1).
   - A página atual não deve ser um link; apenas o número deve ser exibido.

   **Exemplos de Paginação:**

   - **Página 1, com 10 páginas:** `1, 2, 3, 4, 5 … 10`
   - **Página 3, com 10 páginas:** `1, 2, 3, 4, 5, … 10`
   - **Última página (10), com 10 páginas:** `1, … 6, 7, 8, 9, 10`

   Observação: Fica a critério do desenvolvedor a parte visual. Boas práticas são bem-vindas!

## Formas de Execução

1. **Pré-requisitos:**

   - Ter o Docker e Docker Compose instalados na sua máquina.

2. **Executar o Projeto:**

   Navegue até o diretório raiz do projeto e execute o seguinte comando:

   ```bash
   docker-compose up -d --build
3. **Problemas e melhorias futuras:**
   Quando terminar de subir os containers, e entrar no endereço ``` http://localhost:8080/``` podeser que ocorraum erro de acesso , mas basta aguardar 3 segundos e atualizar a pagina novamente , pois este é o momento que o codigo tenta criar os registros.
