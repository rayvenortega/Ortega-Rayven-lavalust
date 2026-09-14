<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->call->database();
        $this->form_validation = $this->call->library('form_validation');
        $this->call->helper('security');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user_id'])) {
            $_SESSION['auth_error'] = 'Please log in to access the products.';
            redirect('login');
            exit;
        }

        $this->ProductModel = $this->call->model('ProductModel');
    }

    public function index()
    {
        $data['products'] = $this->ProductModel->get_all();

        $this->call->view('products/index', $data);
    }

    public function create()
    {
        $this->call->view('products/create');
    }

    public function store()
    {
        $product_name = trim(strip_tags((string) filter_io('string', $this->io->post('product_name') ?? '')));
        $description  = trim(strip_tags((string) filter_io('string', $this->io->post('description') ?? '')));
        $price        = filter_var($this->io->post('price') ?? 0, FILTER_VALIDATE_FLOAT);
        $quantity     = filter_var($this->io->post('quantity') ?? 0, FILTER_VALIDATE_INT);

        $this->form_validation->name('product_name')->required()->max_length(150);
        $this->form_validation->name('description')->required()->max_length(1000);
        $this->form_validation->name('price')->required()->numeric()->greater_than_equal_to(0);
        $this->form_validation->name('quantity')->required()->numeric()->greater_than_equal_to(0);

        if (!$this->form_validation->run()) {
            $_SESSION['product_error'] = implode('<br>', $this->form_validation->get_errors());
            redirect('products/create');
            return;
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ];

        $this->ProductModel->insert($data);

        redirect('products');
    }

    public function edit($id)
    {
        $product = $this->ProductModel->get_by_id($id);

        if (!$product) {
            redirect('products');
            return;
        }

        $data['product'] = $product;

        $this->call->view('products/edit', $data);
    }

    public function update($id)
    {
        $product_name = trim(strip_tags((string) filter_io('string', $this->io->post('product_name') ?? '')));
        $description  = trim(strip_tags((string) filter_io('string', $this->io->post('description') ?? '')));
        $price        = filter_var($this->io->post('price') ?? 0, FILTER_VALIDATE_FLOAT);
        $quantity     = filter_var($this->io->post('quantity') ?? 0, FILTER_VALIDATE_INT);

        $this->form_validation->name('product_name')->required()->max_length(150);
        $this->form_validation->name('description')->required()->max_length(1000);
        $this->form_validation->name('price')->required()->numeric()->greater_than_equal_to(0);
        $this->form_validation->name('quantity')->required()->numeric()->greater_than_equal_to(0);

        if (!$this->form_validation->run()) {
            $_SESSION['product_error'] = implode('<br>', $this->form_validation->get_errors());
            redirect('products/edit/' . (int) $id);
            return;
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => number_format((float) $price, 2, '.', ''),
            'quantity'     => (int) $quantity
        ];

        $this->ProductModel->update($id, $data);

        redirect('products');
    }

    public function delete($id)
    {
        $this->ProductModel->delete($id);

        redirect('products');
    }
}