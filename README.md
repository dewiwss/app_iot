<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
using `<a href="https://www.php.net/downloads.php">PHP >= 7.3.0</a>`
</p>

## Deployment

`composer update`<br>
copy `.env.example` kemudian rename menjadi `.env`<br>
atur database:<br>
`DB_DATABASE=app_iot
DB_USERNAME=root
DB_PASSWORD=`

buat database bernama <b>app_iot</b><br>

`php artisan key:generate`<br>
`php artisan migrate --seed`<br>
`php artisan serve`<br>
jalankan http://127.0.0.1:8000/ di browser<br>

login admin:<br>
admin@email.com<br>
admin123<br>

login user biasa:<br>
user@email.com<br>
user123<br>


**ENDPOINTS data sensor**

Method `GET` <br>
Endpoints `http://localhost:{port}/api/v1/device_sensor?data_sensor={nilai_data_sensor}&device_id={device_id}&sensor_id={sensor_id}`
