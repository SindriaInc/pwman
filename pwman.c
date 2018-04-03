#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <ctype.h>


int command_to_number();
int setup();
int auth();
int logout();
int listgames();
int insert();
int choice();


 // Function lower case.

void lower_case(char command[]) {
  for(int i = 0; command[i]; i++) {
    command[i] = tolower(command[i]);
  }
}


int main() {


  puts("#####################################################################################################################");
  puts("#####################################################################################################################");
  puts("#######PASSWORD MANAGER BY SINDRIA PROJECT#####################################Email: support@sindria.org############");
  puts("###############################################################################Telegram: @sindriasupport ############");
  puts("###################################################CODED BY NEO######################################################");
  puts("#####################################################################################################################");

  FILE *stream;

  stream = fopen("settings.txt", "r");

  // controlla se il file esiste 
    if ((stream = fopen("settings.txt", "r")) == NULL)
    {
       printf("File %s not exist\n", "settings.txt");
       system("rm games.txt");
       puts("RUN SETUP...\n");
       setup();
       auth();
    }


  while(!feof(stream)) {

  auth();

  }
  fclose(stream);

}


 // Function trasform command to function decimal.

int command_to_number() {

  char command[128];
  int function;

  if (strcmp(command, "setup") == 0) {
         function = 0;
       } else if (strcmp(command, "logout") == 0) {
         function = 1;
       } else if (strcmp(command, "help") == 0) {
         function = 2;
       } else if (strcmp(command, "print") == 0) {
         function = 3;
       } else if (strcmp(command, "exit") == 0) {
         function = 4;
       } else if (strcmp(command, "insert") == 0) {
         function = 5;
       } else if (strcmp(command, "clear") == 0) {
         function = 6;
       } else {
         function = -1;
       }

} 



 // Function settings password manager.

int setup() {

  char name[40];
  char code[10];

  puts("Setup Password Manager");

    // dichiara lo stream e il prototipo della funzione fopen 
    FILE *stream;
 
    // apre lo stream del file 
    stream = fopen("settings.txt", "w");
 
    // controlla se il file viene aperto 
    if ((stream = fopen("settings.txt", "w")) == NULL)
    {
       printf("Cannot open the file %s\n", "settings.txt");
       exit(1);
    }


    puts("How you want to be called?");
    gets(name);
    fprintf(stream, "%s\t", name);
    puts("Choose a passcode");
    gets(code);
    fprintf(stream, "%s\t", code);
    fclose(stream);

    puts("Setup Password Manager complete");
}

 // Function authentication.

int auth() {

  bool logged=false;
  char name[40];
  char pass[10];
  char code[10];

 
   // dichiara lo stream e il prototipo della funzione fopen 
    FILE *stream;

   // open the file's stream in read only
    stream = fopen("settings.txt", "r");

   // controlla se il file viene aperto 
    if ((stream = fopen("settings.txt", "r")) == NULL)
    {
       printf("Cannot open the file %s\n", "settings.txt");
       exit(1);
    }

 if (stream) {

    while(!feof(stream)) {

      fscanf(stream, "%s\t", name);
      fscanf(stream, "%s\t", code);
      printf("Welcome Mr. %s \ninsert passcode:", name);
      gets(pass);
      if (strcmp(pass, code) == 0) {

        puts("Login Success");
        logged=true;
        puts("Hi, digit help for a list commands");
        choice();
      }
      else { puts("Wrong passcode, exit"); exit(1); }


    }
    fclose(stream);

  }
  else { puts("Errore durante l'apertura del file."); }

}

 // Function logout.

int logout() {

  bool logged=false;

  puts("Logout Success");
  logged=false;
  auth();

}

 // Function insert credentials.

int insert() {

  char username[50];
  char password[70];
  char confirm[3];
  int i=0;

  puts("#####################################");

  do {

    // dichiara lo stream e il prototipo della funzione fopen
    FILE *stream;
 
    // apre lo stream del file
    stream = fopen("games.txt", "a");
 
    // controlla se il file viene aperto
    if (stream == NULL)
    {
       printf("Cannot open the file %s\n", "games.txt");
       exit(1);
    }


      puts("Insert username:");
      gets(username);
      fprintf(stream, "%s\t", username);
      puts("Insert password:");
      gets(password);
      fprintf(stream, "%s\t\n", password);
      fclose(stream);

      puts("Insert complete");
      puts("Add another credential?(y/n)");
      gets(confirm);
      i++;

   }
   while(strcmp(confirm, "y") == 0);

     printf("All insert complete. %d\n", i);

}

 // Function print credentials.

int listgames() {

  char username[50];
  char password[70];

  puts("Games:");
  
   // dichiara lo stream e il prototipo della funzione fopen 
    FILE *stream;

   // open the file's stream in read only
    stream = fopen("games.txt", "r");

   // controlla se il file viene aperto 
    if ((stream = fopen("games.txt", "r")) == NULL)
    {
       printf("Cannot open the file %s\n", "games.txt");
       exit(1);
    }


   if (stream) {

    while(!feof(stream)) {

      fscanf(stream, "%s\t%s\t", username, password);
      printf("Username: %s\nPassword: %s\n\n", username, password);

    }
    fclose(stream);

  }
  else { puts("Errore durante l'apertura del file."); }
 


}

 // Function choice.

int choice() {

  bool logged=false;
  char command[128];
  int function;

  logged=true;

  while(logged) {

       gets(command);
       
       lower_case(command);
       //command_to_number();

  if (strcmp(command, "setup") == 0) {
         function = 0;
       } else if (strcmp(command, "logout") == 0) {
         function = 1;
       } else if (strcmp(command, "help") == 0) {
         function = 2;
       } else if (strcmp(command, "list games") == 0) {
         function = 3;
       } else if (strcmp(command, "exit") == 0) {
         function = 4;
       } else if (strcmp(command, "insert") == 0) {
         function = 5;
       } else if (strcmp(command, "clear") == 0) {
         function = 6;
       } else {
         function = -1;
       }



  switch(function) {
       case 0: 
         
         // Settings Password Manager
         setup();
         break;

       case 1:
         
         // Logout
         logout();
         break;

       case 2:
         
         // Help
         puts("Choose from avaible commands:\n");
         puts("setup - Settings Password Manager");
         puts("insert - Insert or modify credentials");
         puts("help - Print this text");
         puts("clear - Clear screen");
         puts("logout - Login passcode necessary");
         puts("exit - Close the Password Manager\n");
         break;

       case 3:
       
         // Print credentials
         listgames();
         break;

       case 4:
       
         // Exit
         puts("Goodbye Sir.");
         exit (0);

       case 5:

         // Insert or modify credentials
         insert();
         break;

      case 6:

         // Clear screen
         system("clear");
         puts("Choose from avaible commands:\n");
         puts("setup - Settings Password Manager");
         puts("insert - Insert or modify credentials");
         puts("help - Print this text");
         puts("clear - Clear screen");
         puts("logout - Login passcode necessary");
         puts("exit - Close the Password Manager\n");
         break;


       default:

         // Not found
         puts("Invalid command\n");
         break;
       }

   }

}
