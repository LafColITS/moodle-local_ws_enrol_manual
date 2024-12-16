# Manual enrolment web service function

![Moodle Plugin CI](https://github.com/LafColITS/moodle-local_ws_enrol_manual/workflows/Moodle%20Plugin%20CI/badge.svg)

This local module provides a web service for adding a manual enrolment instance to a Moodle course.

## Configuration

The plugin creates a web service named ManualEnrollment, which is disabled by default. Enable it and assign a user with sufficient permissions. The only required capability is `enrol/manual:config`.

## Requirements

- Moodle 4.1 (build 2022112800 or later)

## Installation

Copy the ws_enrol_manual folder into your /local directory and visit your Admin Notification page to complete the installation.

## Author

Charles Fulton (fultonc@lafayette.edu)