<?php
class User{
    var $id;
    var $firstName;
    var $lastName;
    var $email;
    var $phone;
    var $userType;
    var $status;
    var $reportingManagerId;
    var $createdUserBy;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    /**
     * @return mixed
     */
    public function getReportingManagerId()
    {
        return $this->reportingManagerId;
    }

    /**
     * @return mixed
     */
    public function getCreatedUserBy()
    {
        return $this->createdUserBy;
    }

    /**
     * @param mixed $reportingManagerId
     */
    public function setReportingManagerId($reportingManagerId)
    {
        $this->reportingManagerId = $reportingManagerId;
    }

    /**
     * @param mixed $createdUserBy
     */
    public function setCreatedUserBy($createdUserBy)
    {
        $this->createdUserBy = $createdUserBy;
    }
    public function setUserSession($message){
        session_start();
        $_SESSION['user'] =$message;
    }
}