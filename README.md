# Aether
Small Blog WebApp Built On My PHPMVC (see other repo)

First of all make sure that rewrite_mod is enabled on your system (Google if you're not sure).

Now the only thing left to do is edit the following file: /app/config/config.php
Replace the ¨dbhost¨, ¨dbuser¨, ¨dbpassword¨ and ¨dbname¨ with your own database host, user, password and database name. 
Also, in the same file, replace ¨http://localhost/appname¨ with the url of your database and replace ¨AppName¨ with the name you prefer.

Also make sure to check whether the admin user id is ¨1¨ because if it is not you need to open the /app/helpers/session_helper and change the ¨1¨ in the function isAdmin() to the admin user id in your database.
