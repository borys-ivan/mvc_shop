<?php
/**
 * Created by PhpStorm.
 * User: borys
 * Date: 01.07.2018
 * Time: 1:06
 */

namespace App\Controllers;



use App\Core\Controller;
use App\Models\Cabinet;

class cabinetController extends Controller
{


    public function __clone()
    {

    }

    public function view()
    {


        if (isset($_SESSION['user_ID'])) {
            $id = $_SESSION['user_ID'];


            $user = new Cabinet();

            $user->getUserOrder($id);
            $this->data['user_order'] = $user->getResult();

            $user->getUserInform($id);
            $this->data['user_inform'] = $user->getResult();


            $this->loadTemplate('cabinetUser', $this->getData());

        } else {
            require_once($_SERVER['DOCUMENT_ROOT'] . '/App/Views/cabinet/LoginForm.php');
        }
        //return true;
    }


    public function login()
    {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $log = new Cabinet();
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $log->getUserID($user, $pass);
        }
        return true;
    }

    public function logout()
    {

        unset($_SESSION['user_ID']);
        header('Location: /');

    }

    public function updateUsers($id)
    {
        $_SESSION['ID'] = array_shift($id);
        $users_inform = new Cabinet();

        $users_inform->getUserInform($_SESSION['ID']);

        if (isset($_POST['submit'])) {
            //$user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $users_inform->updateUsers($_SESSION['ID'], $pass, $email, $number, $name, $surname);
            header("Location: /cabinet/view");


        }


        $this->data['user_inform'] = $users_inform->getResult();


        $this->loadTemplate('updateUserForm', $this->getData());

    }


    public function addUser()
    {
        $errors = [];
        //echo $_POST['name'];
        if (isset($_POST['submit'])) {
            $user_name = $_POST['user_name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
// Флаг ошибок
            $errors = false;
            // Валидация полей
            $check = new Cabinet();
//echo $name;
            if (!$check->checkName($name)) {
                $errors[] = 'Імя не повинно бути коротшим 2 символів';
            }
            if (!$check->checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if (!$check->checkPassword($pass)) {
                $errors[] = 'Пароль не повинен бути коротшим 6 символів';
            }
            if ($check->checkEmailExists($email)) {
                $errors[] = 'Такий email вже використовуєця';
            }
            if ($check->checkUserNameExists($user_name)) {
                $errors[] = 'Такий користувач вже зараєстрований';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $check->addUsers($user_name, $pass, $email, $number, $name, $surname);
                header("Location: /cabinet/view");
            }
        }
        $this->data['errors'] = $errors;


        $this->loadTemplate('registerLogin', $this->getData());

    }


}