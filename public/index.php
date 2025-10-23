<?php
// API PHP simples (sem framework) — /contatos (GET/POST)
// Para rodar local: php -S 0.0.0.0:8080 -t public

header('Content-Type: application/json; charset=utf-8');
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/contatos') {
  if ($method === 'GET') {
    echo json_encode([
      ['id'=>1,'nome'=>'Ana','email'=>'ana@example.com'],
      ['id'=>2,'nome'=>'Bruno','email'=>'bruno@example.com']
    ]);
    exit;
  }
  if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!isset($data['nome'], $data['email'])) {
      http_response_code(422);
      echo json_encode(['erro'=>'Campos nome e email são obrigatórios.']);
      exit;
    }
    $data['id'] = rand(100,999);
    http_response_code(201);
    echo json_encode($data);
    exit;
  }
}
http_response_code(404);
echo json_encode(['erro'=>'Rota não encontrada']);
