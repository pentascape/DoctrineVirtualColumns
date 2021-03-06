<?php

namespace AshleyDawson\DoctrineVirtualColumns\Tests\Fixture;

use Doctrine\ORM\Mapping as ORM;
use AshleyDawson\DoctrineVirtualColumns\Mapping\Annotation as VirtualColumn;

/**
 * Class Vote
 *
 * @package AshleyDawson\DoctrineVirtualColumns\Tests\Fixture
 *
 * @ORM\Entity
 *
 * @VirtualColumn\Cache\DQLNotifyOnChange(
 *     dql="SELECT p FROM AshleyDawson\DoctrineVirtualColumns\Tests\Fixture\AbstractPost p JOIN AshleyDawson\DoctrineVirtualColumns\Tests\Fixture\Review r WITH p = r.post WHERE r = :this.review",
 *     properties={"averageRating", "reviewCount", "voteCount"}
 * )
 */
class Vote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @var Review
     *
     * @ORM\ManyToOne(targetEntity="Review", inversedBy="votes")
     */
    private $review;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return Vote
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get review
     *
     * @return Vote
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set review
     *
     * @param Review $review
     * @return Vote
     */
    public function setReview(Review $review)
    {
        $this->review = $review;
        return $this;
    }
}