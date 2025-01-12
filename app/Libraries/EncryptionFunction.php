<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Crypt;
use Exception;

class EncryptionFunction
{
    public static function encode($data)
    {
        if (empty($data)) {
            return false;
        }

        // Step 1: Encrypt the data
        $encrypted = Crypt::encrypt($data);

        // Step 2: Compress the encrypted data
        $compressed = gzdeflate($encrypted, 9);

        // Step 3: Base64 encode the compressed result
        $base64Encoded = base64_encode($compressed);

        // Step 4: Replace Base64 characters to make it URL-safe
        $urlSafe = strtr($base64Encoded, '+/', '-_');

        // Step 5: Apply ROT13 for additional obfuscation
        return str_rot13($urlSafe);
    }

    public static function decode($data)
    {
        if (empty($data)) {
            return false;
        }

        try {
            // Step 1: Reverse ROT13
            $rot13Decoded = str_rot13($data);

            // Step 2: Reverse the URL-safe Base64 characters
            $base64Decoded = strtr($rot13Decoded, '-_', '+/');

            // Step 3: Base64 decode
            $compressed = base64_decode($base64Decoded);

            // Step 4: Decompress the data
            $decompressed = gzinflate($compressed);

            // Step 5: Decrypt the data
            return Crypt::decrypt($decompressed);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Encode the ID securely using Laravel's encryption.
     */
    public static function encodeId($id)
    {
        if (empty($id) || !ctype_digit((string)$id)) {
            return false;
        }

        return EncryptionFunction::encode($id);
    }

    /**
     * Decode the ID securely using Laravel's decryption.
     */
    public static function decodeId($encodedId)
    {
        $decodedId = EncryptionFunction::decode($encodedId);
        if (empty($decodedId) || !ctype_digit((string)$decodedId)) {
            return false;
        }
        return $decodedId;
    }
}
