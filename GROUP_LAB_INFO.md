## Database Ini File

```
; MySQL database configuration file

host = "cqc353.encs.concordia.ca"
port = "3306"
user = "cqc353_4"
password = "c353dbms"
dbname = "cqc353_4"
charset = "UTF-8"
```
To test: https://cqc353.encs.concordia.ca/testdb.php

##  COMP353 Group account and Database 
There are 2 new members to this group...

The ENCS usernames in this group are

  a_portaf,dan_yoo,g_ahki,r_degu,y_boujbe

You have been given the "group account" cqc353_4 to do your project work
for this course. "group accounts" are needed so that you can share files
with your partners easily.

2 email aliases have been setup for your group. Sending email to either
cqc353_4@encs.concordia.ca or cq_comp353_4@encs.concordia.ca will send email
to each one of you.

Though you have a group account you do not have to login to it. You have
been added to the "cqc353_4" linux group and you can write in the following
directories:

```
   /groups/c/cq_comp353_4       This directory is where you should cd into
                                and use while working on the project.
                                It is *NOT* available on the web server!
								
   /www/groups/c/cq_comp353_4   This is the directory where you should place
                                *ALL* the files to be viewable on the web.
```

You as a user do not have any disk quota on the above directories but the
linux group "cqc353_4" does. The above directories have the sgid bit set
(the 's' in 'rws' below) which means that any files or directories created
below these ones will automatically belong to the "cqc353_4" group
```
  permissions     owner       group        location
   drwxrws---    cqc353_4   cqc353_4      /groups/c/cq_comp353_4
   dr-xrws---    nul-web    cqc353_4      /www/groups/c/cq_comp353_4
```
(The web server initially runs as "nul-web" before switching to "cqc353_4".)


If you change the permissions of any directory under these make sure that
the 's' bit is on (use "chmod g+s name_of_subdirectory" to do so). If you
ever get a message that you are over quota please check the permissions of
the directory you are trying to write into.

The server used for the project runs Scientific Linux 7.4
The version of MYSQL in use this term is 5.6.43 and PHP is version 7.2.11

You can run the command "mysql" on any linux machine in the faculty.

Your MYSQL username is cqc353_4
The name of the MYSQL server is cqc353.encs.concordia.ca
The name of the database you can use is also cqc353_4
The password for your database is c353dbms  (case sensitive)
You cannot change this password.


To run mysql use the following:
```
[login] 101 => mysql -h cqc353.encs.concordia.ca -u cqc353_4 -p cqc353_4
Enter password: c353dbms

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 350
Server version: 5.6.43 Source distribution

Copyright (c) 2000, 2018, Oracle and/or its affiliates. All rights reserved.
Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create table employees(SIN dec(9));
Query OK, 0 rows affected (0.03 sec)

mysql> show tables;
+--------------------+
| Tables_in_cqc353_4 |
+--------------------+
| employees          |
+--------------------+
1 row in set (0.01 sec)

mysql> alter table employees add Name char(25);
Query OK, 0 rows affected (0.03 sec)
Records: 0  Duplicates: 0  Warnings: 0

mysql> desc employees;
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| SIN   | decimal(9,0) | YES  |     | NULL    |       |
| Name  | char(25)     | YES  |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+
2 rows in set (0.00 sec)

mysql> drop table employees;
Query OK, 0 rows affected (0.02 sec)

mysql> show tables;
Empty set (0.00 sec)

mysql> exit
Bye
```

The User ID  for web access is cqc353_4
The password for web access is c353dbms

The base URL for your web pages is

   https://cqc353.encs.concordia.ca/

Note: it is https not http! The web server will automatically redirect
      to https if the URL starts with http.


As an example you can create a foo.php in /www/groups/c/cq_comp353_4
that contains:
```
<HTML>
<HEAD>
  <TITLE>Date/Time Functions Demo</TITLE>
</HEAD>
<BODY>
<H1>Date/Time Functions Demo</H1>
<P>The current date and time is
<EM><?echo date("D M d, Y H:i:s", time())?></EM>
<P>Current PHP version:
<EM><?echo  phpversion()?></EM>
</BODY>
</HTML>
```

Using the URL https://cqc353.encs.concordia.ca/foo.php
you would see something like

    Date/Time Functions Demo

    The current date and time is Tue Jan 15, 2019 10:12:43

    Current PHP version: 7.2.11


Stan

*****************************************************************************
* Stan Swiercz              * Tel: (514) 848-2424 ext 3054   Fax: 848-2830  *
* Manager Apps and Info Sys * Room:EV-7.165 Email:stan.swiercz@concordia.ca *
* ENCS -- AITS              * WWW: http://users.encs.concordia.ca/~stan     *
* Concordia University      *************************************************
* Montreal, Canada          *  A clean desk is a sure sign of a sick mind!  *
***************************************************************************** 
