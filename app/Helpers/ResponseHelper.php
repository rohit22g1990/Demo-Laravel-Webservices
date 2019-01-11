<?php

namespace App\Helpers;


class ResponseHelper
{
    /**
     * Create api error response object from supplied error data
     *
     * @param $code
     * @param $message
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public static function getApiErrorResponseObject($code, $message, array $errors)
    {
        $response["message"] = $message;
        $response["errors"] = $errors;

        return response()->json((object)$response, $code);
    }

    /**
     * Unauthorised error array for API
     *
     * @param string $entity
     * @return array
     */
    public static function notFoundError(string $entity) : array
    {
        $error = [
            'type' => $entity,
            'message' => "Requested ".$entity." does not exist on the server.",
            'code' => "not_found"
        ];

        return [$error];
    }

    /**
     * Unauthorised error array for API
     *
     * @param string $entity
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendNotfoundError($entity = 'entity')
    {
        return self::getApiErrorResponseObject(
            config('constants.HTTP_CODES.NOT_FOUND'),
            'Requested '.$entity. ' does not found',
            self::notFoundError($entity)
        );
    }

}
