## Basic Store

## Step 1: Clone repository

If it's Windows we highly recommend using [Laragon](https://laragon.org/) as a local development environment.

```
git clone https://github.com/ingoswaldo/evertecinc-test.git
```

## Step 2: Switch to the repo folder

```
cd evertecinc-test
```

## Step 3: Install all the dependencies using composer

You must run the next command:

```
composer install
```

## Step 4: Create .env file

The .env file is generally not loaded, due to security issues. The easiest way to do this is to copy the .env.example file to .env, and modify the latter:

```
copy .env.example .env
```

## Step 5: Generate project key

Laravel requires an encryption key for each project. So, you must run the next command:

```
php artisan key:generate
```

## Step 6: Set up the place to pay keys

The ecommerce use the place to pace gateway, so you need set up the keys in the .env file.
The key are the next

```
PLACE_TO_PAY_LOGIN=
PLACE_TO_PAY_TRAN_KEY=
PLACE_TO_PAY_URL=
```
These are the necessary variables to set up, you can set up other variable related to the timeout with the place to pay gateway, it's the next:

```
PLACE_TO_PAY_TIMEOUT=15 //by default is 15 and please fill it with integer values
```

## Step 7: Create database

Laravel is configured to use mySQL by default, not only the driver, server, database, user and password must be changed, but also the port, mySQL uses 3306 and postgres 5432.

## Step 8: Migrate and seed the database

I already created the migrations with the test data.

```
php artisan migrate --seed
```

## Step 9: Start the local development server

```
php artisan serve
```

# Ready to go!

You can now access the server at http://localhost:8000.

# Default Admin User

```
email: super@super.com
password: password
```

# Testing

If you want to run the tests, you must run the next command:

```
php artisan test
```