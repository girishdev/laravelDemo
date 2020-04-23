Git Clone

Create Database "laravelDemo" and connect on .env file 
and run the "php artisan migration"

Start Using Commands:

Run the Console Commands in order to Set data and Get and Delete data
- First Command
- Inserting data to "empdata" table

php artisan SET empdata --column1=2 --column2=Girish --column3=192.168.10.10

- Second Command
- Inserting data to "empwebhistory" table

php artisan SET empwebhistory --column1=192.168.10.10 --column2=http://facebook.com
 
- Third Command Getting Data from both the table
- Retrieve Data from Table: "empdata" and "empwebhistory" respectively

php artisan GET empdata 192.168.10.10 
php artisan GET empwebhistory 192.168.10.10 -> Getting with relation

- Fourth
- Unsetting data means here we are SoftDeleting data
php artisan UNSET empdata 192.168.10.10 -> this will softDelete Data
php artisan UNSET empwebhistory 192.168.10.10

Thank you 
