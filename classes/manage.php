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
 * Manage enrol_manual instances.
 *
 * @package    local_ws_enrol_manual
 * @copyright  2024 Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_ws_enrol_manual;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/enrol/manual/lib.php');

/**
 * Manage enrol_manual instances.
 *
 * @package    local_ws_enrol_manual
 * @copyright  2024 Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class manage {
    /**
     * Add an enrol_manual instance to a course.
     *
     * @param array $params the parameters for the instance
     *
     * @return int the id of the new instance
     */
    public static function add_instance($params) {
        global $DB;

        // Normalize.
        $fields = $params['params'];

        // Verify the course.
        $course = $DB->get_record('course', ['id ' => $fields['courseid']], '*', MUST_EXIST);

        $plugin = enrol_get_plugin('manual');

        // Check for existing instance.
        if ($DB->record_exists('enrol', ['courseid' => $course->id, 'enrol' => 'manual'])) {
            throw new \invalid_parameter_exception('enrol_manual instance exists for course ID '. $course->id);
        }

        $enrolid = $plugin->add_instance($course, $fields);
        return $enrolid;
    }
}
