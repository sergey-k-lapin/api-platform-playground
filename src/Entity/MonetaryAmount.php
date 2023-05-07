<?php

namespace App\Entity;

use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MonetaryAmountRepository;
use Doctrine\DBAL\Types\Types;
#[ApiResource(
    formats: 'json',
    mercure: true,
    paginationClientItemsPerPage: true,
    graphQlOperations: [
        new Query(),
        new QueryCollection(paginationType: 'page'),
    ]
)]
#[ORM\Entity(repositoryClass: MonetaryAmountRepository::class)]
class MonetaryAmount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $maxValue = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $minValue = null;
    #[ORM\Column(length: 3)]
    private ?string $currency = null;
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0', nullable: true)]
    private ?string $value = null;
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getMaxValue() : ?string
    {
        return $this->maxValue;
    }
    public function setMaxValue(?string $max_value) : self
    {
        $this->maxValue = $max_value;
        return $this;
    }
    public function getMinValue() : ?string
    {
        return $this->minValue;
    }
    public function setMinValue(?string $min_value) : self
    {
        $this->minValue = $min_value;
        return $this;
    }
    public function getCurrency() : ?string
    {
        return $this->currency;
    }
    public function setCurrency(string $currency) : self
    {
        $this->currency = $currency;
        return $this;
    }
    public function getValue() : ?string
    {
        return $this->value;
    }
    public function setValue(?string $value) : self
    {
        $this->value = $value;
        return $this;
    }
}
