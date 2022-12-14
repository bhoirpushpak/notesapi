**How to get started with NotesAPI**
-
****
**Prerequisites**
-
1. Install MongoDB driver (Discard this step if you have it already installed)r
2. Install Compose
3. Copy .env.example to .env

**Installing MongoDB driver**
-
- Windows:
  - copy the **php_mongodb.dll** from the **notesapi/public/data** folder
  - paste it into php installation dir **C:\xampp\php\ext**\
  - open php.ini and add extension=php_mongodb.dll and save it
  
- Linux / Ubuntu
  - Install the PHP extension for MongoDB `sudo pecl install mongodb`
  - Locate your php.ini file (/etc/php/_version_/apache2)
  - Add the following line to your php.ini file `extension=mongodb.so`
  - Tips:
    - locate monogodb `locate php.ini | xargs grep mongo`
    - Check if mongodb module is loaded `php -i | grep extension_dir`

**Installing Composer**
-
- Windows
  - Use this link to download lastest composer and install it 
  - https://getcomposer.org/Composer-Setup.exe
- Linux / Ubuntu
  - Follow the steps on this link
  - https://linuxize.com/post/how-to-install-and-use-composer-on-ubuntu-20-04/

**Setting up the Project**
-
- Copy .env.example to .env
- In Terminal run the follwing commands
  - `composer update`
  - `composer dump-autoload`
  - `php artisan key:generate`
  - `php artisan serve`

**API Endpoints**
-
- Get a list of all notes.
  - GET `/api/notes/create`
- Get a specific note
  - GET `/api/notes/{note_slug}`
  - GET `/api/notes/{id}/edit`
- Add a note
  - POST `/api/notes`
  - Body JSON `{"note_title": "The new world of hello","note_content":"Hello World"}`
- Edit a note
  - PUT`/api/notes/{id}`
  - Body JSON `{"note_title": "The new world of cats","note_content":"Hello Cats"}`
- Delete a note.
  - DELETE `/api/notes/{id}`


[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/6b4236530c3945307a68?action=collection%2Fimport)

**The project is hosted on http://34.237.4.39**   
