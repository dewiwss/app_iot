<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
    Requirements <a href="https://www.php.net/downloads.php"><b>PHP >= 7.3.0</b></a>
</p>

## Deployment

`composer update`<br>
copy `.env.example` kemudian rename menjadi `.env`<br>
atur database:<br>
`DB_DATABASE=app_iot
DB_USERNAME={nama username database di komputer}
DB_PASSWORD={password database di komputer}`<br>

buat database bernama <b>app_iot</b><br>

`php artisan key:generate`<br>
`php artisan migrate --seed`<br>
`php artisan serve`<br>
jalankan http://127.0.0.1:8000/ di browser<br>

login admin:<br>
email : `admin@email.com`<br>
password : `admin123`<br>

login user biasa:<br>
email : `user@email.com`<br>
password : `user123`<br>


**ENDPOINTS data sensor**

Method `GET` <br>
Endpoints `http://localhost:{port}/api/v1/device_sensor?data_sensor={nilai_data_sensor}&device_id={device_id}&sensor_id={sensor_id}`

### ERD:
<img src="ERD.png" width="250">
