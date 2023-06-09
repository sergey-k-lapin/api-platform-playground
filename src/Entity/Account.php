<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AccountRepository;

#[ApiResource(
    formats: 'json',
    mercure: true,
    paginationClientItemsPerPage: true,
    graphQlOperations: [
        new Query(),
        new QueryCollection(paginationType: 'page'),
    ]
)]
#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\ManyToOne(inversedBy: 'accounts')]
    #[ORM\JoinColumn(nullable: false, name: "bank_id")]
    private ?Bank $bank = null;
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false, name: "amount_id")]
    private ?MonetaryAmount $amount = null;
    #[ORM\ManyToOne(inversedBy: 'accounts')]
    #[ORM\JoinColumn(nullable: false, name: "person_id")]
    private ?Person $person = null;
    #[ORM\Column(length: 255)]
    private ?string $identifier = null;
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getBank() : ?Bank
    {
        return $this->bank;
    }
    public function setBank(?Bank $bank) : self
    {
        $this->bank = $bank;
        return $this;
    }
    public function getAmount() : ?MonetaryAmount
    {
        return $this->amount;
    }
    public function setAmount(MonetaryAmount $amount) : self
    {
        $this->amount = $amount;
        return $this;
    }
    public function getPerson() : ?Person
    {
        return $this->person;
    }
    public function setPerson(?Person $person) : self
    {
        $this->person = $person;
        return $this;
    }
    public function getIdentifier() : ?string
    {
        return $this->identifier;
    }
    public function setIdentifier(string $identifier) : self
    {
        $this->identifier = $identifier;
        return $this;
    }
}
