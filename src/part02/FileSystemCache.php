<?php
namespace org\bovigo\vfs\examples\part02;

class FileSystemCache {

    private $dir;

    private $permissions;

    public function __construct($dir, $permissions = 0700) {
        $this->dir = $dir;
        $this->permissions = $permissions;
    }

    public function store($key, $data) {
        if (!file_exists($this->dir)) {
            mkdir($this->dir, $this->permissions, true);
        }

        file_put_contents($this->dir . '/' . $key, serialize($data));
    }
}
