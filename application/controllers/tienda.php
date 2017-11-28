<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: isra
 * Date: 24/02/13
 * Time: 12:54
 * To change this template use File | Settings | File Templates.
 */
class Tienda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('default');
        $this->load->helper(array('url','form'));
        $this->load->library(array('cart','session'));
        $this->load->model('tienda_model');
    }

    public function index()
    {
        $data = array('titulo'=>'','productos' => $this->tienda_model->productos());
        $this->load->view('paypal_view',$data);
    }

    public function indexx()
    {
        $this->load->view('pago');
    }

    public function paypal()
    {
        $config['business'] = 'acuestarosa@uniminuto.edu.co';
      
        $config['return'] = base_url('tienda/success');
        $config['cancel_return'] = base_url('tienda');
        $config['notify_url'] = base_url('tienda/data_paypal_post'); //IPN Post
        $config['production'] = false; //Its false by default and will use sandbox
        $config['discount_rate_cart'] = 5;
        $config["invoice"] = rand(1000,10000); //The invoice id

        $this->load->library('paypal', $config);

        $carrito = $this->cart->contents();

        foreach($carrito as $rows)
        {
            $this->paypal->add($rows['name'],$rows['price'],$rows['qty']);
        }

        $this->paypal->pay();
    }

    function insert()
    {
        $id = $this->input->post('id');
        $producto = $this->tienda_model->producto_id($id);
        $cantidad = $this->input->post('qty');

        $carrito = $this->cart->contents();

        foreach ($carrito as $item) {
            if ($item['id'] == $id) {
                $cantidad = $cantidad + $item['qty'];
            }
        }


        $insert = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $producto->precio,
            'name' => $producto->nombre
        );

        $this->cart->insert($insert);

        redirect(base_url('tienda'));
    }

    public function eliminar_producto($rowid)
    {

        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($producto);

        redirect(base_url('tienda/indexx'));
    }

    public function restar_producto($rowid)
    {
        $carrito = $this->cart->contents();

        foreach ($carrito as $item) {
            if ($item['rowid'] == $rowid && $item['qty'] > 0) {
                $qty = $item['qty'];
                $cantidad = $qty - 1;
                $precio = $item['price'] * $qty;
                $nombre = $item['name'];
            }
        }

        $producto = array(
            'rowid' => $rowid,
            'qty' => $cantidad,
            'price' => $precio,
            'name' => $nombre
        );

        $this->cart->update($producto);

        redirect(base_url('tienda/indexx'));
    }

    public function vaciar_carrito()
    {
        $this->cart->destroy();
        redirect(base_url('tienda'));
    }

    public function success()
    {
        $this->cart->destroy();
        print_r($_POST);
    }

}
