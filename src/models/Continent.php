<?php

declare(strict_types=1);
 
namespace AppBundle\Entity;
 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="continent")
 */
class Continent
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
     * @ORM\OneToMany(targetEntity="Country", mappedBy="continent", cascade={"persist", "remove"})
     */
    private $countries;
 
    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }
 
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
 
    public function addCountry(Country $country): self
    {
        $this->countries[] = $country;
 
        return $this;
    }
 
    public function removeCountry(Country $country): bool
    {
        return $this->countries->removeElement($country);
    }
 
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function __toString()
    {
       return strval( $this->getName() );
    }
}