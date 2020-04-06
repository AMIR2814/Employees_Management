<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoryRepository")
 */
class History
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="histories")
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="histories")
     */
    private $base;

    /**
     * @ORM\Column(type="date")
     */
    private $baseDate;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $noticeNo;

    /**
     * @ORM\Column(type="date")
     */
    private $noticeDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted=false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    public function getBase(): ?Base
    {
        return $this->base;
    }

    public function setBase(?Base $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getBaseDate(): ?\DateTimeInterface
    {
        return $this->baseDate;
    }

    public function setBaseDate(\DateTimeInterface $baseDate): self
    {
        $this->baseDate = $baseDate;

        return $this;
    }

    public function getNoticeNo(): ?string
    {
        return $this->noticeNo;
    }

    public function setNoticeNo(string $noticeNo): self
    {
        $this->noticeNo = $noticeNo;

        return $this;
    }

    public function getNoticeDate(): ?\DateTimeInterface
    {
        return $this->noticeDate;
    }

    public function setNoticeDate(\DateTimeInterface $noticeDate): self
    {
        $this->noticeDate = $noticeDate;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }
}
