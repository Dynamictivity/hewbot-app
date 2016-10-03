# hewbot-app

This is the website application which controls the orchestration of hewbot(s)

## Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your environment.

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`
2. Run `composer install` to setup the application dependencies
3. Run `bin/cake migrations migrate` to populate the database
<!-- 4. Run `bin/cake migrations seed --seed DatabaseSeed` to seed the database -->
5. Run `bin/cake server -H 0.0.0.0` to start the application
6. Proceed to `http://localhost:8765/admin/users/add` to create your user

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

## Creating an account

Access [http://localhost:8765/users/register](http://localhost:8765/users/register) and fill out the fields.

If you choose #1, you need to do some extra steps:

1. Fetch your token from the database. (Users table, token column)
2. Then go to [http://localhost:8765/users/confirm/TOKEN](http://localhost:8765/users/confirm/TOKEN) where `TOKEN` is the token.
3. Update the `is_admin` field to `1` to enable admin access
