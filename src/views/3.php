<?php

use AppBundle\Entity\Continent;
use AppBundle\Entity\Country;

use Doctrine\Common\Util\Debug;

include_once "bootstrap.php";

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

/** @var Continent $continent */
$continent = $entityManager->getRepository(Continent::class)->find(1);
 
$country = new Country();
$country->setName('Gana142');
$country->setContinent($continent);
 
// You can use both of them at same time but using one over another is more logical as cascade={"persist"} will handle it for us.
$continent->addCountry($country);
$entityManager->persist($country);
//
 
$entityManager->flush();


