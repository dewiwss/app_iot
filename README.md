<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://www.php.net/downloads.php">PHP >= 7.3.0</a>
</p>

## Deployment

`composer update`
copy `.env.example` kemudian rename menjadi `.env`
atur database:
`DB_DATABASE=app_iot
DB_USERNAME=root
DB_PASSWORD=`

buat database bernama <b>app_iot</b>

`php artisan key:generate`
`php artisan migrate --seed`
`php artisan serve`
jalankan http://127.0.0.1:8000/ di browser

login admin:
admin@email.com
admin123

login user biasa:
user@email.com
user123


**ENDPOINTS data sensor**

Method `GET` <br>
Endpoints `http://localhost:{port}/api/v1/device_sensor?data_sensor={nilai_data_sensor}&device_id={device_id}&sensor_id={sensor_id}`
