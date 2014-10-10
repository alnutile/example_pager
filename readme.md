Setup

~~~
touch storage/database.sqlite
~~~

make your .evn file say

~~~
APP_ENV=local
~~~

~~~
php artisan migrate
php artisan db:seed
~~~