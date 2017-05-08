<?php
// Routes
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Clients
$app->group('/clients', function () {
    $this->get('[/{page:[0-9]+}[/{search}]]', function (Request $request, Response $response, $args) {
        $page = $request->getAttribute('page');
        $page = (empty($page)) ? 0 : (int)$page;
        $search = $request->getAttribute('search');
        $json = \macis\classes\Clients::search($page, $search);
        $json['user'] = $_SESSION['user'];
        echo json_encode($json, JSON_PRETTY_PRINT);
    });
});

$app->group('/client', function () {
    // Fiche client
    $this->get('/{id:[0-9]+}', function (Request $request, Response $response, $args) {
        $id = $request->getAttribute('id');
        $json['client'] = \macis\classes\Clients::get($id);
        $json['user'] = $_SESSION['user'];
        echo json_encode($json, JSON_PRETTY_PRINT);
    });
    // Update client
    $this->put('/{id:[0-9]+}', function (Request $request, Response $response, $args) {
        $id = $request->getAttribute('id');
        $values = $request->getBody();
        $values = json_decode($values, true);
        $json['client'] = \macis\classes\Clients::put($id, $values);
        $json['user'] = $_SESSION['user'];
        echo json_encode($json, JSON_PRETTY_PRINT);
    });
    // Add client
    $this->post('', function (Request $request, Response $response, $args) {
        $values = $request->getBody();
        $values = json_decode($values, true);
        $json['client'] = \macis\classes\Clients::post($values);
        $json['user'] = $_SESSION['user'];
        echo json_encode($json, JSON_PRETTY_PRINT);
    });
    // Del client
    $this->delete('/{id:[0-9]+}', function (Request $request, Response $response, $args) {
        $id = $request->getAttribute('id');
        $json['client'] = \macis\classes\Clients::delete($id);
        $json['user'] = $_SESSION['user'];
        echo json_encode($json, JSON_PRETTY_PRINT);
    });
});
