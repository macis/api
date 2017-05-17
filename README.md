# REST API for Macis CRM 

This is the only entrypoint between storage and the outside world. Designed to be simple and fast.

## Usage

### Database

Database model is a .mwb designed to be used with mysql workbench, please create the database and import the model before anything else.

In addition, a .sql is provided for unit testing with fixtures included in the database directory.

### User creation

You must create users manually into the database

$user = "user";

$hash = password_hash("password", PASSWORD_DEFAULT);

$status = $pdo->exec(
    "INSERT INTO users (user, password) VALUES ('{$user}', '{$hash}')"
);

### Calls

You must use the basic http authorization to authenticate with user and password with every request

## Code Status
![Sensiolabs Medal](https://insight.sensiolabs.com/projects/81827d46-2753-4b86-a065-a223214febc8/big.png)

[![Build Status](https://travis-ci.org/macis/api.svg?branch=master)](https://travis-ci.org/macis/api)

[![Coverage Status](https://coveralls.io/repos/github/macis/api/badge.svg?branch=master)](https://coveralls.io/github/macis/api?branch=master)
