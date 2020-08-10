<?php
class Planet
{
    private $id;
    private $name;
    private $status;
    private $terrain;
    private $allegiance;
    private $key_fact;
    private $image;

    public function __construct($id = null, $name, $status, $terrain, $allegiance, $key_fact, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->terrain = $terrain;
        $this->allegiance = $allegiance;
        $this->key_fact = $key_fact;
        $this->image = $image;
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
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of terrain
     */
    public function getTerrain()
    {
        return $this->terrain;
    }

    /**
     * Set the value of terrain
     *
     * @return  self
     */
    public function setTerrain($terrain)
    {
        $this->terrain = $terrain;

        return $this;
    }

    /**
     * Get the value of allegiance
     */
    public function getAllegiance()
    {
        return $this->allegiance;
    }

    /**
     * Set the value of allegiance
     *
     * @return  self
     */
    public function setAllegiance($allegiance)
    {
        $this->allegiance = $allegiance;

        return $this;
    }

    /**
     * Get the value of key_fact
     */
    public function getKey_fact()
    {
        return $this->key_fact;
    }

    /**
     * Set the value of key_fact
     *
     * @return  self
     */
    public function setKey_fact($key_fact)
    {
        $this->key_fact = $key_fact;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
