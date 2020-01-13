<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 *
 * @UniqueEntity( fields={"name"}, errorPath="team", message="One team can play only 1 league")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="strip", type="string", length=255)
     */
    private $strip;

  /**
   * @ORM\ManyToOne(targetEntity="League", inversedBy="teams")
   * @ORM\JoinColumn(name="league_id", referencedColumnName="id")
   */
  protected $league;

  /**
   * @return League|null
   */
  public function getLeague(): ?League
  {
    return $this->league;
  }

  /**
   * @param League|null $league
   * @return $this
   */
  public function setLeague(?League $league): self
  {
    $this->league = $league;

    return $this;
  }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set strip
     *
     * @param string $strip
     *
     * @return Team
     */
    public function setStrip($strip)
    {
        $this->strip = $strip;

        return $this;
    }

    /**
     * Get strip
     *
     * @return string
     */
    public function getStrip()
    {
        return $this->strip;
    }
}

