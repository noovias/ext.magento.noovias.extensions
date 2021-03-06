<?php
/**
 * Noovias_Extensions_Model_Config_ExecuteExtensionss
 *  *
 * NOTICE OF LICENSE
 *
 * Noovias_Extensions is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Noovias_Extensions is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Noovias_Extensions. If not, see <http://www.gnu.org/licenses/>.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Noovias_Extensions to newer
 * versions in the future. If you wish to customize Noovias_Extensions for your
 * needs please refer to http://www.noovias.com for more information.
 *
 * @category       Noovias
 * @package        Noovias_Extensions
 * @copyright      Copyright (c) 2010 <info@noovias.com> - noovias.com
 * @license        <http://www.gnu.org/licenses/>
 *                 GNU General Public License (GPL 3)
 * @link           http://www.noovias.com
 */

/**
 * @category       Noovias
 * @package        Noovias_Extensions
 * @copyright      Copyright (c) 2010 <info@noovias.com> - noovias.com
 * @license        http://opensource.org/licenses/osl-3.0.php
 *                 Open Software License (OSL 3.0)
 * @author         noovias.com - Core Team <info@noovias.com>
 */
interface Noovias_Extensions_Model_Config_Email_Interface
{
    /**
     * @return bool
     * @abstract
     */
    public function isEnabled();

    /**
     * Get Email Recipient "To"
     * @abstract
     * @return array
     */
    public function getTo();

    /**
     * Get Email copy recipients "Copy To"
     * Separated by ","
     * @abstract
     * @return string
     */
    public function getCopyTo();

    /**
     * Get Email sender "From
     *
     * @abstract
     * @return array
     */
    public function getFrom();

    /**
     * Get Email Template Id
     * database id of email template
     * OR
     * Email Template string
     * e.g. "namespace_module_email_template", as defined in config.xml
     *
     * @abstract
     * @return string
     */
    public function getTemplate();

    /**
     * Log file name, e.g. 'mail.log'
     * @abstract
     */
    public function getLogFileName();
}