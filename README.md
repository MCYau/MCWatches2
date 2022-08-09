# MCWatches

***   Best View in Resolution 1920 x 1080   ***

How to setup for MC watches website

***   Installation Setup Guide  ***

1. To load the system, a 3rd party software needs to be downloaded
2. Download Xampp from https://www.apachefriends.org/index.html 
3. Choose the correct setup for your own operating system.
4. After downloaded and install XAMPP at the OS disk, remember not to install XAMPP at the programs files folder. User can own self select the destination of the folder.
5. After installation, search for the xampp-control.exe or xampp-control panel.exe, and right click to run as administrator. 
6. You will see Apache and MySQL, if the service icon is a cross (X), click onto it to let it install the service.
7. Click start server for both the Apache and MySQL


***  Database Setup Guide ***

1. Type in http://localhost/phpmyadmin/ in the browser
2. To load the database, click on the New at the top left-hand corner.
3. Type in the database name: “mcwatches” and click on Create.
4. After creating the database folder, click on Import and search for the files with mcwatches.sql and press import.
5. It will display that the database has been successfully imported.
6. If there is an error importing the .sql, which shows “Table already exists”, type this command below in the SQL tab at the top and type in this command and click on “Go” to execute the command. After executing the command, the error will be gone.

FLUSH TABLES; /* Clears all tables from the table cache */
DROP TABLE IF EXISTS `MyDatabase`.`MyTableName`;
FLUSH TABLES;

*** Replace `MyDatabase`.`MyTableName`; regardless of the error given ***


***  Instructions on how to run the program ***

1. Search for the folder htdocs located inside the xampp folder.
2. Paste the folder name “MCWatches” inside htdocs.
3. Launch the web browser.
4. Type in http://localhost/MCWatches/index.php
5. It will display the homepage of the website
6. For administrator, the Username: admin and the Password: 1234
7. For normal user, the Username: user1 and the Password: 1234