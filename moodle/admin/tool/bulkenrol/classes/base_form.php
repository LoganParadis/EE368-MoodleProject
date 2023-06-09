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
 * File containing the base import form.
 *
 * @package    tool_bulkenrol
 * @copyright  2013 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir.'/formslib.php');

/**
 * Base import form.
 *
 * @package    tool_bulkenrol
 * @copyright  2013 Frédéric Massart
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class tool_bulkenrol_base_form extends moodleform {

    /**
     * Empty definition.
     *
     * @return void
     */
    public function definition() {
    }

    /**
     * Adds the import settings part.
     *
     * @return void
     */
    public function add_import_options() {
        $mform = $this->_form;

        // Upload settings and file.
        $mform->addElement('header', 'importoptionshdr', get_string('importoptions', 'tool_bulkenrol'));
        $mform->setExpanded('importoptionshdr', true);

        $choices = array(
            tool_bulkenrol_processor::MODE_USER_EMAIL => get_string('useremail', 'tool_bulkenrol'),
            tool_bulkenrol_processor::MODE_USER_USERNAME => get_string('userusername', 'tool_bulkenrol'),
            tool_bulkenrol_processor::MODE_USER_ID => get_string('userid', 'tool_bulkenrol'),
        );
        $mform->addElement('select', 'options[mode_user]', get_string('resolveuser', 'tool_bulkenrol'), $choices);
        $mform->addHelpButton('options[mode_user]', 'resolveuser', 'tool_bulkenrol');



        $choices = array(
            tool_bulkenrol_processor::MODE_COURSE_SHORTNAME => get_string('courseshortname', 'tool_bulkenrol'),
            tool_bulkenrol_processor::MODE_COURSE_IDNUMBER => get_string('courseidnumber', 'tool_bulkenrol'),
            tool_bulkenrol_processor::MODE_COURSE_ID => get_string('courseid', 'tool_bulkenrol'),
        );
        $mform->addElement('select', 'options[mode_course]', get_string('resolvecourse', 'tool_bulkenrol'), $choices);
        $mform->addHelpButton('options[mode_course]', 'resolvecourse', 'tool_bulkenrol');



        $choices = array(
            tool_bulkenrol_processor::MODE_ROLE_SHORTNAME => get_string('roleshortname', 'tool_bulkenrol'),
            tool_bulkenrol_processor::MODE_ROLE_ID => get_string('roleid', 'tool_bulkenrol'),
        );
        $mform->addElement('select', 'options[mode_role]', get_string('resolverole', 'tool_bulkenrol'), $choices);
        $mform->addHelpButton('options[mode_role]', 'resolverole', 'tool_bulkenrol');
    }

}
