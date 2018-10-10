
# Projected Harvest Date Demo

## Overview

This project demonstrates the use of BDD (behat), TDD (phpunit) and DDD (custom) inside of a Symfony 4 application. 
The application has one function which is to return the number of days till a given harvest date.


## Setup

Build the docker image locally 

`docker build -t digitalfu/harvest .`

Run the docker image 

`docker run -v $(pwd):/app -p 8000:8000 -t digitalfu/harvest`

The only active route is `/harvest` and it takes a `date` query param

e.g.
`http://127.0.0.1:8000/harvest?date=2012-10-10`


## Testing

Once the docker image is running, run the follow to connect to the container

`docker exec -it <CONTAINER_ID> bash` 

You can now run both behat and phpunit with the following commands respectively

`vendor/bin/behat`

`bin/phpunit`


## Notes

[PHP Timecop](https://github.com/hnw/php-timecop) was used for server date mocking for both behat and phpunit.

## Todo
 
  - Create scenarios for harvest dates that have past.








