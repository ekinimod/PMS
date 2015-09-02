<?php

namespace Domi\Bundle\AdresseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//@Formatter off
/**
 * Departement
 *
 * @ORM\Table(name="departement",
 *                  indexes={
 *                     @ORM\Index(name="slug", columns={"slug"}),
 *                     @ORM\Index(name="code", columns={"code"}),
 *                     @ORM\Index(name="nom_soundex", columns={"nom_soundex"})
 *                           },
 *                   options={"comment":"Les départements"})
 * *                    )
 * @ORM\Entity
 */
//@Formatter off
class Departement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false,options={"comment":"identifiant unique"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=true,options={"comment":"code du département"})
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true,options={"comment":"nom du département"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_uppercase", type="string", length=255, nullable=true,options={"comment":"nom du département en majuscule"})
     */
    private $nomUppercase;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true,options={"comment":"slug"})
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_soundex", type="string", length=20, nullable=true,options={"comment":"code phonétique Soundex"})
     */
    private $nomSoundex;



}
