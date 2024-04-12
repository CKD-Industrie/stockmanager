<?php
/* Copyright (C) 2024 Clément Jaunay	<clj@ckd-industrie.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    htdocs/stockmanager/admin/setup.php
 * \ingroup stockmanager
 * \brief   Setup page of module StockManager.
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER['CONTEXT_DOCUMENT_ROOT'])) {
	$res = @include $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/main.inc.php';
}
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME']; $tmp2 = realpath(__FILE__); $i = strlen($tmp) - 1; $j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) {
	$i--;
	$j--;
}
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1)).'/main.inc.php')) {
	$res = @include substr($tmp, 0, ($i + 1)).'/main.inc.php';
}
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1))).'/main.inc.php')) {
	$res = @include dirname(substr($tmp, 0, ($i + 1))).'/main.inc.php';
}
// Try main.inc.php using relative path
if (!$res && file_exists('../../main.inc.php')) {
	$res = @include '../../main.inc.php';
}
if (!$res && file_exists('../../../main.inc.php')) {
	$res = @include '../../../main.inc.php';
}
if (!$res) {
	die('Include of main fails');
}

global $langs, $user;

// Libraries
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once '../lib/stockmanager.lib.php';
//require_once '../class/myclass.class.php';
// require_once DOL_DOCUMENT_ROOT.'/core/class/html.formadmin.class.php';

// Translations
$langs->loadLangs(array('admin', 'stockmanager@stockmanager'));

// Access control
if (!$user->admin) {
	accessforbidden();
}

if (empty($conf->stockmanager->enabled)) {
	print 'Error: Module is not enabled\n';
	exit;
}


/*
 * Actions
 */

// None


/*
 * View
 */

$help_url = '';
$title = 'StockManagerSetup';

llxHeader('', $langs->trans($title), $help_url, '', 0, 0, '', '', '', 'mod-stockmanager page-admin');

// Subheader
$linkback = '<a href="'.($backtopage ? $backtopage : DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1').'">'.$langs->trans('BackToModuleList').'</a>';

print load_fiche_titre($langs->trans($title), $linkback, 'title_setup');

// Configuration header
$head = stockmanagerAdminPrepareHead();
print dol_get_fiche_head($head, 'settings', $langs->trans($title), -1, 'stockmanager@stockmanager');

// Setup page goes here
print '<span class="opacitymedium">'.$langs->trans('StockManagerSetupPage').'</span><br><br>';


print '<p>'.$langs->trans('NoParam').'</p>';
print '<p>'.$langs->trans('NothingToSetup').'</p>';



// $chantiers = array(0 => 'Chantier 0', 1 => 'Chantier 1', 2 => 'Chantier 2');

// print '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
// print '<input type="hidden" name="token" value="'.$_SESSION['newtoken'].'">';
// print '<input type="text" name="chantier" />';
// print '<button type="submit" disabled>Ajouter</button>';
// print '</form>';

// print '<select name="chantier">';
// foreach($chantiers as $key => $value) {
// 	print '<option value="'.$key.'">'.$value.'</option>';
// }
// print '</select>';

// Page end
print dol_get_fiche_end();
llxFooter();
$db->close();