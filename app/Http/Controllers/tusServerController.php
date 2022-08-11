<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tusServerController extends Controller
{
    public function indexAction() {
        // Disable views/layout the way suites your framework
        $server = $this->_getTusServer();
        $response = $server->serve();
        // $this->_fixNonSecureLocationHeader($response);
        $response->send();
    }
  
    private function _getTusServer() {
        \TusPhp\Config::set([
            /**
             * File cache configs.
             *
             * Adding the cache in the '/tmp/' because it is the only place writable by
             * all users on the production server.
             */
            'file' => [
                'dir' => storage_path('app/public/uploads'),
                'name' => 'tus_php.cache',
            ],
        ]);
        // print_r(public_path());exit;

        $server = new \TusPhp\Tus\Server('redis'); // Using File Cache (over Redis) for simpler setup
        $server->setApiPath('/tus') // tus server endpoint.
                ->setUploadDir(storage_path('app/public/uploads')); // uploads dir.
        return $server;
    }
  
    /**
     * The `location` header is where the client js library will upload the file through,
     * But, the load-balancer takes the `https` request & passes it as
     * `http` only to the servers, which is tricking Tus server,
     * so, we have to change it back here.
     *
     * @param type $response
     */
    private function _fixNonSecureLocationHeader(&$response) {
        $location = $response->headers->get('location');
        if (!empty($location)) {// `location` is sent to the client only the 1st time
            $location = preg_replace("/^http:/i", "http:", $location);
            $response->headers->set('location', $location);
        }
    }

    public function view()
    {
        return view('tusUpload');
    }
}
