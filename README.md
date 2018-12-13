# laravel-passport-docker-playground

run ```cd laravel-backend```
run ```docker-compose build```
run ```docker-compose up```

In a new terminal 

run ```docker exec laravel-backend_api-app_1 php artisan migrate```

visit localhost:8080 to register and create a new api consumer or personal access token

visit localhost:8081 to authorise client to api. 
note: You will need to update the client_id and client_secret in ```web.php``` in ```laravel-frontend``` 

