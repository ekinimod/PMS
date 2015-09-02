<?php

namespace Domi\Bundle\DocuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Document
 *
 * @ORM\Table(name="Document")
 * @ORM\Entity(repositoryClass="Domi\Bundle\DocuBundle\Entity\DocumentRepository")
 */
class Document
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @var string $titre
     * @Assert\NotBlank(message="Le Titre ne peut pas être vide !")
     * @Assert\Length(
     *      min = "3",
     *      minMessage = "Le titre doit avoir au moins {{ limit }} caractères !"
     * )
     * @ORM\Column(name="titre", type="string", length=50)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="soustitre", type="string", length=50)
     */
    private $soustitre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var integer $note
     * @ORM\Column(name="note", type="decimal", nullable=true)
     * @Assert\NotBlank(message="Le Titre ne peut pas être vide !")
     * @Assert\Range(
     *      min = "2",
     *      minMessage = "La note doit être superieur ou égale à {{ limit }} !",
     *      max = "7",
     *      maxMessage = "La note doit être inferieur ou égale à {{ limit }} !"
     * )
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var \Domi\Bundle\DocuBundle\Entity\Document
     *
     * @ORM\ManyToOne(targetEntity="Domi\Bundle\DocuBundle\Entity\Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doc_pere", referencedColumnName="id")
     * })
     */
    private $docPere;

    /**
     * @var \Domi\Bundle\DocuBundle\Entity\Document
     *
     * @ORM\ManyToOne(targetEntity="Domi\Bundle\DocuBundle\Entity\Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doc_precedent", referencedColumnName="id")
     * })
     */
    private $docPrecedent;

    /**
     * @var \Domi\Bundle\DocuBundle\Entity\Document
     *
     * @ORM\ManyToOne(targetEntity="Domi\Bundle\DocuBundle\Entity\Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="doc_suivant", referencedColumnName="id")
     * })
     */
    private $docSuivant;


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
     * Set titre
     *
     * @param string $titre
     * @return Document
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set soustitre
     *
     * @param string $soustitre
     * @return Document
     */
    public function setSoustitre($soustitre)
    {
        $this->soustitre = $soustitre;

        return $this;
    }

    /**
     * Get soustitre
     *
     * @return string
     */
    public function getSoustitre()
    {
        return $this->soustitre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Document
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Document
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set docPere
     *
     * @param integer $docPere
     * @return Document
     */
    public function setDocPere($docPere)
    {
        $this->docPere = $docPere;

        return $this;
    }

    /**
     * Get docPere
     *
     * @return integer
     */
    public function getDocPere()
    {
        return $this->docPere;
    }

    /**
     * Set docPrecedent
     *
     * @param integer $docPrecedent
     * @return Document
     */
    public function setDocPrecedent($docPrecedent)
    {
        $this->docPrecedent = $docPrecedent;

        return $this;
    }

    /**
     * Get docPrecedent
     *
     * @return integer
     */
    public function getDocPrecedent()
    {
        return $this->docPrecedent;
    }

    /**
     * Set docSuivant
     *
     * @param integer $docSuivant
     * @return Document
     */
    public function setDocSuivant($docSuivant)
    {
        $this->docSuivant = $docSuivant;

        return $this;
    }

    /**
     * Get docSuivant
     *
     * @return integer
     */
    public function getDocSuivant()
    {
        return $this->docSuivant;
    }
}
