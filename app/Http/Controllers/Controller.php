<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $data;
    private $statusCode;

    public function status($status)
    {
        $this->data['status'] = $status;
        return $this;
    }

    public function prepareValidationError($validator, $msg = 'Validation failed')
    {
        return $this->status('error')
            ->messages($msg)
            ->data($validator->errors()->all());
    }

    public function messages(array | string $msg): self
    {
        if ($msg) {
            if (is_array($msg)) {
                $this->data['messages'] = $msg;
            } else {
                $this->data['message'] = $msg;
            }
        }
        return $this;
    }

    public function data($data): self
    {
        if ($data) {
            $this->data['data'] = $data;
        }
        return $this;
    }

    public function get($code = 200)
    {
        return response()->json($this->data, $code);
    }

    public function returnValidationError($validator)
    {
        return $this->prepareValidationError($validator)->get(422);
    }

    public function prepareResponse($msg, $data)
    {
        return $this->messages($msg)->data($data);
    }

    public function returnResponse($msg, $data = [])
    {
        return $this->prepareResponse($msg, $data)->get();
    }

    public function returnError($msg, $code = 422, $data = [])
    {
        return $this->prepareResponse($msg, $data)->get($code);
    }
}
