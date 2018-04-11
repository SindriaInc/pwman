<?php

/**
 * Class Bootstrap
 */
class Bootstrap {

    public function loader() {

        Bootstrap::message();
        Main::settings();

    }

    public function message() {
        Bootstrap::credits();
        echo "\n\n";
        echo "PWMAN is starting";
        //Bootstrap::slaveMessage("PWMAN is starting");
        for ($i=0; $i<=7; $i++) {
            echo ".";
            sleep(1);
        }
        echo "\n";

    }

    // L'idea dello slaveMessage e' di creare l'animazione di caricamento uguale a quella di FreeBSD

    /* public function slaveMessage($string) {
        for ($i=0; $i<=10; $i++) {
            echo substr($string, 0, $string[j]);
            sleep(1);
            $string[j]++;
        }
        }*/

    public function credits() {

        echo "#########################################################\n";
        echo "###################### PWMAN ############################\n";
        echo "#########################################################\n";
        echo "############  DEVELOPED BY Sindria Inc. #################\n";
        echo "#########################################################\n";
        echo "#########################################################\n";
        echo "### This software is distributed under GPL V3 license ###\n";
        echo "#########################################################\n";
        echo "############  Copyright Sindria Inc. ####################\n";
        echo "#########################################################\n";
    }


}
