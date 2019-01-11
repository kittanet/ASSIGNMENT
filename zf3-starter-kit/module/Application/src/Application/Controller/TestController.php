<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Application\Models\Users;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;

use Zend\Cache\StorageFactory;
use Zend\Cache\Storage\Adapter\Memcached;
use Zend\Cache\Storage\StorageInterface;
use Zend\Cache\Storage\AvailableSpaceCapableInterface;
use Zend\Cache\Storage\FlushableInterface;
use Zend\Cache\Storage\TotalSpaceCapableInterface;
/*
$this->params()->fromPost('paramname');   // From POST
$this->params()->fromQuery('paramname');  // From GET
$this->params()->fromRoute('paramname');  // From RouteMatch
$this->params()->fromHeader('paramname'); // From header
$this->params()->fromFiles('paramname');
*/
class TestController extends AbstractActionController
{

    public function __construct()
    {
        $this->cacheTime = 36000;
        $this->now = date("Y-m-d H:i:s");
        $this->config = include __DIR__ . '../../../../config/module.config.php';
        $this->adapter = new Adapter($this->config['Db']);
    }

    public function findX()
    {
        $list = array(3,5,9,15);
        $len = 4;
        $diff = $list;

        while($len > 1){
            $len--;
            for($i = 0; $i < $len; $i++){
                $diff[$i] = $diff[$i + 1] - $diff[$i];
            }
            for($i = 1; $i < $len; $i++){
                if ($diff[$i] != $diff[$i - 1]){
                    break;
                }
            }
            if ($i != $len){
                break;
            }
        }
        $iteration = 4 - $len;
        for($i = $len; $i < $len + 1; $i++){
            $diff[$i] = $diff[$i - 1];
        }
        $len += 1;
        for ($i = 0; $i < $iteration; $i++){
            $len++;
            for ($j = $len - 1; $j > 0; $j--){
                $diff[$j] = $diff[$j - 1]; 
            }
            $diff[0] = 3;
            for ($j = 1; $j < $len; $j++){
                $diff[$j] = $diff[$j - 1] + $diff[$j]; 
            }
        }
        $view = new ViewModel();
        $view->list = $list;
        $view->result = $diff[4];
        return $view;
    } 

    public function indexAction()
    {
        try
        {
            $view = $this->findX();
            return $view;
        }
        catch( Exception $e )
        {
            print_r($e);
        }
    }

    public function apiAction()
    {
        $json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurant+in+Bangsue&key=AIzaSyDxN4TKOYy_qq0I9_3J0IGrxxoFSH0bJDo&language=th');
        $data = json_decode($json);
        $name = array();
        foreach ($data->results as $value){
            array_push($name,$value->name);
        }
        return new JsonModel([
            // 'status' => '200',
            // 'message'=> 'OK',
            // 'data' => [
                
            // ],
            'name' => $name
        ]);
    }
}