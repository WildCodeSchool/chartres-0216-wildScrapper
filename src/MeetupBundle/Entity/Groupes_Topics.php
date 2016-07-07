<?php

namespace MeetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupes_Topics
 *
 * @ORM\Table(name="groupes__topics")
 * @ORM\Entity(repositoryClass="MeetupBundle\Repository\Groupes_TopicsRepository")
 */
class Groupes_Topics
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
     * @var int
     *
     * @ORM\Column(name="id_groupes", type="integer")
     * @ORM\OneToOne(targetEntity="Groupes", inversedBy="Groupes_Topics", cascade={"persist", "merge", "remove"}))
     * @ORM\JoinColumn(name="Groupe_idGroupes", referencedColumnName="idGroupes")
     */
    private $idGroupes;

    /**
     * @var int
     *
     * @ORM\Column(name="id_topics", type="integer")
     */
    private $idTopics;


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
     * Set idGroupes
     *
     * @param integer $idGroupes
     *
     * @return Groupes_Topics
     */
    public function setIdGroupes($idGroupes)
    {
        $this->idGroupes = $idGroupes;

        return $this;
    }

    /**
     * Get idGroupes
     *
     * @return integer
     */
    public function getIdGroupes()
    {
        return $this->idGroupes;
    }

    /**
     * Set idTopics
     *
     * @param integer $idTopics
     *
     * @return Groupes_Topics
     */
    public function setIdTopics($idTopics)
    {
        $this->idTopics = $idTopics;

        return $this;
    }

    /**
     * Get idTopics
     *
     * @return integer
     */
    public function getIdTopics()
    {
        return $this->idTopics;
    }
}
