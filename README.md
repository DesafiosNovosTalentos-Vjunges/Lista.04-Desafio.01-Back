# Lista.04-Desafio.01-Back
/*
    Comandos git bash:
        git add 'arquivo'
        git add .
        git status
        git commit -m ""
        git push
    
    Comandos bash:
        cp .env.example .env <criar o .env a partir do .env.example>

        Docker temporário
            docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v "$(pwd):/var/www/html" \
            -w /var/www/html \
            laravelsail/php83-composer:latest \
            composer install --ignore-platform-reqs

        ./vendor/bin/sail up -d <iniciar o container>
        ./vendor/bin/sail down <derrubar o container>
        ./vendor/bin/sail down --remove-orphans <derruba containers 'órfãos'>
        ./vendor/bin/sail artisan key:generate <gerar chave do Laravel>
        ./vendor/bin/sail artisan migrate <rodar as migrations>
        ./vendor/bin/sail composer dump-autoload <atualizar>
        ./vendor/bin/sail artisan migrate:fresh <limpa tudo>
        
    Coisas a lembrar:
        FORWARD_DB_PORT
        APP_PORT
*/