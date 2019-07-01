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
