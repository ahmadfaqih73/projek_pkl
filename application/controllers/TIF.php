class Admin extends CI_Controller {

public function __construct()
{
parent::__construct();

// ini adalah untuk menghindari menebak url pada dan memakai session
// untuk menghalngi
// if(!$this->session->userdata('email')){
// redirect('auth');
// }
is_logged_in();

}
public function index()
{
$data['title'] = 'Dashboard';
$data['user'] = $this->db->get_where('user', ['email' =>
$this->session->userdata('email')])->row_array();

$this->load->view('templates/header', $data);
$this->load->view('templates/sidebar', $data);
$this->load->view('templates/topbar', $data);
$this->load->view('admin/index', $data);
$this->load->view('templates/footer');
}
}