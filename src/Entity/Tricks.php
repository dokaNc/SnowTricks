<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TricksRepository")
 * @Vich\Uploadable()
 */
class Tricks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePost;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $thumbnail;

    /**
     * @Vich\UploadableField(mapping="tricks_thumbnails", fileNameProperty="thumbnail")
     */
    private $thumbnailFile;

    /**
     * @ORM\OneToMany(targetEntity="Attachment", mappedBy="tricks", cascade={"persist"})
     */
    private $attachments;

    /**
     * @return mixed
     */
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * @param mixed $thumbnailFile
     * @throws \Exception
     */
    public function setThumbnailFile($thumbnailFile): void
    {
        $this->thumbnailFile = $thumbnailFile;
        if ($thumbnailFile) {
            $this->updatedAt = new \DateTime();
        }
    }

    public function __construct()
    {
        $this->datePost = new \DateTime('now');
        $this->updatedAt = new \DateTime();
        $this->attachments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->name);
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->datePost;
    }

    public function setDatePost(\DateTimeInterface $datePost): self
    {
        $this->datePost = $datePost;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Attachment[]
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): self
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments[] = $attachment;
            $attachment->setPost($this);
        }

        return $this;
    }

    public function removeAttachment(Attachment $attachment): self
    {
        if ($this->attachments->contains($attachment)) {
            $this->attachments->removeElement($attachment);
            // set the owning side to null (unless already changed)
            if ($attachment->getPost() === $this) {
                $attachment->setPost(null);
            }
        }

        return $this;
    }
}
