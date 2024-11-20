<?php

namespace App\Entity;

use App\Repository\CarouselRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CarouselRepository::class)]
#[Vich\Uploadable()]
class Carousel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Image = null;

    #[Vich\UploadableField(mapping : "carousel", fileNameProperty : "Image")]
    private ?File $FileImage = null;

    #[ORM\Column(length: 255)]
    private ?string $Mot = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): static
    {
        $this->Image = $Image;

        return $this;
    } 

    public function getFileImage(): ?File
    { 
        return $this->FileImage;
    }

    public function setFileImage(?File $ImageFile): static
    {
        $this->FileImage = $ImageFile;

        return $this;
    }

    public function getMot(): ?string
    {
        return $this->Mot;
    }

    public function setMot(string $Mot): static
    {
        $this->Mot = $Mot;

        return $this;
    }
}
