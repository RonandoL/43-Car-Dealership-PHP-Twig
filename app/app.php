<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

  // 1. Route for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('cars.html.twig', array('cars' => $_SESSION['list_of_cars']));
    });

  // 2. POST-Instantiate Route for sending new object (new task) to /tasks URL
    $app->post('/new-car', function() use ($app) {
      $car = new Car(ucfirst($_POST['make']), ucfirst($_POST['model']), number_format($_POST['year']), ucfirst($_POST['color']), number_format($_POST['price']), $_POST['image']);
      $car->save();

      return $app['twig']->render('cars.html.twig', array('cars' => $_SESSION['list_of_cars']));
    });

  // 3. Route for deleting all tasks
    $app->post('/delete', function() use ($app) {
      Car::deleteAll();

      return $app['twig']->render('cars.html.twig');
    });

    return $app;

?>
