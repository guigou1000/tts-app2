## Instruções para Executar o Projeto
1.	Clone o repositório:
git clone https://github.com/guigou1000/tts-app2.git
cd tts-app2
2.	Instale as dependências do projeto:
composer install
3.	Crie o arquivo de ambiente .env e gere a chave da aplicação:
No Windows:
copy .env.example .env
php artisan key:generate
4.	Crie o banco de dados SQLite localmente (apenas nesta máquina):
No PowerShell:
New-Item -ItemType File -Path .\database\database.sqlite
5.	Execute as migrações para criar as tabelas no banco de dados:
php artisan migrate
6.	Crie o link simbólico para armazenar os arquivos de áudio:
php artisan storage:link
7.	Inicie o servidor local da aplicação:
php artisan serve
8.	Acesse a aplicação no navegador, no endereço:
http://localhost:8000
