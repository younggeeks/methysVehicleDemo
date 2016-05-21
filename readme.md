# Vehicle Management Demo 

Full Working Demo is available at :
 
 http://vehiclesdemo.herokuapp.com/
 

## Table of Contents

- [Downloading](#downloading)
- [Installation](#installation)
- [Database Migration and Seeding](#database-migration-and-seeding)
- [Running The Demo](#running-the-demo)
- [API Reference](#api-reference)

## Downloading

Navigate to Your Webroot ie. www or htdocs and create a folder with your desired name eg vehicles

pull repository from github with the following commands:

git init

git pull https://github.com/younggeeks/methysVehicleDemo.git


## Installation

In Your Root Directory Rename .env.example to .env

Then Fill in Your database username and password as well as your database name

Eg:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=sample_db

DB_USERNAME=sample_user

DB_PASSWORD=secure_password

> Then in your terminal type:

 - composer install


## Database Migration and Seeding

In Your Terminal type the following commands for migrating and then seeding the database:

 - php artisan migrate
 
 - php artisan db:seed


## Running The Demo
 
Make Sure You set appropriate permissions for your directory! Permission denied is common case here

Go to your browser and type the address of the application :

eg: 

http://localhost/vehicles/public

You will be prompted to enter Email and Password to Login

Type The Following Demo Credentials

Email : samjunior@kiu.ac.tz

password : secret
 


## Api Reference

Table Of Contents
 
 - [Introduction](#introduction)
 - [List All Vehicles](#list-all-vehicles)
 - [View Single Vehicle](#view-single-vehicle)
 - [Delete Vehicle](#delete-vehicle)
 - [Insert Vehicle Information](#insert-vehicle-information)
 - [Edit Vehicle Information](#edit-vehicle-information)
 
 
 ## Introduction
 
 To access Vehicle RestApi From third party User must have a token, which is generated when user logs in
 
 For Demo Purpose there is a link to obtain a token 
 
 Token will expire after some time
 
 Simply go to http://localhost/vehicles/public/getToken or whatever your URL may be 
 
 In other words go to /getToken
 
 Copy The Token as you are going to need it in order to access the API
 
 You can optionally choose the response type, either XML or JSON
 
 If no format is specified Api will return default Type (json)
 
 ## List All Vehicles
 
 ```
GET /api/v1/vehicle?format={format}&token={token}
 
 ```
 
 ### Parameters
 
 | Name         | Type           | Description                                              |
 | :---         |     :---:      |          :---                                           |
 | format       |     string      | Can be XML Or JSON, it is not required                  |
 | token        |     string     | Obtained when user is authenticated , it is required     |
 
 
 
 ## View Single Vehicle
 
 ```
GET /api/v1/vehicle/{vehicleId}?format={format}&token={Token}
 
 ```
 
 ### Parameters
 
 | Name         | Type           | Description                                              |
 | :---         |     :---:      |          :---                                            |
 | format       |     string      | Can be XML Or JSON, it is not required                  |
 | token        |     string     | Obtained when user is authenticated , it is required     |
 | vehicleId        |     string     |Id of Vehicle to be Viewed, Must be valid , is required  |
 
 
 
 
 ## Delete Vehicle
 
  ```
 DELETE /api/v1/vehicle/{vehicleId}?format={format}&token={Token}
  
  ```
  
  ### Parameters
  
  | Name         | Type           | Description                                              |
  | :---         |     :---:      |          :---                                            |
  | format       |     string      | Can be XML Or JSON, it is not required                  |
  | token        |     string     | Obtained when user is authenticated , it is required     |
  | vehicleId        |     string     |Id of  a Vehicle to be Deleted, Must be valid , is required  | 
 
 
 
 ## Insert Vehicle Information
 
 ```
POST /api/v1/vehicle?format={format}&token={token}&{vehicle information}
 
 ```
 
 ### Parameters
 
 | Name         | Type           | Description                                              |
 | :---         |     :---:      |          :---                                            |
 | format       |     string      | Can be XML Or JSON, it is not required                  |
 | token        |     string     | Obtained when user is authenticated , it is required     |
 | vehicle information        |     string     | They are All required  |
 
  
 
 
 ## Edit Vehicle Information
 
 ```
PUT /api/v1/vehicle/{vehicleId}?{fields}&&token={your Token}
 
 ```
 
 ### Parameters
 
 | Name         | Type           | Description                                              |
 | :---         |     :---:      |          :---                                            |
 | format       |     string      | Can be XML Or JSON, it is not required                  |
 | token        |     string     | Obtained when user is authenticated , it is required     |
 | vehicleId    |     string     | Id of the vehicle To be Updated     |
 | fields        |     string     |Fields To be updated In the Db  |
 
 
 
 
 
 
