<?php

/**
 * Class Main
 *
 */

Class Main {

    /**
     * User property
     *
     * @var string
     * @var string
     * @var string
     *
     */
    public static $username;
    public static $pin;
    public static $lang;

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

        echo $_translator->translate("how you want to be called?") . "\n";
        Main::$username = @trim(fgets(STDIN));
        echo $_translator->translate("Good, now insert your pin") . "\n";
        Main::$pin = @trim(fgets(STDIN));
        Main::$lang = $choice;

        //TODO salvare i dati nel DB


    }

}
