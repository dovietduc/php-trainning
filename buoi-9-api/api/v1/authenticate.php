<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

require_once(__DIR__ . '/../../vendor/autoload.php');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use DomainException;
use InvalidArgumentException;
use UnexpectedValueException;

class Authenticate
{
    public function createToken($user)
    {
        $key = 'token_cua_toi';
        $currentTime = time();
        $payload = [
            // token có hiệu lực ngay khi tạo ra
            'iat' => $currentTime,
            // Thời gian token hết hạn
            'exp' => $currentTime + 30,
            // thông tin user login
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ];

        $jwtToken = JWT::encode($payload, $key, 'HS256');
        return $jwtToken;
    }

    public function validateTokenValid($jwtToken)
    {
        try {
            $key = 'token_cua_toi';
            $decoded = JWT::decode($jwtToken, new Key($key, 'HS256'));
            return $decoded;
        } catch (InvalidArgumentException $e) {
            // provided key/key-array is empty or malformed.
        } catch (DomainException $e) {
            // provided algorithm is unsupported OR
            // provided key is invalid OR
            // unknown error thrown in openSSL or libsodium OR
            // libsodium is required but not available.
        } catch (SignatureInvalidException $e) {
            // provided JWT signature verification failed.
        } catch (BeforeValidException $e) {
            // provided JWT is trying to be used before "nbf" claim OR
            // provided JWT is trying to be used before "iat" claim.
        } catch (ExpiredException $e) {
            // provided JWT is trying to be used after "exp" claim.
        } catch (UnexpectedValueException $e) {
            // provided JWT is malformed OR
            // provided JWT is missing an algorithm / using an unsupported algorithm OR
            // provided JWT algorithm does not match provided key OR
            // provided key ID in key/key-array is empty or invalid.
        }
    }
}