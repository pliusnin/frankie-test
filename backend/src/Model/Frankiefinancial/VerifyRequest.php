<?php


namespace App\Model\Frankiefinancial;


/**
 * Class VerifyRequest
 * @package App\Model\Frankiefinancial
 */
class VerifyRequest
{
    /**
     * @var []
     */
    private $entity = [];

    /**
     * @param array $filter
     * @return array
     */
    public function create($filter = [])
    {
        if (isset($filter['name'])) {
            $this->parseName($filter['name']);
        }

        $address = $identityDoc = [];
        if (isset($filter['nationality']) && strlen($filter['nationality']) > 0) {
            $address['country'] = $filter['nationality'];
            $identityDoc['country'] = $filter['nationality'];
        }

        if (isset($filter['address']) && strlen($filter['address']) > 0) {
            $address['longForm'] = $filter['address'];
        }

        if (isset($filter['dob']) && strlen($filter['dob']) > 0) {
            $this->entity['dateOfBirth']['dateOfBirth'] = $filter['dob'];
        }

        if (isset($filter['docType']) && strlen($filter['docType']) > 0) {
            $identityDoc['idType'] = $filter['docType'];
        }

        if (isset($filter['docNumber']) && strlen($filter['docNumber']) > 0) {
            $identityDoc['idNumber'] = $filter['docNumber'];
        }

        if (count($address) > 0) {
            $this->entity['addresses'][] = $address;
        }

        if (count($identityDoc) > 0) {
            $this->entity['identityDocs'][] = $identityDoc;
        }

        return $this->getRequest();
    }

    /**
     * @param $data
     */
    private function parseName($data)
    {
        $name = explode(' ', $data);
        $this->entity['name']['givenName'] = array_shift($name);
        if (count($name) > 0) {
            $this->entity['name']['familyName'] = array_pop($name);
        }
        if (count($name) > 0) {
            $this->entity['name']['middleName'] = implode($name, ' ');
        }
    }

    /**
     * @return array
     */
    private function getRequest()
    {
        return ['entity' => $this->entity];
    }
}
