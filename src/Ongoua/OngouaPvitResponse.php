<?php


namespace Ongoua;


class OngouaPvitResponse
{
    private $statut;
    private $message;
    private $token;
    private $telClient;
    private $operateur;
    private $type;
    private $ref;

    /**
     * OngouaPvitResponse constructor.
     */
    public function __construct()
    {
    }


    public static function fromArray(array $data): OngouaPvitResponse
    {
        $response = new OngouaPvitResponse();

        $response->setStatut(static::getValue($data, "STATUT"));
        $response->setRef(static::getValue($data, "REF"));
        $response->setType(static::getValue($data, "TYPE"));
        $response->setOperateur(static::getValue($data, "OPERATEUR"));
        $response->setTelClient(static::getValue($data, "TEL_CLIENT"));
        $response->setToken(static::getValue($data, "TOKEN"));
        $response->setMessage(static::getValue($data, "MESSAGE"));

        return $response;
    }

    private static function getValue(array $arr, string $key): string
    {
        if (!isset($arr[$key]) || gettype($arr[$key]) === "array") return "";

        return $arr[$key];
    }

    /**
     * @return mixed
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * @param mixed $telClient
     */
    private function setTelClient($telClient)
    {
        $this->telClient = $telClient;
    }

    /**
     * @return mixed
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * @param mixed $operateur
     */
    private function setOperateur($operateur)
    {
        $this->operateur = $operateur;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    private function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    private function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    private function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    private function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    private function setToken($token)
    {
        $this->token = $token;
    }


}