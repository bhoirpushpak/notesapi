#How to get started
Run following commands
<ol>
 <li>copy .env.example to .env</li>
    <li>composer update</li>
    <li>composer dump-autoload</li>
    <li>php artisan key:generate</li>
    <li>php artisan serve</li>
</ol>

**If you encounter error during mongodb installation**  
copy the dll from the public/data folder and paste it into 
php installaton dir php/ext<br>
open php.ini and add extension=php_mongodb.dll
