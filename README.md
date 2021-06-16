# APP EXEMPLO - Guia de início rápido

### O QUE É
Um serviço que integra o XXX como plataforma de YYY.

### A QUEM SE DESTINA / OBJETIVO
Este projeto é mantido sob o mais absoluto sigilo para a Empresa ZZZ. Se você está vendo isso certamente você faz parte do projeto. O objetivo deste documento é facilitar a compreenção do escopo do projeto e de como funciona.

### INSTALAÇÃO LOCAL
• Instale apache, php e sql ao seu modo (xampp, wamp ou individual), instale o composer e o git;
• Em seu servidor local baixe o projeto usando `git clone`;
• Digite: `composer install` para instalar as bibliotecas;
• Instale `database.sql` em PHPMyAdmin;
• Agora, para que o envio de e-mail funcione localmente *__habilide a extensão open_openssl e php_sockets__** no php.ini, basta abrir o php.ini e usando `Ctrl+F` busque pelos termos openssl, descomente e depois depois repita os procedimentos para sockets, não se esqueça de reiniciar o apache depois do procedimento;

### CONVENÇÕES
Convenções adotadas no ambiente de trabalho para o projeto XXX:
* Regra para nome de classes e tabelas e colunas em um db: **_primeiroNome_**
* Para as tabelas devem possuir 's' no final;
* Todas as `classes` devem ser representadas por um substantivos e não um verbo: Clientes, Contatos, Perfil, Configurações etc;
* Todos os `metodos` devem ser representadas por um verbo ou frases verbais no infinitivo: salvarStatus, editarPagina, remover etc;
* Regra para nome de links: **_editar/pagina/sou-um-link_**;



... EXEPLO QUE PODE CONTER OUTRAS COISAS COMO ESTRUTURA DE PASTAS E TUTORIAIS ....




### BIBLIOTECAS DO PROJETO
* Usamos o [ Flight framework ](http://flightphp.com/) como framework para rotas, porque tem um desempenho melhor que o Slim Framework ou outros top de linha;

* Banco de dados MySql e biblioteca [ Medoo ](http://medoo.in/). O Medoo é de longe a melhor library que ja conheci. A regra de outro é que suas clases não podem de maneira alguma ficarem dentro de classes e ou funções;

* Sistema de template: o [ Twig ](http://twig.sensiolabs.org) para gerenciar e separar com mais segurança as views, mais abaixo você encontra um tópico falando um pouco mais dessa escolha;

* A biblioteca para detectar navegador, sistema operacional e dispositivo: [ PHP Browser Detector ](https://github.com/sinergi/php-browser-detector);

* Para envio de SMS a biblioteca usada é: [ overtrue - easy-sms ](https://github.com/overtrue/easy-sms), está em Chinês a documentação, mais isso não é um impecilho, copie e cole no google tradutor para entender se tiver algum problema com isso, todo o resto está em inglês.

* Para pegar o avatar da pessoa caso o email seja google ou esteja no gravatar: [ Avy-get ](https://github.com/12StarsMedia/avy-get), tem mais duas bibliotecas como dependência, mais é super simples de usar. 

### BANCO DE DADOS
Medoo é sem dúvidas a ORM mais simples que eu já pude conhecher na vida.
Você pode estudar a aplicação de login desenvolvida e consultar o guia oficial em: [ medoo.in ](http://medoo.in).

### SISTEMA DE TEMPLATE
Escolhi twig pela facilidade de aprendizado, por ter usado bastante com microframeworks também. Se você olhar uma [ folha de resumo ](https://s-media-cache-ak0.pinimg.com/originals/9b/7c/f0/9b7cf0ed69f91af8bdbf3d55ec5f893e.jpg) sobre o twig dá pra tirar muitas dúvidas, contudo, se você já está acostumado com com o Smarty por exemplo pode substituir.
