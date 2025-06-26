# DynamicCity
The project aims to create a platform through which people can monitor everything that is happening with bus transport, so that they do not have to worry about whether they will be able to get home or not

## Table of Contents
- [Main Features](#main-features)
- [Architecture](#architecture)

## Main Features

### Normal User
- Buy bus tickets
- View purchased tickets
- Get a barcode for the chosen ticket
- View various courses from the app

### Bus Company Admin Panel
- Create/remove buses
- Add/remove bus station connections
- Create/remove destinations
- Create/remove courses
- Track bus location
- Create course schedules

### Bus Station Panel 
- Accept sent requests from bus companies

### Admin Panel
- Create Bus Stations
- Create Bus Companies 

## Architecture
To achieve the above functionalities, I designed a system architecture that includes several components and their interactions. The architecture consists of the following main entities:
![UML диаграма на архитектурата2](https://github.com/user-attachments/assets/ca63dd48-1510-4786-a605-d48beb2e946d)

The software system has two servers:
1. **Web Server**: Handles the main application logic, user interactions, and serves the frontend.
2. **Websocket Server**: Manages real-time data, such as bus locations and schedules.

### Web Server
Web Server is built using Laravel, a PHP framework, and it provides the following functionalities:
- Fast and robust backend development.
- Database management using Eloquent ORM.
- Big ecosystem of packages for additional features.

Web server stores data into transactional relational database MySQL, which is used to store all the data related to the application, such as users, buses, courses, tickets, and more.
Stripe API is used for payment processing, allowing users to purchase tickets securely and companies to get their money on time.

### Websocket Server
Websocket Server is built using PHP and websocket, providing real-time communication capabilities. It handles real-time updates for bus locations and seats count
It stores data into transactional non-relational database MongoDB, which provide fast writes and indexing for location data.

### IoT 
The IoT component is responsible for collecting real-time data from buses, such as their location and seat availability. This data is sent to the websocket server, which then broadcasts it to the web server for display on the user interface.
For test purposes, the IoT component is simulated using a PHP script that generates random bus locations and sends them to the websocket server. The communication between the IoT component and the websocket server is encrypted with TLS.

## Communication between two servers 
The communication between the web server and the websocket server is done through a message broker, which allows for efficient data exchange and real-time updates. 
It is used for delivering the data for bus location in real-time to the webserver so the companies can track their buses real-time

## Error Handling
Error handling on the architecture is done thought elastic search and kibana but is not implemented yet.


