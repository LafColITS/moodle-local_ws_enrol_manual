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
 * External functions for managing enrol_manual.
 *
 * @package    local_ws_enrol_manual
 * @copyright  2024 Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use core_external\external_api;
use core_external\external_function_parameters;
use core_external\external_single_structure;
use core_external\external_multiple_structure;
use core_external\external_value;

/**
 * External functions for managing enrol_manual.
 *
 * @package    local_ws_enrol_manual
 * @copyright  2024 Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_ws_enrol_manual_external extends external_api {

    /**
     * Returns description of method parameters
     *
     * @return external_function_parameters
     */
    public static function add_instance_parameters() {
        return new external_function_parameters([
            'params' => new external_single_structure([
                'courseid' => new external_value(PARAM_INT, 'The course id', VALUE_REQUIRED),
                'status' => new external_value(PARAM_INT, 'Enable manual enrolments', VALUE_DEFAULT, 0),
                'roleid' => new external_value(PARAM_INT, 'Default role', VALUE_REQUIRED),
                'enrolperiod' => new external_value(PARAM_INT, 'Default enrolment duration', VALUE_DEFAULT, 0),
                'expirynotify' => new external_value(PARAM_INT, 'Notify before enrolment expires', VALUE_DEFAULT, 0),
                'expirythreshold' => new external_value(PARAM_INT, 'Notification threshold', VALUE_DEFAULT, 86400),
                'customint1' => new external_value(PARAM_INT, 'Send course welcome message', VALUE_DEFAULT, 1),
                'customtext1' => new external_value(PARAM_RAW, 'Custom welcome message', VALUE_DEFAULT, null),
            ])
        ]);
    }

    /**
     * Add a manual enrol instance to a course.
     *
     * @param array $params the parameters.
     */
    public static function add_instance($params) {
        $params = self::validate_parameters(self::add_instance_parameters(), ['params' => $params]);
        return [
            'id' => local_ws_enrol_manual\manage::add_instance($params),
        ];
    }

    public static function add_instance_returns() {
        return new external_single_structure(
            [
                'id' => new external_value(PARAM_INT, 'id of the created instance')
            ]        
        );
    }
}
