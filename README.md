# Sistema Datasus

### Descrição
*O sistema consiste em uma aplicação capaz de obter e gerenciar informações sobre os profissionais cadastrados no CNES do HUOL - Hospital Universitário Onofre Lopes. [Telas da aplicação](docs/screens/README.md).*


### Configuração 
Essas são algumas configurações iniciais recomendadas para fazer deploy da aplicação

- extensão do sqlite para o php

`sudo apt-get install php7.0-sqlite3`

- Troubleshooting do composer para alocar memória swap e instalar alguns pacotes

`sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024`

`sudo /sbin/mkswap /var/swap.1`

`sudo /sbin/swapon /var/swap.1`

### Deploy

- copie as configurações de exemplo para um arquivo .env
`cp .env.example .env`

- utilize o banco de exemplo `datasus.sqlite` ou crie um banco de dados do tipo sqlite e edite a variavel `DB_DATABASE` no arquivo `.env` referenciando o caminho absolute do banco criado.

- instale as dependências do composer (gerenciador de pacotes do php) executando o seguinte comando na raiz do projeto

`composer install`

- Execute os seguintes comandos do artisan na raiz do projeto

`php artisan key:generate`

`php artisan migrate`

`php artisan passport:install`

`php artisan serve`


Feito isso o sistema irá rodar na porta 8000 e estará pronto para uso.

 *Observação 1: No sistema, no comando de carregar informações do site do CNES, é possível que a requisição demore alguns minutos (cerca de 3) para finalizar, devido o desgastante processo de scrapping. Portanto, é recomendado que não sejam efetuadas requisições repetidas ou em paralelo durante essa ação.*
 
 *Observação 2: O OAuth está funcinando apenas a nível de backend e parcialmente a nível de frontend*
