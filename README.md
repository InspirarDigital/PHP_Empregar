# Projeto MVC em PHP para site de empregos

Este projeto foi desenvolvido no treinamento realizado por [Tiago Gouvêa](http://www.tiagogouvea.com.br) na [Inspirar Digital](http://www.inspirardigital.com.br), para que os alunos tivessem contato com a linguágem PHP e também com o SQL.

### Detalhes acerca do projeto ###
* Foi utilizado MVC para organização dos arquivos
* Fizemos de maneira bem simples, para exemplificar alguns conceitos
* Nem o site nem o admin estão completamente desenvolvidos
* Utilizamos o Slim framewok para gerenciar as rotas e levar as requisições aos Controllers
* No model, neste projeto, não criamos entidades nem implementamos DAO ou Active Record, ou seja, as instâncias dos registros são simples objetos StdClass retornados pelo PDO
* Utilizamos um template pronto para o Admin ([Inspina](https://wrapbootstrap.com/theme/inspinia-responsive-admin-theme-WB0R5L90S)) e outro para o site ([Freelancer](http://startbootstrap.com/template-overviews/freelancer/)) já que nosso objetivo não era o HTML/CSS/JS

### Na pasta resources você encontra ###
* O script de criação do banco de dados (sem create database)
* O template do admin (compactei apenas o HTML statico, comprando o [original](https://wrapbootstrap.com/theme/inspinia-responsive-admin-theme-WB0R5L90S) você tem acesso a todos os fontes LESS, SASS, pra angular, jQuery, Ruby, etc)
* O template do site

### Para funcionar localmente ###
* Você precisará do apache e php em sua máquina local, claro, e o projeto saldo em alguma subpasta do seu document_root
* Altere o conteúdo de config_dev.php para suas configurações de conexão com o banco de dados
* Acesse através de ser browser a pasta /public/, algo como /empregar/public/, ali é a raiz do site
* Para o admin utilize /empregar/public/admin/

Fique a vontade para baixar, modificar, utilizar e também dar pull request em alguma melhoria se desejar. :)

Se precisar aprender mais sobre o PHP fique ligado nos treinamentos da [Inspirar Digital](http://www.inspirardigital.com.br)