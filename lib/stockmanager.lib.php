<?php
/* Copyright (C) 2024 Clément Jaunay	<clj@ckd-industrie.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    htdocs/stockmanager/lib/stockmanager.lib.php
 * \ingroup stockmanager
 * \brief   Library files with common functions for StockManager
 */

/**
 * Prepare admin pages header
 *
 * @return array
 */
function stockmanagerAdminPrepareHead() {
	global $langs, $conf;

	// global $db;
	// $extrafields = new ExtraFields($db);
	// $extrafields->fetch_name_optionals_label('myobject');

	$langs->load('stockmanager@stockmanager');

	$h = 0;
	$head = array();

	$head[$h][0] = dol_buildpath('/stockmanager/admin/setup.php', 1);
	$head[$h][1] = $langs->trans('SettingsTab');
	$head[$h][2] = 'settings';
	$h++;

	/*
	$head[$h][0] = dol_buildpath('/stockmanager/admin/myobject_extrafields.php', 1);
	$head[$h][1] = $langs->trans('ExtraFields');
	$nbExtrafields = is_countable($extrafields->attributes['myobject']['label']) ? count($extrafields->attributes['myobject']['label']) : 0;
	if ($nbExtrafields > 0) {
		$head[$h][1] .= ' <span class='badge'>' . $nbExtrafields . '</span>';
	}
	$head[$h][2] = 'myobject_extrafields';
	$h++;
	*/

	$head[$h][0] = dol_buildpath('/stockmanager/admin/about.php', 1);
	$head[$h][1] = $langs->trans('AboutTab');
	$head[$h][2] = 'about';
	$h++;

	// Show more tabs from modules
	// Entries must be declared in modules descriptor with line
	
	//$this->tabs = array(
	//	'entity:+tabname:Title:@stockmanager:/stockmanager/mypage.php?id=__ID__'
	//); // to add new tab

	//$this->tabs = array(
	//	'entity:-tabname:Title:@stockmanager:/stockmanager/mypage.php?id=__ID__'
	//); // to remove a tab

	complete_head_from_modules($conf, $langs, null, $head, $h, 'stockmanager@stockmanager');

	complete_head_from_modules($conf, $langs, null, $head, $h, 'stockmanager@stockmanager', 'remove');

	return $head;
}