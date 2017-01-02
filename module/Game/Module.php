<?php

namespace Game;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {

        return array(
            'factories' => array(
                        
                'BaseController' => function($sm) {
                    $table = new Controller\BaseController();

                    return $table;
                },
                'IndexController' => function($sm) {
                    $table = new Controller\IndexController();

                    return $table;
                },      
                'Zend\Log' => function ($sm) {
                    $log = new Logger();
                    $writer = new Stream('data/logs/logfile');
                    $log->addWriter($writer);

                    return $log;
                },

                'Game\Model\UsersTable' =>  function($sm) {
                    $tableGateway = $sm->get('UsersTableGateway');
                    $table = new Model\UsersTable($tableGateway, $sm);

                    return $table;
                },

                'UsersTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Users());

                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },

                'Game\Model\ListingsTable' =>  function($sm) {
                    $tableGateway = $sm->get('ListingsTableGateway');
                    $table = new Model\ListingsTable($tableGateway, $sm);

                    return $table;
                },

                'ListingsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Listings());

                    return new TableGateway('listings', $dbAdapter, null, $resultSetPrototype);
                },

                'Game\Model\ListingMetadataTable' =>  function($sm) {
                    $tableGateway = $sm->get('ListingMetadataTableGateway');
                    $table = new Model\ListingMetadataTable($tableGateway, $sm);

                    return $table;
                },

                'ListingMetadataTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\ListingMetadata());

                    return new TableGateway('listing_metadata', $dbAdapter, null, $resultSetPrototype);
                },

                'Game\Model\ListingPhotosTable' =>  function($sm) {
                    $tableGateway = $sm->get('ListingPhotosTableGateway');
                    $table = new Model\ListingPhotosTable($tableGateway, $sm);

                    return $table;
                },

                'ListingPhotosTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\ListingPhotos());

                    return new TableGateway('listing_photos', $dbAdapter, null, $resultSetPrototype);
                },

                'Game\Model\SellerReviewsTable' =>  function($sm) {
                    $tableGateway = $sm->get('SellerReviewsTableGateway');
                    $table = new Model\SellerReviewsTable($tableGateway, $sm);

                    return $table;
                },

                'SellerReviewsTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\SellerReviews());

                    return new TableGateway('seller_reviews', $dbAdapter, null, $resultSetPrototype);
                },
                'Game\Model\VehicleTypesTable' =>  function($sm) {
                    $tableGateway = $sm->get('VehicleTypesTableGateway');
                    $table = new Model\VehicleTypesTable($tableGateway, $sm);

                    return $table;
                },

                'VehicleTypesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\VehicleTypes());

                    return new TableGateway('vehicle_types', $dbAdapter, null, $resultSetPrototype);
                },

            ),
        );
    }

    private function setupLayout($e)
    {
        $sharedEvents = $e->getApplication()->getEventManager()->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {

        }, 100);
    }
    
}
