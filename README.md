*** Rese ***

** 環境構築方法 **

1. git clone git@github.com:JonyTask/Rese_Jony.git
2. docker-compose up -d --build
3. .envファイルの編集
4. docker-compose exec php bash
5. composer update
6. php artisan key:generate
7. php artisan migrate:fresh
8. php artisan db:seed

** ER図 **
<img src="ER.drawio.png">
