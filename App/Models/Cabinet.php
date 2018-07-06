<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 01.07.2018
 * Time: 1:10
 */

namespace App\Models;


use App\Core\Model;

class Cabinet extends Model
{


    private $Result = null;

    public function getResult()
    {
        return $this->Result;
    }

    public function getUserID($user, $pass)
    {

        $account = $this->db->prepare("SELECT ID, user_name FROM user WHERE user_name=" . $this->db->quote($user) . " AND pass=" . $this->db->quote($pass) . "");
        if ($account) {

            $account->execute();

            $this->Result=$account->fetch(\PDO::FETCH_ASSOC);


            $_SESSION['user_ID'] =$this->Result['ID'];
            $_SESSION['user_name'] =$this->Result['user_name'];


            require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Views/layouts/form/user_form.php');


        } else {
            echo "такого користувача не знайдено в базі";
        }
    }

    public function getUserInform($id)
    {


        $getUsers = $this->db->prepare("SELECT*FROM user WHERE ID=" . $this->db->quote($id) . "");
        if ($getUsers) {
            $getUsers->execute();
            $this->Result=$getUsers->fetchAll(\PDO::FETCH_ASSOC);

        }
    }

    public function getUserOrder($id)
    {


        $history = $this->db->prepare("SELECT order1.ID, product.ID_product, product.name, order1.data, order1.state, 
          order1.amount_product, order1.amount_price 
          FROM user, order1
          RIGHT JOIN product ON product.ID = order1.ID_product
          WHERE user.ID = order1.ID_user
          AND user.ID=" . $this->db->quote($id));

        $history->execute();

        if ($history) {

            $this->Result = $history->fetchAll(\PDO::FETCH_ASSOC);


        }
    }

    public function updateUsers($id, $pass, $email, $number, $name, $surname)
    {
       $query= $this->db->prepare("UPDATE user SET pass=" . $this->db->quote($pass) . ",email=" . $this->db->quote($email) . "
        ,number=" . $this->db->quote($number) . ",name=" . $this->db->quote($name) . ",surname=" . $this->db->quote($surname) . " 
        WHERE ID=" . $this->db->quote($id));
        $query->execute();
       // var_dump($query);
    }

    public function addUsers($user_name, $pass, $email, $number, $name, $surname)
    {

        $add_user = $this->db->prepare("INSERT INTO `user` (`user_name`, `pass`, `email`, `number`, `name`,`surname`) 
              VALUES (" . $this->db->quote($user_name) . ", " . $this->db->quote($pass) . "," . $this->db->quote($email) . ",
               " . $this->db->quote($number) . ", " . $this->db->quote($name) . ", " . $this->db->quote($surname) . ")");

        $add_user->execute();
    }

    public function checkName($name)
    {
        if (strlen($name) >= 2) {


            return true;
        }
        return false;
    }
    /**
     * Проверяет телефон: не меньше, чем 10 символов
     * @param string $phone <p>Телефон</p>
     * @return boolean <p>Результат выполнения метода</p>
     */

    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function checkEmailExists($email)
    {
        // Соединение с БД

        $check_email = $this->db->prepare("SELECT * FROM user WHERE email=" . $this->db->quote($email));

        $check_email->execute();
        $result=$check_email->fetchAll(\PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        }
        return false;
    }

    public function checkUserNameExists($user_name)
    {
        // Соединение с БД

        $check_user_name = $this->db->prepare("SELECT * FROM user WHERE user_name=" . $this->db->quote($user_name) );

        $check_user_name->execute();
        $result=$check_user_name->fetchAll(\PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        }
        return false;
    }


}