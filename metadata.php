<?php
/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   main
 * @copyright (C) OXID eSales AG 2003-2012
 * @version OXID eShop CE
 * @version   SVN: $Id: theme.php 25466 2010-02-01 14:12:07Z alfonsas $
 */

/**
 * Module information
 */
$aModule = array(
    'id'           => 'modovoucher',
    'title'        => 'ModoMoto Credit Voucher',
    'description'  => '',
    'thumbnail'    => '',
    'version'      => '0.1',
    'author'       => 'mafi',
    'extend'       => array(
        'oxvoucher' => 'modovoucher/core/modooxvoucher'
    ),
    'files'		 => array(
    ),
    'settings' => array(
    ),
    'blocks' => array(
        array('template' => 'voucherserie_main.tpl', 'block' => 'admin_voucherserie_main_form', 'file' => 'modovoucherseries.tpl')
    )

);