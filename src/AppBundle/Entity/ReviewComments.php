<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReviemComments
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ReviewComments
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
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="Reviewer", inversedBy="reviewComments")
     */
    private $reviewers;

    /**
     * @ORM\ManyToOne(targetEntity="ArticleReview", inversedBy="reviewComments")
     */
    private $articleReviews;



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
     * Set comment
     *
     * @param string $comment
     * @return ReviewComments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return ReviewComments
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set reviewers
     *
     * @param \AppBundle\Entity\Reviewer $reviewers
     * @return ReviewComments
     */
    public function setReviewers(\AppBundle\Entity\Reviewer $reviewers = null)
    {
        $this->reviewers = $reviewers;

        return $this;
    }

    /**
     * Get reviewers
     *
     * @return \AppBundle\Entity\Reviewer 
     */
    public function getReviewers()
    {
        return $this->reviewers;
    }

    /**
     * Set articleReviews
     *
     * @param \AppBundle\Entity\ArticleReview $articleReviews
     * @return ReviewComments
     */
    public function setArticleReviews(\AppBundle\Entity\ArticleReview $articleReviews = null)
    {
        $this->articleReviews = $articleReviews;

        return $this;
    }

    /**
     * Get articleReviews
     *
     * @return \AppBundle\Entity\ArticleReview 
     */
    public function getArticleReviews()
    {
        return $this->articleReviews;
    }
}
