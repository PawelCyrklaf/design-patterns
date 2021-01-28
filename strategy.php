<?php declare(strict_types=1);

class PasswordHash
{
    private PasswordEncode $passwordEncode;

    public function __construct(PasswordEncode $passwordEncode)
    {
        $this->passwordEncode = $passwordEncode;
    }

    public function encodePassword(string $password)
    {
        return $this->passwordEncode->encode($password);
    }
}

interface PasswordEncode
{
    public function encode(string $password);
}

class BCryptEncode implements PasswordEncode
{

    public function encode(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

class ArgonEncode implements PasswordEncode
{

    public function encode(string $password)
    {
        return password_hash($password, PASSWORD_ARGON2I);
    }
}

$argonHash = new PasswordHash(new ArgonEncode());
echo 'Argon2i hash: ' . $argonHash->encodePassword("qwerty123");

$bCrypt = new PasswordHash(new BCryptEncode());
echo 'BCrypt hash: ' . $bCrypt->encodePassword("qwerty123");