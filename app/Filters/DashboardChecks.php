<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DashboardChecks implements FilterInterface {

    public function before(RequestInterface $request, $params = null) {

        $uri = service('uri');
        if($uri->getSegment(1) == 'dashboard') {
            if($uri->getSegment(2) == '') {
                $segment = '/';
            } else {
                $segment = '/'.$uri->getSegment(2);
            }
            return redirect()->to($segment);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = NULL) {}
}