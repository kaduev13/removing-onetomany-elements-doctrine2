<?php
/**
 * Created by IntelliJ IDEA.
 * User: dev
 * Date: 27.08.15
 * Time: 9:11
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="itineraries")
 */
class Itinerary
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ItineraryVenue", mappedBy="itinerary", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $itineraryVenues;

    public function __construct()
    {
        $this->itineraryVenues = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add itineraryVenues
     *
     * @param \AppBundle\Entity\ItineraryVenue $itineraryVenue
     * @return Itinerary
     */
    public function addItineraryVenue(\AppBundle\Entity\ItineraryVenue $itineraryVenue)
    {
        $itineraryVenue->setItinerary($this);
        $this->itineraryVenues[] = $itineraryVenue;

        return $this;
    }

    /**
     * Remove itineraryVenues
     *
     * @param \AppBundle\Entity\ItineraryVenue $itineraryVenue
     */
    public function removeItineraryVenue(\AppBundle\Entity\ItineraryVenue $itineraryVenue)
    {
        $itineraryVenue->setItinerary(null);
        $this->itineraryVenues->removeElement($itineraryVenue);
    }

    /**
     * Get itineraryVenues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItineraryVenues()
    {
        return $this->itineraryVenues;
    }
}
