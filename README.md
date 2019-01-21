Teste ecommerce
==================================
# Como Rodar o Projeto: #

O projeto esta utilizando docker, irá subir 4 containers:

- Redis;
- Mysql;
- Webserver (nginx);
- PHP-FPM.

Para rodar basta clonar o projeto, e na pasta do projeto executar o compando:

`docker-compose up`

Os containers serão construídos e ja criarão a estrutura do banco com dados de teste.

OBS: Dependendo da conexão de rede pode demorar um pouco o processo.

O nginx esta configurado para ser executado pelo link `http://localhost:8081`.

Quando o container ecommerce-php-fpm informar:

`ecommerce-php-fpm | [21-Jan-2019 20:08:05] NOTICE: systemd monitor interval set to 10000ms`

O sistema estará no ar. Caso ocorra algum erro de conexão, só cancelar o processo com  `CTRL+C` e rodar novamente `docker-compose up`, ocorre se o container do mysql demorar muito para iniciar.

# Como Remover: #

Para matar todos os container execute o comando `docker kill $(docker ps -q)`

Para remover todas as imagens execute o comando `docker rmi -f $(docker images -q)`
