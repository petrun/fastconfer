<?php
/**
 * Created by PhpStorm.
 * User: fran
 * Date: 22/06/15
 * Time: 19:45
 */

namespace AppBundle\Security\Voter;


use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authorization\Voter\AbstractVoter;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class EditConferenceChairman
 * @package AppBundle\Security\Voter
 * Clase para crear el Voter que permite administrar una conferencia
 */
class EditConferenceChairman extends AbstractVoter{

    /**
     * Return an array of supported classes. This will be called by supportsClass
     *
     * @return array an array of supported classes, i.e. array('Acme\DemoBundle\Model\Product')
     */
    protected function getSupportedClasses()
    {
        return[
            'AppBundle\Entity\User'
        ];
    }

    /**
     * Return an array of supported attributes. This will be called by supportsAttribute
     *
     * @return array an array of supported attributes, i.e. array('CREATE', 'READ')
     */
    protected function getSupportedAttributes()
    {
        return [
            'EDIT_CONFERENCE_CHAIRMAN'
        ];
    }

    /**
     * Perform a single access check operation on a given attribute, object and (optionally) user
     * It is safe to assume that $attribute and $object's class pass supportsAttribute/supportsClass
     * $user can be one of the following:
     *   a UserInterface object (fully authenticated user)
     *   a string               (anonymously authenticated user)
     *
     * @param string $attribute
     * @param User $object
     * @param UserInterface|string $user
     *
     * @return bool
     */
    protected function isGranted($attribute, $object, $user = null)
    {
        //Falta sacar el ROL de cada usuario

        if ($object->getRoles()== User::ROLE_DEFAULT)
        {
            dump($object->getRoles());
            return false;

        }

        return true;


    }
}