<?php

function postList() {
    return ['article 1', 'skekfjherjh'];
}
function postShow($id) {
    return ['voici ton article' . $id];
}
function postAdd() {
    return ['article bien ajouté'];
}

header('Content-type: text/json');

// Il faudrait une réécriture d'URI
// afin de envoyer les requêtes sur le vrai nom de la ressource

$url = $_GET['url'] ?? null;

if (!$url) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'you must define a resource'
    ]);
    die;
}

$availableResources = [
    '/blog/post' => [
        'GET' => 'postList'
    ],
    '/blog/post/([^/]+)' => [
        'GET' => 'postShow',
        'POST' => 'postAdd',
    ],
];

$routeFound = null;
$args = null;

foreach($availableResources as $configRoute => $config) {
    preg_match('#^'.$configRoute.'$#', $url, $matches);
    if (count($matches) > 0) {
        $routeFound = $configRoute;
        $args = array_slice($matches, 1);
        break;
    }
}

if (!$routeFound) {
    http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'message' => 'defined resource is unknown'
    ]);
    die;
}

if (!key_exists($_SERVER['REQUEST_METHOD'], $availableResources[$routeFound])) {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'this method is not available'
    ]);
    die;
}
$action = $availableResources[$routeFound][$_SERVER['REQUEST_METHOD']];

$data = call_user_func_array($action, $args);
echo json_encode($data);

return;

// Extrait de code d'une action REST au sein du Framework Symfony
#[Route('/cpf', methods: 'GET')]
public function cpf(
    TrainingRepository $repository,
    TrainingSerializer $serializer
): Response {
    // traitement
    $trainings = $repository->findCpf();

    // normalisation dans un tableau associatif
    // serialisation en json
    return $this->json($serializer->serializeTreeCollection($trainings));
}
