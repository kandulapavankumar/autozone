<?php

namespace Game\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{

    public function indexAction()
    {

    }

    public function buyerHomeAction()
    {
        $vehicleType = $this->params()->fromPost('select_vehical');
        $keyword = $this->params()->fromPost('keyword_search');
        $maximumPrice = $this->params()->fromPost('high_range_search');
        $minimumPrice = $this->params()->fromPost('low_range_search');

        if (isset($vehicleType) || isset($keyword) || isset($maximumPrice) || isset($minimumPrice)) {
            $results = $this->getTable('Listings')->search($vehicleType, $keyword, $maximumPrice, $minimumPrice);
        } else {
            $results = $this->getTable('Listings')->getAll();
        }

        $names = $this->getTable('VehicleTypes')->getAllNames();

        return new ViewModel(array('vehicleTypes' => $names, 'search_results' => $results));
    }

    public function listingAction()
    {
        $id = $this->params()->fromQuery('id');

        $listing = $this->getTable('Listings')->getListing($id);
        $reviews = $this->getTable('SellerReviews')->getReviewsByListingId($id);

        $message = $this->params()->fromPost('message');

        if (isset($message) && $message != "") {
            $sellerEmail = $this->getTable('Listings')->getUserEmailByListingId($id);
            try {
                $subject = "Enquiry";
                $this->sendMail($sellerEmail, $message, $subject);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

        return new ViewModel(array('listing' => $listing, 'reviews' => $reviews));
    }

    public function sellerHomeAction()
    {

        return new ViewModel();
    }

}
