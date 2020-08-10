<?php

class Resident
{
    private $id;
    private $name;
    private $planet_id;

    public function __construct($id = null, $name, $planet_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->planet_id = $planet_id;
    }

    // On créé des setters et des Getters pour recupérer et modifier les attributs private.


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of planet_id
     */
    public function getPlanet_id()
    {
        return $this->planet_id;
    }

    /**
     * Set the value of planet_id
     *
     * @return  self
     */
    public function setPlanet_id($planet_id)
    {
        $this->planet_id = $planet_id;

        return $this;
    }
}
