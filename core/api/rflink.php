<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */
 require_once dirname(__FILE__) . "/../../../../core/php/core.inc.php";

 if (!jeedom::apiAccess(init('apikey'), 'rflink')) {
 	echo __('Clef API non valide, vous n\'êtes pas autorisé à effectuer cette action (rflink)', __FILE__);
 	die();
 }

 $messageType = init('messagetype');
 $json = file_get_contents('php://input');
 switch ($messageType) {
   case 'saveValue' : rflink::saveValue($json); break;
   case 'saveGateway' : rflink::saveGateway(init('status')); break;
 }

 return true;

?>
