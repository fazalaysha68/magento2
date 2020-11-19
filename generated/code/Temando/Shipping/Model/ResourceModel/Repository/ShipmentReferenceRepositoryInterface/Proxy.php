<?php
namespace Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface;

/**
 * Proxy class for @see \Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface
 */
class Proxy implements \Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface, \Magento\Framework\ObjectManager\NoninterceptableInterface
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Proxied instance name
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Proxied instance
     *
     * @var \Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface
     */
    protected $_subject = null;

    /**
     * Instance shareability flag
     *
     * @var bool
     */
    protected $_isShared = null;

    /**
     * Proxy constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     * @param bool $shared
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Temando\\Shipping\\Model\\ResourceModel\\Repository\\ShipmentReferenceRepositoryInterface', $shared = true)
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
        $this->_isShared = $shared;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['_subject', '_isShared', '_instanceName'];
    }

    /**
     * Retrieve ObjectManager from global scope
     */
    public function __wakeup()
    {
        $this->_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    }

    /**
     * Clone proxied instance
     */
    public function __clone()
    {
        $this->_subject = clone $this->_getSubject();
    }

    /**
     * Get proxied instance
     *
     * @return \Temando\Shipping\Model\ResourceModel\Repository\ShipmentReferenceRepositoryInterface
     */
    protected function _getSubject()
    {
        if (!$this->_subject) {
            $this->_subject = true === $this->_isShared
                ? $this->_objectManager->get($this->_instanceName)
                : $this->_objectManager->create($this->_instanceName);
        }
        return $this->_subject;
    }

    /**
     * {@inheritdoc}
     */
    public function getShipmentTrack($trackingNumber, $carrierCode)
    {
        return $this->_getSubject()->getShipmentTrack($trackingNumber, $carrierCode);
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Temando\Shipping\Api\Data\Shipment\ShipmentReferenceInterface $shipment)
    {
        return $this->_getSubject()->save($shipment);
    }

    /**
     * {@inheritdoc}
     */
    public function getById($entityId)
    {
        return $this->_getSubject()->getById($entityId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByShipmentId($shipmentId)
    {
        return $this->_getSubject()->getByShipmentId($shipmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByExtShipmentId($extShipmentId)
    {
        return $this->_getSubject()->getByExtShipmentId($extShipmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getByExtReturnShipmentId($extShipmentId)
    {
        return $this->_getSubject()->getByExtReturnShipmentId($extShipmentId);
    }

    /**
     * {@inheritdoc}
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        return $this->_getSubject()->getList($searchCriteria);
    }
}
