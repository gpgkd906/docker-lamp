<?php

$installDir = realpath(__DIR__);

$userHome = getenv('HOME') . '/';
// find bash_config
$bash_rc = '.bash_rc';
$bash_profile = '.bash_profile';
$bash_config = null;
if (is_file($userHome . $bash_rc)) {
    $bash_config = $userHome . $bash_rc;
} elseif (is_file($userHome . $bash_profile)) {
    $bash_config = $userHome . $bash_profile;
}

if (!$bash_config) {
    echo "not found $userHome.bash_rc or $userHome.bash_profile!";
    return;
}
// find dockerdir
$dockerDir = $userHome . ".docker";
if (!is_dir($dockerDir)) {
    mkdir($dockerDir);
}
if (!is_dir($dockerDir)) {
    echo "not found $userHome.docker and can not create $userHome.docker";
    return;
}
// copy docker-resource to dockerdir
system("cp -R $installDir/* $dockerDir");
// add bin_path to bash_config
$bash_config_content = file_get_contents($bash_config);

$export = 'export PATH="$HOME/.docker/bin:$PATH"';
if (strpos($bash_config_content, $export) === false) {
    $bash_config_content .= PHP_EOL;
    $bash_config_content .= $export;
    file_put_contents($bash_config, $bash_config_content);
}
