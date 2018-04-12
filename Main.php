<?php

use Models\User;
use Models\Game;

/**
 * 
 * Class Main
 *
 */
Class Main {

    public static function settings() {

        /**
         * Global properties
         *
         * @var string
         * @var boolean
         * @var array
         *
         */
        $choice;
        $translate = false;
        $_languages = ['it', 'en'];


        echo "Please select language: EN|IT Default[EN]\n";

        $choice = @trim(fgets(STDIN));
        strtolower($choice);

        try {

            if ($choice == "it") {
                $translate = true; 
            }
            if (!$choice){
                $choice = 'en';
            }
            if(!in_array($choice, $_languages)){
                throw new Exception('Problem with choice');
            }

        } catch (Exception $e) {
            echo "error during language selection" . $e;
            die();
        }

        $_translator = new Lang($choice);

        echo $_translator->getGreetings() . "\n\n";

        $user = new User();

        echo $_translator->translate("how you want to be called?") . "\n";
        $user->username = @trim(fgets(STDIN));
        echo $_translator->translate("Good, now insert your pin") . "\n";
        echo "\033[30;40m"; // black text on black background
        $user->pin = @trim(fgets(STDIN));
        echo "\033[0m";      // reset
        echo $_translator->translate("Please specify your email") . "\n";
        $user->email = @trim(fgets(STDIN));
        $user->lang = $choice;

        //TODO aggiungere una validazione dei dati

        //TODO salvare i dati nel DB
        //$user->save();


    }

    public function auth() {

        /**
        * 
        * @var string
        * @var string
        * 
        */
        $emailAuth;
        $pinAuth;

        echo "PWMAN Login System\n\n";

        echo "Email: ";
        $emailAuth = @trim(fgets(STDIN));
        echo "\n";
        echo "Pin: ";
        echo "\033[30;40m"; // black text on black background
        $pinAuth = @trim(fgets(STDIN));
        echo "\033[0m";      // reset
        echo "\n";

        $user = User::find($emailAuth);

        if ($user == NULL) {
            echo "Login fail user null";
            return;
        }


        $valid = password_verify($pinAuth, $user->getPin());

        if (!$valid) {
            echo "Login fail";
            return;
        }
        echo "Login success";
    }

}
