#Bangla-To-Do-Application-in-Laravel-5.2

This application is a basic To-Do Application where User Interface is written in Bangla Language.

<h6>First of all you have to register yourself.</h6>

![Alt text](http://imgur.com/VsR5nUU.png)

<h6>Then you can add Task.</h6>

![Alt text](http://imgur.com/OgaQmik.png)

<h6>Only you can edit or delete the task.</h6>

![Alt text](http://imgur.com/HXsw1D5.png)

<h6>Task can be done by any user.</h6>

![Alt text](http://imgur.com/V4OyJL2.png)

<h6>If the person who added the task or the person who did the task do not like this then they can use “Not Done” option.</h6>

![Alt text](http://imgur.com/j8Ziren.png)

<h6>I also added Bangla Validation rule in this application.</h6>

![Alt text](http://imgur.com/liXwfr4.png)

##How to run it in Local Server

<h6>I did this application in Laravel 5.2 and use MySQL Database.</h6>

1.Download Zip or if you have GIT installed then write on your terminal/cmd

<code>git clone https://github.com/kaiser-tushar/Bangla-To-Do-Application-in-Laravel-5.2.git</code>

2.Go to project folder. 

3.Open and write on your cmd/terminal:

<code> composer install</code>

4.write on your cmd/terminal: 

<code>composer update</code>

 
5.change the <b>default.env.example</b> file name to <b>.env</b>

![Alt text](http://imgur.com/FlhKUNE.png)

<b>For windows:</b> <code> copy default.env.example .env </code>

<b>For Mac/Linux:</b> <code> cp  default.env.example .env  </code>

6.Write the confuguration in .env file (ex: database name,username,password)

![Alt text](http://imgur.com/GgxmxKi.png)

7.Create a database and write in cmd/treminal:

<code>php artisan migrate</code>

8.write in cmd/treminal:

<code>php artisan serve</code>


