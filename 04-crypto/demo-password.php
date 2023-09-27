<?php

$mdp = 'secret';

$hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

echo $hashedPassword."\n";

// password verify va hacher mdp avec
// le même algo, les mêmes options et le même sel
// visible au début de hashedPassword, exemple
// $argon2id$v=19$m=65536,t=4,p=1$US6zMJ3N08gKfhb9hVnnYA$4e2jHgyW0T0CzcvY8MdAAPQvWsDkaH4HMOaurcZDY3M
if (password_verify($mdp, $hashedPassword)) {
    echo 'hash identique';
} else {
    echo 'hash différent';
}

