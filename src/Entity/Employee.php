<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeeRepository")
 */
class Employee
{

    const GENDER=[
        'زن',
        'مرد',
    ];

    const TYPEOFINSURANCE=[
        'تأمین اجتماعی',
        'خدمات درمانی',
    ];

    const MARITALSTATUS=[
        'متأهل',
        'مجرد',
    ];

    const SOLDIERSTATUS=[
        'دارای کارت پایان خدمت',
        'معافیت پزشکی',
        'کفالت',
    ];

    const DEGREE=[
        'فاقد مدرک تحصیلی',
        'پنجم ابتدایی',
        'سیکل',
        'دیپلم',
        'فوق دیپلم',
        'لیسانس',
        'فوق لیسانس',
        'دکتری',
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nationalCode;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $fatherName;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $idNo;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $insuranceNo;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $typeOfInsurance;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $personnalNo;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $mobile1;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $mobile2;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $telephoneNo;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $maritalStatus;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $idSeries;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $idSerialNo;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $soldierStatus;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $degreeOfEducation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateEducation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $fieldOfStady;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $marriageDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $homeAddress;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $imageFileName;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $accountNo;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $bankName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="orgs")
     */
    private $org;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="salaries")
     */
    private $sallaryOrg;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="buildings")
     */
    private $building;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="contracts")
     */
    private $contractType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="units")
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="archives")
     */
    private $archiveFileOrg;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="unitCategories")
     */
    private $unitCategory;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\History", mappedBy="employee")
     */
    private $histories;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    public function __construct()
    {
        $this->histories = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getNationalCode(): ?string
    {
        return $this->nationalCode;
    }

    public function setNationalCode(string $nationalCode): self
    {
        $this->nationalCode = $nationalCode;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    public function setFatherName(?string $fatherName): self
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    public function getIdNo(): ?string
    {
        return $this->idNo;
    }

    public function setIdNo(?string $idNo): self
    {
        $this->idNo = $idNo;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(?string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getInsuranceNo(): ?string
    {
        return $this->insuranceNo;
    }

    public function setInsuranceNo(?string $insuranceNo): self
    {
        $this->insuranceNo = $insuranceNo;

        return $this;
    }

    public function getTypeOfInsurance(): ?string
    {
        return $this->typeOfInsurance;
    }

    public function setTypeOfInsurance(?string $typeOfInsurance): self
    {
        $this->typeOfInsurance = $typeOfInsurance;

        return $this;
    }

    public function getPersonnalNo(): ?string
    {
        return $this->personnalNo;
    }

    public function setPersonnalNo(?string $personnalNo): self
    {
        $this->personnalNo = $personnalNo;

        return $this;
    }

    public function getMobile1(): ?string
    {
        return $this->mobile1;
    }

    public function setMobile1(?string $mobile1): self
    {
        $this->mobile1 = $mobile1;

        return $this;
    }

    public function getMobile2(): ?string
    {
        return $this->mobile2;
    }

    public function setMobile2(?string $mobile2): self
    {
        $this->mobile2 = $mobile2;

        return $this;
    }

    public function getTelephoneNo(): ?string
    {
        return $this->telephoneNo;
    }

    public function setTelephoneNo(?string $telephoneNo): self
    {
        $this->telephoneNo = $telephoneNo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMaritalStatus(): ?bool
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(?bool $maritalStatus): self
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getIdSeries(): ?string
    {
        return $this->idSeries;
    }

    public function setIdSeries(?string $idSeries): self
    {
        $this->idSeries = $idSeries;

        return $this;
    }

    public function getIdSerialNo(): ?string
    {
        return $this->idSerialNo;
    }

    public function setIdSerialNo(?string $idSerialNo): self
    {
        $this->idSerialNo = $idSerialNo;

        return $this;
    }

    public function getSoldierStatus(): ?string
    {
        return $this->soldierStatus;
    }

    public function setSoldierStatus(?string $soldierStatus): self
    {
        $this->soldierStatus = $soldierStatus;

        return $this;
    }

    public function getDegreeOfEducation(): ?string
    {
        return $this->degreeOfEducation;
    }

    public function setDegreeOfEducation(?string $degreeOfEducation): self
    {
        $this->degreeOfEducation = $degreeOfEducation;

        return $this;
    }

    public function getDateEducation(): ?\DateTimeInterface
    {
        return $this->dateEducation;
    }

    public function setDateEducation(?\DateTimeInterface $dateEducation): self
    {
        $this->dateEducation = $dateEducation;

        return $this;
    }

    public function getFieldOfStady(): ?string
    {
        return $this->fieldOfStady;
    }

    public function setFieldOfStady(?string $fieldOfStady): self
    {
        $this->fieldOfStady = $fieldOfStady;

        return $this;
    }

    public function getMarriageDate(): ?\DateTimeInterface
    {
        return $this->marriageDate;
    }

    public function setMarriageDate(?\DateTimeInterface $marriageDate): self
    {
        $this->marriageDate = $marriageDate;

        return $this;
    }

    public function getHomeAddress(): ?string
    {
        return $this->homeAddress;
    }

    public function setHomeAddress(?string $homeAddress): self
    {
        $this->homeAddress = $homeAddress;

        return $this;
    }

    public function getImageFileName(): ?string
    {
        return $this->imageFileName;
    }

    public function setImageFileName(?string $imageFileName): self
    {
        $this->imageFileName = $imageFileName;

        return $this;
    }

    public function getOrg(): ?Base
    {
        return $this->org;
    }

    public function setOrg(?Base $org): self
    {
        $this->org = $org;

        return $this;
    }

    public function getSallaryOrg(): ?Base
    {
        return $this->sallaryOrg;
    }

    public function setSallaryOrg(?Base $sallaryOrg): self
    {
        $this->sallaryOrg = $sallaryOrg;

        return $this;
    }

    public function getBuilding(): ?Base
    {
        return $this->building;
    }

    public function setBuilding(?Base $building): self
    {
        $this->building = $building;

        return $this;
    }

    public function getContractType(): ?Base
    {
        return $this->contractType;
    }

    public function setContractType(?Base $contractType): self
    {
        $this->contractType = $contractType;

        return $this;
    }

    public function getUnit(): ?Base
    {
        return $this->unit;
    }

    public function setUnit(?Base $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getArchiveFileOrg(): ?Base
    {
        return $this->archiveFileOrg;
    }

    public function setArchiveFileOrg(?Base $archiveFileOrg): self
    {
        $this->archiveFileOrg = $archiveFileOrg;

        return $this;
    }

    public function getUnitCategory(): ?Base
    {
        return $this->unitCategory;
    }

    public function setUnitCategory(?Base $unitCategory): self
    {
        $this->unitCategory = $unitCategory;

        return $this;
    }

    public function getAccountNo(): ?string
    {
        return $this->accountNo;
    }

    public function setAccountNo(?string $accountNo): self
    {
        $this->accountNo = $accountNo;

        return $this;
    }

    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $history->setEmployee($this);
        }

        return $this;
    }

    public function removeHistory(History $history): self
    {
        if ($this->histories->contains($history)) {
            $this->histories->removeElement($history);
            // set the owning side to null (unless already changed)
            if ($history->getEmployee() === $this) {
                $history->setEmployee(null);
            }
        }

        return $this;
    }

    public function imagePath()
    {
        return 'images/'.$this->getImageFileName();
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }
}
