# Delocal Homework (PHP 7.4.8)
# Task
Delocal Zrt. - PHP Fejlesztői teszt

### Contacts API

**The task:**
The API represents a contacts entity and reachable through http. The contacts should be
stored in a database and the input/output of the API should be in ​ **JSON** ​ format:

- return all contacts: [http://example.com/contacts](http://example.com/contacts)
- return a contact by id: [http://example.com/contacts/{id}](http://example.com/contacts/{id})
- modify a contact (change email at an existing contact...)
- create a contact (all fields are required)

Reading should be handled with ​ **GET** ​ and writing with ​ **PUT** ​.
Data structure of a contact:
- name
- email
- phone number
- address

**Additional info:**
* You should use Php.
* You should not use any framework.
* You should write production code that you would push to a repository and solves the feature.
* You should submit the solution even if it is not fully finished.


# Installation & usage
> Requirements: PHP(7.4.8) and MySQL drivers
- Clone the repository
- Set up the environment.php file
- Create the database with the provided sql files
-- You can use XAMPP and PHPMyAdmin

code to run the server:

```sh
cd master
php -S localhost:8000
```
You can use Postman to send request to the routes described.
# Tech

Used technologies for this project:

* [PHP] - For the best web apps!
* [PHP Storm] - Awesome php text editor by jetbrains.
* [MySQL] - Oracles awesome database.
* [Postman] - Every Back-end developers favorite front-end

# Routes and capabilities

| Routes | Type | funtionality | Success | Failure |
| ------ | ------ |-----|-----|-----|
| /contacts/show | GET | Returns a JSON encoded response with all the contacts. | 200 OK|404 Not Found|
| /contact/{id} | GET | Returns a JSON encoded response with a contact that matches the ID. |200 OK| 404 Not Found|
| /contacts/store | POST | Creates a record in the database from the JSON body  |201 Created|400 Bad request|
| /contacts/update | PUT | Updates the email of the contact that matches the id in the JSON body |200 OK| 422 Unprocessable Entity|


# Time-spent table
|Time spent|Implemented functionality|
|----|----|
|1 hour|Researching the topic.|
|1 hour|Planning the layout of the application.|
|15 minutes|Connect to the MySQL database.|
|1.5 hours| Creating the files regarding the database. |
|3 hour| Implementing the contact.php|
|2 hour>|Implementing the api endpoints|
|1 hour| Implementing the front controller to mask the url and provide the right functionalities with the respected route.|
| 30 minutes| Creating a read.me "documentation" and thw SQL files.|
|10 hours~|TOTAL (Note that the time spent numbers are estimated)|


# Challenges
> There were some challenges with the conditions specified. The absence of a well known framework like Laravel or Lumen, that I have been using for the past 2 months really took a toll on my productivity, Im so used to the convinience features of Laravel, it was eye opening to see how much I had been relying on it. Tried my very best to deliver my best possible work under the time I set to myself (10h).


License

--------

Free to use, free to modify, free to share.

[//]: # (http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [MySQL]: <https://www.mysql.com/>
   [Postman]: <https://www.postman.com/>
   [Php]: <https://www.php.net/>
   [PHP storm]: <https://www.jetbrains.com/phpstorm/>
   
