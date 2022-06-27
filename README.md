# Box-Urls
## Description :
- a website for save and protect your urls and links 
- **not have admin panel**

## How to use :
- import sqlfile/box urls.sql to your database
- edit file config.php and personalize with your host
- ``` php
define('PRT', 'http'); #enter your protocol host
define('DOMIN', 'localhost/links'); #enter your domin
define('BASE_URL',PRT."://".DOMIN); 
define('HOST','localhost'); #enter your mysql address
define('USER','root'); #enter your user mysql
define('DB','links'); #enter your database name
define('PASS',''); #enter your password mysql
```
