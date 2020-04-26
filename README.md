# import-export excel for sngle sheet and multiple sheets in laravel 5.8

Here we are going to import single worksheet and multiple worksheets those are in single excel file and alse going to export data in excel as well as csv format.

1. Download / Clone the project <br>
    git clone (clone link) --> in cmd
2. Update composer after downloding the files <br>
    update composer
3. Generate APP_KEY by using command <br>
    php artisan key:generate
4. Generate storage link if neccessory. <br>
    php artisan storage:link
5. Create .env file as same as .env.example in project
6. Configure .env settings <br>
    APP_URL=http://localhost:8000/import-export<br>
    DB_CONNECTION=mysql<br>
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=import_example<br>
    DB_USERNAME=root<br>
    DB_PASSWORD=<br>
7. Migrate table<br>
    php artisan migrate

8. Project is ready to run. use link : http://localhost:8000/import-export   <br> 

*note : How to install packages has been described in "users_guide.xlxs" file which is in project.
