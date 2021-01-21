# deezer-api-project

This project was started only to study and train application development. 
All informations about the API usage you can found in the url: https://developers.deezer.com/api

### Requeriments
  - PHP: ^ 7.2.5
  - Laravel: ^ 7.0
  - Bootstrap: ^ 4.5.3
  - Bootstrap-Select: ^1.13.18
  - Bootstrap-Sweetalert: ^1.0.1

### Installation

```sh
$ git init
$ git clone https://github.com/alessonmarques/deezer-api-project.git
$ npm update
$ composer update
$ composer dump-autoload -o
$ npm run dev --watch
```

### Configuration
First of all, you will need to configure two informations that Deezer will give u after the Application creation on their sandbox.

- Go to: https://developers.deezer.com/ (if you don't have an account, create one.)
- After get logged in, go to My Apps and click in: Create a new Application.
- Fill the form and click Create.
- In the sidebar you will find the application you've created.
- Select the **Application ID** and **Secret Key** 

Now, with that informations go to the project in **app\Support\Deezer\Deezer.class.php** and set the constants with the keys that Deezer.com has made available to you.

```php
    const     APP_ID                = ''; // Application ID 
    const     APP_SECRET            = ''; // Secret Key
```

### Todos

 - #1

License
----

MIT