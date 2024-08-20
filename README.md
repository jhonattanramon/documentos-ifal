
# Documentos IFAL

### Configuração do Ambiente e Banco de Dados

1. Renomeie o arquivo `.env.example` para `.env`:

    ```bash
    mv .env.example .env
    ```

2. Modifique as variáveis de ambiente no arquivo `.env` para seu contexto local. **Observação:** Se estiver usando PostgreSQL como banco de dados, altere os valores das variáveis `SESSION_DRIVER` e `CACHE_STORE` para `"file"`.

3. Gere uma nova chave de aplicação com o comando:

    ```bash
    php artisan key:generate
    ```

4. Execute o comando de migração para o banco de dados:

    ```bash
    php artisan migrate
    ```

5. Execute o comando de seed para o banco de dados:

    ```bash
    php artisan db:seed
    ```


# configurando elastic 
- garanta que voce tem elasticsearch 8.14 instalado na sua maquina ( https://www.elastic.co/guide/en/elasticsearch/reference/current/install-elasticsearch.html ). 
### Desabilitar o Certificado SSL do Elasticsearch

Após a instalação, você precisará desabilitar o certificado SSL do Elasticsearch. Siga os passos abaixo:

#### No Linux

1. Navegue até o diretório de configuração do Elasticsearch:

    ```bash
    cd /
    cd etc/elasticsearch/
    ```

2. Abra o arquivo de configuração `elasticsearch.yml` com um editor de texto:

    ```bash
    sudo nano elasticsearch.yml
    ```

3. No arquivo `elasticsearch.yml`, procure a linha:

    ```yaml
    xpack.security.enabled: true
    ```

    E mude seu valor para:

    ```yaml
    xpack.security.enabled: false
    ```

4. Após a modificação, reinicie o serviço Elasticsearch:

    ```bash
    sudo systemctl restart elasticsearch
    ```

#### Observações

- A pasta `etc/elasticsearch` pode estar protegida para acesso de usuário root. Você pode usar o comando `sudo -s` para obter permissões de root e seguir o passo a passo normalmente.

- Alternativamente, você pode conceder acesso à pasta sem usuário root com o comando:

    ```bash
    chmod 755 etc/elasticsearch
    ```

### Criar o Índice de Documentos no Elasticsearch

#### SCRIPT SHELL 
Agora vamos criar o índice `documentos_ifal` no Elasticsearch. Para isso, siga os passos abaixo:

1. Na pasta raiz do projeto, execute o script de configuração:

    ```bash
    ./config_elastic.sh
    ```

2. Após a execução do script, analise os logs gerados. Se não houver nenhum log indicando erro, você pode prosseguir.

3. Se os logs mostrarem algum erro, verifique novamente se o certificado SSL está desativado e tente reiniciar o Elasticsearch conforme mencionado anteriormente.

#### PORTMAN COLLECTION

Você também pode usar a coleção para criar o índice. Para isso, siga os passos abaixo:

1. **Importe o arquivo `Elastic.postman_collection.json` no Postman.**

2. **Tutorial:** Para orientações sobre como importar e exportar coleções no Postman, você pode consultar o [tutorial aqui](https://apidog.com/blog/how-to-import-export-postman-collection-data/?utm_source=google_dsa&utm_medium=g&,=20556541359&utm_content=154844519700&utm_term=&gad_source=1&gclid=Cj0KCQjw2ou2BhCCARIsANAwM2Ew3BdKVzCM5FmxRVXvY_jblybMCcA0OViAv5_hjx8hugrPfonepKgaAhPzEALw_wcB).



### Baixando os PDFs para Indexação

Na pasta `node_amb`, foi criado um script para baixar os documentos PDF de uma página web. Para utilizá-lo, siga os passos abaixo:

1. Execute o comando:

    ```bash
    node node_amb/script_get_pdfs.js <url> <nome_pasta>
    ```

    **Exemplo de uso:**

    ```bash
    node node_amb/script_get_pdfs.js https://www2.ifal.edu.br/campus/riolargo/editais/2024 riolargo-2024
    ```

    Este script baixará todos os PDFs da página e os salvará na pasta `riolargo-2024`.

2. **Observação:** Todos os PDFs são inseridos em uma pasta prefixada chamada `pdfs`. Portanto, a estrutura final será `pdfs/<nome_pasta>/...`.






