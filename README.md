# html-faker
An utility using fzaninotto/faker to generate Lorem Ipsum HTML

    {
        "repositories": [
            {
                "type": "path",
                "url": "../../../projets/html-faker/",
                "options": {
                    "symlink": true
                }
            }
        ],
        "require": {
            "fzaninotto/faker": "^1.8",
            "bgaze/html-faker": "dev-master"
        }
    }
    
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once './vendor/autoload.php';

    use Faker\Factory;
    use Bgaze\HtmlFaker\Generator;

    $faker = new Generator(Factory::create());

    echo $faker->page();

