<?php
interface AddNewClientInterface
{
    public function isEmailInDatabase();
    public function checkLengthPassword();
    public function checkCorrectPassword();
    public function setHashPassword();

}

interface EditClientInterface
{
    public function checkLengthFirstNameAndSurname();
    public function checkCorrectFirstNameAndSurname();
    public function checkCorrectEmail();
}
?>