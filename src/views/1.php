<?php 

include_once "bootstrap.php";

use AppBundle\Entity\Continent;
use AppBundle\Entity\Group;
use Doctrine\Common\Util\Debug;

// Helper functions
function redirect_to_root(){
    header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
}

// Delete 
if(isset($_GET['delete'])){
    $continent = $entityManager->find('AppBundle\Entity\Continent', $_GET['delete']);
    $entityManager->remove($continent);
    $entityManager->flush();
    redirect_to_root();
}
// Add new
if(isset($_GET['contin'])){
    $continent = new Continent();
    $continent->setName($_GET['contin']);
     
    $entityManager->persist($continent);
    $entityManager->flush();
    redirect_to_root();
}

print("<pre>All Continents: " . "<br>");
$continents = $entityManager->getRepository('AppBundle\Entity\Continent')->findAll();
// print("<table id='table'>");

print ("<table id='table'>
  <thead>
    <td>ID.</td>
    <td>Continent</td>
    <td>Edit</td>
    <td>Delete</td>
   
  </thead>");
foreach($continents as $p)
    print("<tr>" 
            . "<td>" . $p->getId()  . "</td>" 
            . "<td>" . $p->getName() . "</td>" 
            . "<td><a href=\"?delete={$p->getId()}\">DELETE</a></td>" 
            . "<td><a href=\"?updatable={$p->getId()}\">UPDATE</a></td>"
        . "</tr>");
print("</table>"); 
print("</pre><hr>");

// Update
if(isset($_POST['update_name'])){
    $user = $entityManager->find('AppBundle\Entity\Continent', $_POST['update_id']);
    $user->setName($_POST['update_name']);
    $entityManager->flush();
    redirect_to_root();
}

if(isset($_GET['updatable'])){
    $continent = $entityManager->find('AppBundle\Entity\Continent', $_GET['updatable']);
    print("<pre>Update Continent: </pre>");
    print("
        <form action=\"\" method=\"POST\">
            <input type=\"hidden\" name=\"update_id\" value=\"{$continent->getId()}\">
            <label for=\"name\">Product name: </label><br>
            <input type=\"text\" name=\"update_name\" value=\"{$continent->getName()}\"><br>
            <input type=\"submit\" value=\"Submit\">
        </form>
    ");
    print("<hr>");
}











?>
 <form action="" method="GET">
   <label for="contin">Add new Continent: </label><br>
   <input type="text" name="contin" value=""><br>
   <input type="submit" value="Submit">
 </form> 

 <br>

<div id="button">
    <button onclick="location.href='index'" id="button">Go back to Index</button>
</div>

