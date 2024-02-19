<?php

namespace App\Controllers;

use App\Models\Contactos;

class ContactosController
{
    #Propiedades de la clase
    private $requestMethod; //Metodo http
    private $contactosId; //Id del contacto
    private $contactos; //Contactos
    #Constructor. Necesita Petición y id del contacto
    public function __construct($requestMethod, $contactosId)
    {
        $this->requestMethod = $requestMethod;
        $this->contactosId = $contactosId;
        $this->contactos = new Contactos();
    }

    /**
     * Función que procesa la petición
     */
    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->contactosId) {
                    $response = $this->getContactos($this->contactosId);
                } else {
                    $response = $this->getAllContactos();
                };
                break;
            case 'POST':
                // $input = (array) json_decode(file_get_contents('php://input'), TRUE);
                $response = $this->createContactosFromRequest();
                break;
            case 'PUT':
                $response = $this->updateContactos($this->contactosId);
                break;
            case "DELETE":
                $response = $this->deleteContactos($this->contactosId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }
    /**
     * Funcion que se encarfa de conectar con el modelo para recuperar la información.
     * @input: El id del contacto que queremos recuperar.
     * @return: La información del contacto en formato JSON.
     */
    private function getContactos($id)
    {
        $result = $this->contactos->get($id);
        if (!$result) {
            return $this->notFoundResponse();
        }
        #Cargamos los datos en $response para crear la respuesta.
        #La respuesta es un array 
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    /**
     * Funcion 
     * @return: Respuesta codificada en JSON.
     
     */
    private function getAllContactos()
    {
        $result = $this->contactos->getAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
    /**
     * Funcion que crea la respuesta cuando no se han encontrado los datos del modelo.
     * 
     * @return void
     */

    private function notFoundResponse(): array
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
    private function createContactosFromRequest()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        echo json_encode($input);
        if (!$this->validateContacto($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->contactos->set($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode(array("mensaje" => "Contacto creado"));
        return $response;
    }
    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode(['error' => 'Invalid input']);
        return $response;
    }
    private function validateContacto($input)
    {
        if (!isset($input['nombre'])) {
            return false;
        }
        if (!isset($input['telefono'])) {
            return false;
        }
        return true;
    }
    private function deleteContactos($id)
    {
        $this->contactos->delete($id);
        $result = $this->notFoundResponse();
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode(array("mensaje" => "Contacto borrado"));
        return $response;
    }
    private function updateContactos()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (!$this->validateContacto($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->contactos->edit($this->contactosId, $input);
        $result = $this->notFoundResponse();    
        if (!$result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode(array("mensaje" => "Contacto actualizado"));
        return $response;
        
    }
}
