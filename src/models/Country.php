<?php
declare(strict_types=1);
 
namespace AppBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 
    /**
     * @ORM\Column(name="name", type="string", length=13, nullable=false)
     */
    private $name;
 
    /**
     * @ORM\ManyToOne(targetEntity="Continent", inversedBy="countries", cascade={"persist"})
     * @ORM\JoinColumn(name="continent_id", referencedColumnName="id", nullable=false)
     */
    private $continent;
 
    public function getId(): int
    {
        return $this->id;
    }
 
    public function setName(string $name): self
    {
        $this->name = $name;
 
        return $this;
    }
 
    public function getName(): string
    {
        return $this->name;
    }
 
    public function setContinent(Continent $continent): self
    {
        $this->continent = $continent;
 
        return $this;
    }
 
    public function getContinent(): Continent
    {
        return $this->continent;
    }

    public function __toString()
    {
       return strval( $this->getName() );
    }
 
}


        // public function __toString()
        // {
        //    return strval( $this->getContinent() );
        // }
     
     
