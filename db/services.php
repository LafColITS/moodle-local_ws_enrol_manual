<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Web service definition for enrol_manual.
 *
 * @package    local_ws_enrol_manual
 * @copyright  2024 Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = [
    'local_ws_enrol_manual_add_instance' => [
        'classname' => 'local_ws_enrol_manual_external',
        'methodname' => 'add_instance',
        'classpath' => 'local/ws_enrol_manual/externallib.php',
        'description' => 'Add manual enrolment instance',
        'type' => 'write',
        'capabilities' => 'enrol/manual:config',
    ],
];

$services = [
    'ManualEnrollment' => [
        'functions' => [
            'local_ws_enrol_manual_add_instance',
        ],
        'restrictedusers' => 1,
        'enabled' => 0,
        'shortname' => 'local_ws_enrol_manual',
        'downloadfiles' => 0,
        'uploadfiles' => 0,
    ],
];
