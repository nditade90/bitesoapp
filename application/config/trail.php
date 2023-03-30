<?php
/**
 * CodeIgniter User Audit Trail
 *
 * Version 1.0, October - 2017
 * Author: Firoz Ahmad Likhon <likh.deshi@gmail.com>
 * Website: https://github.com/firoz-ahmad-likhon
 *
 * Copyright (c) 2018 Firoz Ahmad Likhon
 * Released under the MIT license

 */

defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Enable Audit Trail
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to use of audit trail
|
*/
$config['audit_enable'] = TRUE;

/*
|--------------------------------------------------------------------------
| Not Allowed table for auditing
|--------------------------------------------------------------------------
|
| The following setting contains a list of the not allowed database tables for auditing.
| You may add those tables that you don't want to perform audit.
|
*/
$config['not_allowed_tables'] = [
    'ci_sessions',
    'user_audit_trails',
];

/*
|--------------------------------------------------------------------------
| Enable Insert Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track insert event.
|
*/
$config['track_insert'] = TRUE;

/*
|--------------------------------------------------------------------------
| Enable Update Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track update event
|
*/
$config['track_update'] = TRUE;

/*
|--------------------------------------------------------------------------
| Enable Delete Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track delete event
|
*/
$config['track_delete'] = TRUE;