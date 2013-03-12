<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * Noovias_Extensions is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Noovias_Extensions is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
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
 * @category       Noovias
 * @package        Noovias_Extensions
 * @subpackage
 * @copyright      Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @author         Alexander Dite <info@noovias.com>
 * @license        <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link           http://www.noovias.com
 */

/**
 * @category       Noovias
 * @package        Noovias_Extensions
 * @subpackage
 * @copyright      Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license        <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link           http://www.noovias.com
 */

class Noovias_Extensions_Helper_Database extends Mage_Core_Helper_Abstract
{
    /**
     * Retrieve Magento version
     *
     * @return string
     */
    public function getMagentoVersion()
    {
        return Mage::getVersion();
    }

    /**
     * Retrieve Magento edition
     *
     * @return string
     */
    public function getMagentoEdition()
    {
        if (method_exists('Mage', 'getEdition')) {
            // getEdition is only available after Magento CE Version 1.7.0.0
            $edition = Mage::getEdition();
            switch ($edition) {
                case Mage::EDITION_COMMUNITY :
                    $edition = 'CE';
                    break;
                case Mage::EDITION_ENTERPRISE :
                    $edition = 'EE';
                    break;
                case Mage::EDITION_PROFESSIONAL :
                    $edition = 'PE';
                    break;
                case Mage::EDITION_GO :
                    $edition = 'GO';
                    break;
            }
        }
        else {
            // Check for different Licensetypes to get Magento-Edition
            $path = Mage::getBaseDir();
            if (file_exists($path . DS . 'LICENSE_EE.txt')) {
                $edition = 'EE';
            }
            elseif (file_exists($path . DS . 'LICENSE_PRO.html')) {
                $edition = 'PE';
            }
            else {
                $edition = 'CE';
            }
        }
        return $edition;
    }

    /**
     * @return bool
     */
    public function useOldStyleInstaller()
    {
        $magentoEdition = $this->getMagentoEdition();
        $magentoVersion = $this->getMagentoVersion();

        $useOldStyleInstaller = false;
        switch ($magentoEdition) {
            case 'CE' :
                if (version_compare($magentoVersion, '1.6', '<')) {
                    $useOldStyleInstaller = true;
                }
                break;
            case 'EE' : // Intentional fallthrough
            case 'PE' :
            if (version_compare($magentoVersion, '1.11', '<')) {
                $useOldStyleInstaller = true;
            }
                break;
        }

        return $useOldStyleInstaller;
    }
}