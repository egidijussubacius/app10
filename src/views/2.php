<?php

use AppBundle\Entity\Continent;
use AppBundle\Entity\Country;
use AppBundle\Entity\User;
use Doctrine\Common\Util\Debug;

include_once "bootstrap.php";

// Delete 
if(isset($_GET['delete'])){
    $continent = $entityManager->find('AppBundle\Entity\Country', $_GET['delete']);
    $entityManager->remove($continent);
    $entityManager->flush();
    redirect_to_root();
}

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

if(isset($_GET['country1'])){
$country = new Country();
$country->setName($_GET['country2']);
 
$continent = new Continent();
$continent->setName($_GET['country1']);
 
$country->setContinent($continent);
$continent->addCountry($country);
 
// You can use both of them at same time but using one over another is more logical as cascade={"persist"} will handle it for us.
$entityManager->persist($continent);
$entityManager->persist($country);
//
 
$entityManager->flush();
redirect_to_root();
}



print("<pre>All Country by Continents: " . "<br>");
$products2 = $entityManager->getRepository('AppBundle\Entity\Country')->findAll();
print ("<table id='table'>
  <thead>
    <td>ID.</td>
    <td>Continent</td>
    <td>Country</td>
    <td>Edit Country Name</td>
   
  </thead>");

foreach($products2 as $p2)
    print("<tr>" 
            . "<td>" . $p2->getId() . "</td>" 
           
            . "<td>" . $p2->getContinent()  . "</td>" 
            . "<td>" . $p2->getName()  . "</td>" 
            // . "<td>" . $p2->getCountries()  . "</td>" 
            // . "<td>" .  print($p2->getContinent())  . "</td>" 
            // . "<td><a href=\"?delete={$p2->getId()}\">DELETE</a></td>" 
            . "<td><a href=\"?updatable2={$p2->getId()}\">UPDATE Country</a></td>"
            // . "<td><a href=\"?updatable3={$p2->getId()}\">UPDATE Continent</a>♻️</td>"
        . "</tr>");

       
print("</table>"); 
print("</pre><hr>");

// Update
if(isset($_POST['update_name'])){
    $user2 = $entityManager->find('AppBundle\Entity\Country', $_POST['update_id']);
    $user2->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}

if(isset($_GET['updatable2'])){
    $product2 = $entityManager->find('AppBundle\Entity\Country', $_GET['updatable2']);
    print("<pre>Update Continent: </pre>");
    print("
        <form action=\"\" method=\"POST\">
            <input type=\"hidden\" name=\"update_id\" value=\"{$product2->getId()}\">
            <label for=\"name\">Product name: </label><br>
            <input type=\"text\" name=\"update_name\" value=\"{$product2->getName()}\"><br><br>
            <input type=\"submit\" value=\"Submit\">
        </form>
    ");
    print("<hr>");
}


// // Update2
// if(isset($_POST['update_name2'])){
//     $user33 = $entityManager->find('AppBundle\Entity\Country', $_POST['update_id2']);
//     $user33->setContinent($_POST['update_name2']);
//     $entityManager->flush();
//     redirect_to_root();
// }

// if(isset($_GET['updatable3'])){
//     $product3 = $entityManager->find('AppBundle\Entity\Country', $_GET['updatable3']);
//     print("<pre>Update Continent: </pre>");
//     print("
//         <form action=\"\" method=\"POST\">
//             <input type=\"hidden\" name=\"update_id2\" value=\"{$product3->getId()}\">
//             <label for=\"name\">Product name: </label><br>
//             <input type=\"text\" name=\"update_name2\" value=\"{$product3->getContinent()}\"><br><br>
//             <input type=\"submit\" value=\"Submit\">
//         </form>
//     ");
//     print("<hr>");
// }


?>
 <form action="" method="GET" name="country1">
   <label for="country1">Add new Country: </label><br>
   <input type="text" name="country2" value=""><br> <br>
   <label for="country1">Add new Continent: </label><br>
   <input type="text" name="country1" value=""><br>
   <input type="submit" value="Submit">
 </form> 

 <br>

<div id="button">
    <button onclick="location.href='index'" id="button">Go back to Index</button>
</div>

