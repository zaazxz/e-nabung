<?php

namespace App\Http\resource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    /* Define Property */
    public $code;
    public $message;
    public $data;

    /* Constructor for response */
    public function __construct($code, $message, $data) {
        parent::__construct($data);
        $this->code = $code;
        $this->message = $message;
    }

    /* Convert the resource into an array */
    public function toArray(Request $request) {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }

}

?>
