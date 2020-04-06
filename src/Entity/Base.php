<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseRepository")
 */
class Base
{

    const BASE_ORG          ="organization";
    const BASE_BULIDING     ="buliding";
    const BASE_SALLARY_ORG  ="sallaryOrg";
    const BASE_CONTRACT_TYPE="contractType";
    const BASE_UNIT         ="unit";
    const BASE_ARCHIVE_DOC  ="archive";
    const BASE_UNIT_CATEGORY="unitCategoy";
    const BASE_POST         ="post";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $category;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parentId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $notShow=false;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="org")
     */
    private $orgs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="sallaryOrg")
     */
    private $salaries;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="building")
     */
    private $buildings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="contractType")
     */
    private $contracts;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="unit")
     */
    private $units;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="archiveFileOrg")
     */
    private $archives;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employee", mappedBy="unitCategory")
     */
    private $unitCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\History", mappedBy="base")
     */
    private $histories;

    public function __construct()
    {
        $this->orgs = new ArrayCollection();
        $this->salaries = new ArrayCollection();
        $this->buildings = new ArrayCollection();
        $this->contracts = new ArrayCollection();
        $this->units = new ArrayCollection();
        $this->archives = new ArrayCollection();
        $this->unitCategories = new ArrayCollection();
        $this->histories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNotShow(): ?bool
    {
        return $this->notShow;
    }

    public function setNotShow(bool $notShow): self
    {
        $this->notShow = $notShow;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getOrgs(): Collection
    {
        return $this->orgs;
    }

    public function addOrg(Employee $org): self
    {
        if (!$this->orgs->contains($org)) {
            $this->orgs[] = $org;
            $org->setOrg($this);
        }

        return $this;
    }

    public function removeOrg(Employee $org): self
    {
        if ($this->orgs->contains($org)) {
            $this->orgs->removeElement($org);
            // set the owning side to null (unless already changed)
            if ($org->getOrg() === $this) {
                $org->setOrg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalary(Employee $salary): self
    {
        if (!$this->salaries->contains($salary)) {
            $this->salaries[] = $salary;
            $salary->setSallaryOrg($this);
        }

        return $this;
    }

    public function removeSalary(Employee $salary): self
    {
        if ($this->salaries->contains($salary)) {
            $this->salaries->removeElement($salary);
            // set the owning side to null (unless already changed)
            if ($salary->getSallaryOrg() === $this) {
                $salary->setSallaryOrg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getBuildings(): Collection
    {
        return $this->buildings;
    }

    public function addBuilding(Employee $building): self
    {
        if (!$this->buildings->contains($building)) {
            $this->buildings[] = $building;
            $building->setBuilding($this);
        }

        return $this;
    }

    public function removeBuilding(Employee $building): self
    {
        if ($this->buildings->contains($building)) {
            $this->buildings->removeElement($building);
            // set the owning side to null (unless already changed)
            if ($building->getBuilding() === $this) {
                $building->setBuilding(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getContracts(): Collection
    {
        return $this->contracts;
    }

    public function addContract(Employee $contract): self
    {
        if (!$this->contracts->contains($contract)) {
            $this->contracts[] = $contract;
            $contract->setContractType($this);
        }

        return $this;
    }

    public function removeContract(Employee $contract): self
    {
        if ($this->contracts->contains($contract)) {
            $this->contracts->removeElement($contract);
            // set the owning side to null (unless already changed)
            if ($contract->getContractType() === $this) {
                $contract->setContractType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(Employee $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setUnit($this);
        }

        return $this;
    }

    public function removeUnit(Employee $unit): self
    {
        if ($this->units->contains($unit)) {
            $this->units->removeElement($unit);
            // set the owning side to null (unless already changed)
            if ($unit->getUnit() === $this) {
                $unit->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getArchives(): Collection
    {
        return $this->archives;
    }

    public function addArchive(Employee $archive): self
    {
        if (!$this->archives->contains($archive)) {
            $this->archives[] = $archive;
            $archive->setArchiveFileOrg($this);
        }

        return $this;
    }

    public function removeArchive(Employee $archive): self
    {
        if ($this->archives->contains($archive)) {
            $this->archives->removeElement($archive);
            // set the owning side to null (unless already changed)
            if ($archive->getArchiveFileOrg() === $this) {
                $archive->setArchiveFileOrg(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getUnitCategories(): Collection
    {
        return $this->unitCategories;
    }

    public function addUnitCategory(Employee $unitCategory): self
    {
        if (!$this->unitCategories->contains($unitCategory)) {
            $this->unitCategories[] = $unitCategory;
            $unitCategory->setUnitCategory($this);
        }

        return $this;
    }

    public function removeUnitCategory(Employee $unitCategory): self
    {
        if ($this->unitCategories->contains($unitCategory)) {
            $this->unitCategories->removeElement($unitCategory);
            // set the owning side to null (unless already changed)
            if ($unitCategory->getUnitCategory() === $this) {
                $unitCategory->setUnitCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|History[]
     */
    public function getHistories(): Collection
    {
        return $this->histories;
    }

    public function addHistory(History $history): self
    {
        if (!$this->histories->contains($history)) {
            $this->histories[] = $history;
            $history->setBase($this);
        }

        return $this;
    }

    public function removeHistory(History $history): self
    {
        if ($this->histories->contains($history)) {
            $this->histories->removeElement($history);
            // set the owning side to null (unless already changed)
            if ($history->getBase() === $this) {
                $history->setBase(null);
            }
        }

        return $this;
    }
}
