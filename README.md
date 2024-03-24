## Requisitos para o projeto

- Primeiro requisito essêncial é que tenha instalado em sua máquina um servidor web local, como o xampp por exemplo, link de download [Xampp](https://www.apachefriends.org/pt_br/index.html), instalando o xampp, já virá com o PHP junto e o banco de dados MySql que usaremos como base de dados do projeto.
*Verifique a porta em que seu projeto foi instalado, o projeto usa a padrão 3306 do MySql, caso seja outra porta em uso, sigas os passos abaixo:

- Abra a pasta config do projeto no caminho `cd app/Config/` e encontre o arquivo Database_teste.php, altere-o para Database.php e altere as informações com base no banco de dados para conexao.

- É necessário ter o composer instalado em sua máquina, pode baixar o composer pelo link [Composer](https://getcomposer.org/download/)

- Também, para a realização do clone do repositório, precisará ter em sua máquina o Git, link para downlaod [Git](https://git-scm.com/downloads)

## Atualizações de instalação

- Agora será necessário realizar a clonagem do repositório `git clone https://github.com/lucassuzuki/Teste-Vip-Systems.git` via linha de comando ou alguma ferramenta.

- Após isso, acesse o projeto clonado `cd Teste-Vip-Systems` ou em alguma IDE de sua preferência.

- Com o terminal na raíz do projeto clonado, rode o comando `composer install` para baixar as dependências necessárias do projeto.

- Com tudo acima sendo feito, agora basta rodar o comando `php spark serve` que emulará sua aplicação na web.

## Configuração

Há um arquivo `env-example` na raíz do projeto, renomeie para `.env`

## Requisitos do servidor

PHP versão 7.4 ou superior é necessária, com as seguintes extensões instaladas:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Além disso, certifique-se de que as seguintes extensões estão habilitadas em seu PHP:

- JSON (ativado por padrão - não desative)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) se você planeja usar o MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) se você planeja usar a biblioteca HTTP\CURLRequest