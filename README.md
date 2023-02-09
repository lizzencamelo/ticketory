# ticketory
An event booking database management system.

## Software Tools and Technology
```Figma```
&nbsp;
```HTML ```
&nbsp;
```CSS```
&nbsp;
```Bootstrap```
&nbsp;
```JavaScript```
&nbsp;
```PHP```
&nbsp;
```mySQL```
&nbsp;
```xampp```
&nbsp;
```Visual Studio Code```

## Developed by

**Lizzen Camelo**   
[![GitHub Badge](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/lizzencamelo)
[![LinkedIn Badge](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/lizzen-camelo/)  
**Kanchan Patil**  
[![GitHub Badge](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/knchn08)
[![LinkedIn Badge](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/kanchan-patil-a37087200/)  
**Flannan Ferrao**  
[![GitHub Badge](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/flannanferrao)

## Objectives
- The main objective of this project is to develop a user-friendly database management system for storage and retrieval of data.  
- Provide a secure system with password encryption.  
- To provide a effortless user experience to booking tickets for events.

## Features
▪ Viewing various concert/sport events with more information page.  
▪ User Dashboard for easy viewing of booked tickets.  
▪ Add/Update/Delete Tickets.  
▪ Login and sign-up modals using AJAX for interactive communication with the database.  
▪ Hardened security using sha1 password encryption.  
▪ Trigger on insertion of record into concerts/sports table to initialize event capacity based on venue capacity.  
▪ Decrementing event capacity based on booking of tickets and increase in capacity based on cancelation of tickets. Users are unable to book if tickets sold out.  
▪ Compulsory login/sign up to book tickets.  

## UI

### Home Page
![home](https://github.com/lizzencamelo/ticketory/blob/main/product/home.png)

### SignUp Modal  
![signup_modal](https://github.com/lizzencamelo/ticketory/blob/main/product/signup_modal.png)

### Login Modal   
![login_modal](https://github.com/lizzencamelo/ticketory/blob/main/product/login_modal.png)

### Dashboard   
![dashboard](https://github.com/lizzencamelo/ticketory/blob/main/product/dashboard_sec.png)

### Events Page
![events_concerts](https://github.com/lizzencamelo/ticketory/blob/main/product/events_concerts.png)

### Event Detail Page 
![event_detail_sports](https://github.com/lizzencamelo/ticketory/blob/main/product/event_detail_sport.png)

## ER Diagram
![er](https://github.com/lizzencamelo/ticketory/blob/main/product/ER.png)



## Launching website using xampp server

### Setting up the local server
         1. Install the xampp server and configure port settings.
            Link to install: https://www.apachefriends.org/
            Link to changing port settings: https://stackoverflow.com/questions/11294812/how-to-change-xampp-apache-server-port 
         2. Download house-of-calypso folder from the Google Drive folder.
            Link to Google drive folder: https://drive.google.com/drive/folders/1EWD2kTIOmPwXE8nEwSvFt_FMaZPlXIr7?usp=share_link
         3. Open the downloaded xampp folder and open the htdocs folder within it.
            Move the house-of-calypso folder in the htdocs folder.

### Creating the database.
         4. Locate the sql folder within house-of-calypso.
            Path: house-of-calypso > database > houseofcalypso.sql
         5. Open phpmyadmin page on a browser.
            - Start xampp control panel.
            - Start Apache and MySQL Modules.
            - Open browser. Type localhost/phpmyadmin
         6. Create a new database houseofcalypso by running following commands in the
            SQL editor tab. (NOTE: No hyphens in database name)
            CREATE DATABASE houseofcalypso;
         7. Select the database from the list of databases on the left by clicking on it.
         8. With the database selected import the houseofcalypso.sql file by clicking the
            Import tab. Choose the houseofcalypso.sql file from your system and click
            import. You should see all the tables under this database.
         
### Launching the website
         9. Launch the website by entering following path in the browser: localhost/house-of-calypso
         
         

