<?php

//namespace App\Repository\Interface;

interface UserInterface
{
    public  function getAllData();
    public function addUser($input);
    public function delete($id);
    public function getById($id);
    public function update($input,$id);
}
