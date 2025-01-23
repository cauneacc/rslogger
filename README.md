I wrote an RsLogger library that is located in the rsLoggerTestApplication/RsLogger folder. There is a driver, which deals with writing to the storage medium, a formatter, which formats the messages, a class for configuration, a class that represents the message to be logged and a class for creating the logger.

The tests for the library are in rsLoggerTestApplication/RsLogger/tests. Examples of using the library are in the file rsLoggerTestApplication/index.php The library can write messages in standard output and in a file. I made some classes that write the messages in mysql extending the library, these classes are in rsLoggerTestApplication/app/lib/. I made the application work in a Docker container. There is also a mysql container.
To create and start Docker containers
```
docker-compose up -d
```

To run bash commands on the application container:
```
docker-compose exec rslogger-test-application bash
```
To run the examples:
```
php index.php
```
To view the logs
```
cat logs/fileDriverExample.log
cat logs/fileDriverJsonFormatterExampleConfiguration.log
```
To run the mysql client on the mysql container, run the command below, the password is "rslogger".
```
docker-compose exec mysql mysql -u rslogger -p rslogger
```
To see what was written in the log table
```
select * from log;
```
