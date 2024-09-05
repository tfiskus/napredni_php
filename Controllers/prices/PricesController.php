<?php

namespace Controllers;

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\ResourceInUseException;

class PricesController
{
    private Database $db;


    public function __construct()
    {
        $this->db = Database::get();
    }

    public function index()
    {
        $sql = "SELECT * from cjenik ORDER BY id";
        $prices = $this->db->query($sql)->all();

        $pageTitle = 'Cjenik';

        $message = Session::get('message');

        require base_path('views/prices/index.view.php');
    }

    public function show()
    {
        if (!isset($_GET['id'])) {
            abort();
    }

        $sql = "SELECT * from cjenik WHERE id = :id";
        
        $price = $this->db->query($sql, ['id' => $_GET['id']])->findOrFail();
        
        $pageTitle = 'Cijena';
        
        require base_path('views/prices/show.view.php');
    }

    public function edit()
    {
        if (!isset($_GET['id'])) {
            abort();
        }

        $sql = 'SELECT * from cjenik WHERE id = :id';

        $price = $this->db->query($sql, ['id' => $_GET['id']])->findOrFail();
        
        $pageTitle = "Uredi cijenu";
        
        $errors = Session::get('errors');

        require base_path('views/prices/edit.view.php');
    }

    public function update()
    {   
        if (!isset($_POST['id'] )) {
            abort();
        }
        
        $rules = [
            'id' => ['required', 'numeric'],
            'tip_filma' => ['required', 'string', 'max:50'],
            'cijena' => ['required', 'numeric','max:5']
        ];
        
        $sql = 'SELECT * from cjenik WHERE id = :id';
        $cijena = $this->db->query($sql, ['id' => $_POST['id']])->findOrFail();
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }

        $data = $form->getData();
        
        $sql = "UPDATE cjenik SET tip_filma = :tip_filma, cijena = :cijena WHERE id = :id";
        $this->db->query($sql, [
            'id' => $_POST['id'],
            'tip_filma' => $data['tip_filma'],
            'cijena' => $data['cijena']
        ]);
        
        $pageTitle = "Uredi cijenu";
        Session::flash('message', [
            'type' => 'success',
            'message' => "Cijena je uspješno promijenjena"
        ]);
        redirect('prices');
    }

    public function create()
    {
        $pageTitle = 'Kreiraj cijenu';
        $errors = Session::get('errors');
        require base_path('views/prices/create.view.php'); 
    }

    public function store()
    {
        $rules = [
            'tip_filma' => ['required', 'string', 'max:50', 'min:2'],
            'cijena' => ['required', 'numeric','max:5'],
        ];
        
        
        $form = new Validator($rules, $_POST);
        if ($form->notValid()){
            Session::flash('errors', $form->errors());
            goBack();
        }
        
        $data = $form->getData();
        
        $sql = "SELECT id FROM cjenik WHERE tip_filma = :tip_filma";
        $count = $this->db->query($sql, ['tip_filma' => $data['tip_filma']])->find();
        
        if(!empty($count)){
            die("Tip filma {$data['tip_filma']} vec postoji u nasoj bazi!");
        }
        
        $sql = "INSERT INTO cjenik (tip_filma, cijena, zakasnina_po_danu) VALUES (:tip_filma, :cijena, :zakasnina_po_danu)";
        $this->db->query($sql, [
            'tip_filma' => $data['tip_filma'],
            'cijena' => $data['cijena'],
            'zakasnina_po_danu' => $data['zakasnina_po_danu']
        ]);

        Session::flash('message', [
            'type' => 'success',
            'message' => "Cijena uspješno kreirana"
        ]);
        
        redirect('prices');     
    }

    public function destroy()
{
    if (!isset($_POST['id'])) {
        abort();
    }

    $medij = $this->db->query('SELECT * FROM cjenik WHERE id = ?', [$_POST['id']])->findOrFail();

    try {
        $this->db->query('DELETE FROM cjenik WHERE id = ?', [$medij['id']]);
    } catch (ResourceInUseException $e) {
        dd('Nije moguće obrisati cijenu.');  
    }

    Session::flash('message', [
        'type' => 'success',
        'message' => "Cijena uspješno obrisana!"
    ]);
    redirect('prices');
}