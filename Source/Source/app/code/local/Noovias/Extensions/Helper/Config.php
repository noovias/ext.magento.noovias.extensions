<?php
/**
 * Noovias_Extensions_Helper_Config
 *
 * @category   Noovias
 * @package    Noovias_Extensions
 * @author     Noovias Core Team
 */
class Noovias_Extensions_Helper_Config
{
    const PATH_CONFIG_ROOT = 'noovias_extensions';

    /** @var null */
    protected $storeId = null;

    /**
     * @param $path
     * @return Noovias_Extensions_Model_Config_Email
     */
    public function getConfigSendEmailByPath($path)
    {
        /**
         * @var $data array
         */
        $data = Mage::getStoreConfig($path,$this->storeId);

        /** @var $config Noovias_Extensions_Model_Config_Email */
        $config = Mage::getModel('noovias_extensions/config_email', $data);

        return $config;
    }

    /**
     * @param string $path
     * @return mixed
     */
    public function getConfig($path = '')
    {
        if ($path != '')
        {
            $path = '/' . $path;
        }
        $config = Mage::getStoreConfig(self::PATH_CONFIG_ROOT . $path);
        return $config;
    }

    /**
     * @return mixed
     */
    public function getConfigTransactionalEmails()
    {
        $config = Mage::getStoreConfig('trans_email',$this->storeId);

        return $config;
    }

    /**
     * @param null $storeId
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
    }

    /**
     * @return null
     */
    public function getStoreId()
    {
        return $this->storeId;
    }
}
