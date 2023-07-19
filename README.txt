Users manual:
1. Open the documents using Code Editor
2. Create the .env file and set-up your database in DB_DATABASE
2. Open the the console of your code editor
3. Position yourself in the root folder
4. Write the "composer install" command in the console
5. Migrate all migrations using "php artisan migrate" command
6. In the database/seeder/DatabaseSeeder.php file 
	6.1 uncomment RoleSeeder::class and than use the "php artisan db:seed" command or "php artisan db:seed --class=RoleSeeder" command
   	to seed the "roles" table with data
	6.2 comment RoleSeeder::class and uncomment AdminSeeder::class - to seed the "users" table with the Admin details
	6.3 comment AdminSeeder::class and uncomment:
		- \App\Models\User::factory(1000)->create() to seed the "users" table with 1000 Users
		- PrimaryAddressSeeder::class to seed the "primary_addresses" table with 1000 primary addresses
		- SecondaryAddressSeeder::class to seed the "secondary_addresses" table with 1000 secondary addresses
7. You can now log in the page using 
	the Administrator credentials (email: admin@admin.com, password: Admin@123) 
	or user credentials (email: the email from the "users" table, password: Test@123)


