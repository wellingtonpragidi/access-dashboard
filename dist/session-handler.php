<?php
class FileSessionHandler {
    private $savePath;
    private $lifetime;

    public function open($savePath, $sessionName) {
    	# Ignore o savepath e use o nosso próprio para mantê-lo protegido contra GC automático
        $this->savePath = 'sessions';
        # Duração minima da sessão 1 mes
        $this->lifetime = 1314000;
        if(!is_dir($this->savePath)) {
            mkdir($this->savePath, 0777);
        }
        return true;
    }

    public function close() {
        return true;
    }

    public function read($id) {
        return (string)@file_get_contents($this->savePath.'/sess_'.$id);
    }

    public function write($id, $data) {
        return file_put_contents($this->savePath.'/sess_'.$id, $data) === false ? false : true;
    }

    public function destroy($id) {
        $file = $this->savePath.'/sess_'.$id;
        if(file_exists($file)) {
            unlink($file);
        }
        return true;
    }

    public function gc($maxlifetime) {
        foreach(glob($this->savePath.'/sess_*') as $file) {
        	# Use nossa própria vida
            if (filemtime($file) + $this->lifetime < time() && file_exists($file)) { 
                unlink($file);
            }
        }
        return true;
    }

}


/*$handler = new FileSessionHandler();
session_set_save_handler(
    array($handler, 'open'),
    array($handler, 'close'),
    array($handler, 'read'),
    array($handler, 'write'),
    array($handler, 'destroy'),
    array($handler, 'gc')
);
register_shutdown_function('session_write_close');
session_start();*/
session_set_cookie_params(1314000);
session_start();
setcookie(session_name(), session_id(), time() + 1314000);