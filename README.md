<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## setup Laravel

1. after download the git repo copy env.eample to .env file
2. composer install - install all dependencies
3. run this migration and seeding command - php artisan migrate:fresh --seed
4. logins API to view data which are protected with using sanctum Bearer token provide by the system

logins with password: 
1. 
'email' => 'owner@example.com',
 password =>  password

2.
  'email' => 'manager@example.com',
  password =>  password

3.
 'email' => 'cashier@example.com',
  password => password

spatie/laravel-permission package used for authorization 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
