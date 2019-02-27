To run project:

    1. $ composer install
    
    2. register in https://home.openweathermap.org/users/sign_in
       get your personal api key
       create config.yaml in main folder and put there one line:
       key: 'yourkey'
    
    3. $ php phpScript.php <cityid>
        
        replace <cityid> with ID of city of your choice.
        to get city ID:
        search for city at: https://openweathermap.org/city
        click at city name
        city ID will appear in URL https://openweathermap.org/city/<cityid>
    