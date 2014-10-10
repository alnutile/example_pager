<?php

/**
 * Examples
 *
 * Showing Limit working
 * http://test.dev:8000/users?limit=2
 *
 * Showing limit page 2
 */

$router->get('/users', 'UsersController@index');
