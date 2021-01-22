<?php
/*

$LastChangedDate: 2016-01-08 05:48:30 -0400 (Fri, 08 Jan 2016) $
$Rev: 2589 $
$Author: maborak $
$Id: config.php 2589 2016-01-08 09:48:30Z maborak $
$HeadURL: svn://source.maborak.com/dev/interspire/email.marketer/addons/installer/config/config.php $

+--------------------------------------------------------------------------------
|   Addons: Installer
|   Copyright (C) 2012 Maborak Technologies <maborak@maborak.com>
+--------------------------------------------------------------------------------

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/
define("INSTALLER_INSTALL_SCHEMA_PATCH",false);  //If its true, the installer will take: installer.schema.IEMVERSION_patch.php
define("ADDONS_DEBUG",true);
define("ADDONS_PROCESSES_TIME",3600);
define("ADDONS_MAX_LIFE_PROCESSES_TIME",3600); //in seconds
define("ADDONS_SMTP_DEBUG",true);
define("MT_DEBUG_APPLICATION", true);
define("MT_DEBUG_API_APPLICATION", true);

error_reporting(E_ALL);
ini_set("display_errors", 1);
