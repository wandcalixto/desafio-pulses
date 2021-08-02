-----

Para rodar a aplicação foi utilizado o homestead

Link para a pasta do hommestead já configurada: https://drive.google.com/file/d/1-o8O_WV_KqgqX06d1vMC5Lx5Ga0PeXEC/view?usp=sharing

Ou : https://laravel.com/docs/8.x/homestead

Basta colocar na raiz do usuario no ubuntu acessar, apagar o arquivo Vagrantfile e instalar o vagrant: https://www.vagrantup.com/downloads

E depois executar dentro do homestead o comando: vagrant up

Além disso é necessario criar um criar um dns chamado  pulses.test para isso é necessio executar o comando "sudo nano /etc/hosts" e incluir uma linha com o ip:

192.168.10.10   pulses.test

o hommestead irá procurar pelo código fonte na raiz do usuário no caminho: pulses/desafio

Caso não queira utilizar o hommestead basta rodar da maneira que preferir :)


 Para o banco de dados foi utilizado o mysql, para criar as tabelas basta executar os comandos de migrate do php artisan ou executar o dump do link: https://drive.google.com/file/d/1bMpPdngZTEHXz6B7rAtvgMCSUvCt6sYQ/view?usp=sharing
