<?php

namespace Ongoua;

use Exception;

class OngouaPvit
{
    private $telMarchand;
    private $montant;
    private $ref;
    private $telClient;
    private $token;
    private $action;
    private $service;
    private $operateur;
    private $agent;

    private $pvitUrl = "https://mypvit.com/pvit-secure-full-api.kk";
    private $actionValues = [1, 2, 3, 5];
    private $serviceValues = ["REST", "WEB"];
    private $operateurValues = ["AM", "MC"];

    public function __construct(string $telMarchand, string $token)
    {
        $this->telMarchand = $telMarchand;
        $this->montant = 0;
        $this->ref = "";
        $this->telClient = "";
        $this->token = $token;
        $this->action = 1;
        $this->service = "REST";
        $this->operateur = "AM";
        $this->agent = "OngouaPvit";
    }

    /**
     * @throws Exception
     */
    private function validate()
    {
        // Required parameters
        if (!isset($this->telMarchand) || empty($this->telMarchand)) throw new Exception("'telMarchand' parameter is required");
        if (!isset($this->montant) || empty($this->montant)) throw new Exception("'montant' parameter is required");
        if (!isset($this->ref) || empty($this->ref)) throw new Exception("'ref' parameter is required");
        if (!isset($this->telClient) || empty($this->telClient)) throw new Exception("'telClient' parameter is required");
        if (!isset($this->action) || empty($this->action)) throw new Exception("'action' parameter is required");
        if (!isset($this->service) || empty($this->service)) throw new Exception("'service' parameter is required");
        if (!isset($this->operateur) || empty($this->operateur)) throw new Exception("'operateur' parameter is required");

        if (!$this->isValidNumber($this->telMarchand)) throw new Exception("telMarchand is not a correct phone number");
        if (!$this->isValidNumber($this->telClient)) throw new Exception("telClient is not a correct phone number");

        if (strlen($this->ref) > 13) throw new Exception("the 'ref' value must be 13 characters maximum");

        if (!in_array($this->action, $this->actionValues)) throw new Exception("the 'action' value is incorrect. Possible values are : " . implode(", ", $this->actionValues));
        if (!in_array($this->service, $this->serviceValues)) throw new Exception("the 'service' value is incorrect. Possible values are : " . implode(", ", $this->serviceValues));
        if (!in_array($this->operateur, $this->operateurValues)) throw new Exception("the 'operateur' value is incorrect. Possible values are : " . implode(", ", $this->operateurValues));

        if ($this->montant < 100 || $this->montant > 490000) throw new Exception("the 'montant' value must be between 100 and 490000");
    }

    private function isValidNumber(string $number): bool
    {
        return ($number && strlen($number) === 9 && preg_match("/(0){1}([6-7]){1}([0-9]){7}/", $number));
    }

    /**
     * @throws Exception
     */
    public function send(): OngouaPvitResponse
    {
        $this->validate();

        $response = new OngouaPvitResponse();
        $response->setMessage("tout est cool");
        $response->setStatut("200");

        return $response;
    }

    public static function parse(string $xml)
    {
    }

    /**
     * @param string $telMarchand
     */
    public function setTelMarchand(string $telMarchand)
    {
        $this->telMarchand = $telMarchand;
    }

    /**
     * @param int $montant
     */
    public function setMontant(int $montant)
    {
        $this->montant = $montant;
    }

    /**
     * @param string $ref
     */
    public function setRef(string $ref)
    {
        $this->ref = $ref;
    }

    /**
     * @param string $telClient
     */
    public function setTelClient(string $telClient)
    {
        $this->telClient = $telClient;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param int $action
     */
    public function setAction(int $action)
    {
        $this->action = $action;
    }

    /**
     * @param string $service
     */
    public function setService(string $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $operateur
     */
    public function setOperateur(string $operateur)
    {
        $this->operateur = $operateur;
    }

    /**
     * @param string $agent
     */
    public function setAgent(string $agent)
    {
        $this->agent = $agent;
    }

}
