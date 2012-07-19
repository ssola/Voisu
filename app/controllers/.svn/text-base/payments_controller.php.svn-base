<?php
class Payments_Controller extends Controller {
	private $product_id;
	private $product;
	private $products;

	public function __construct() {
		parent::__construct();
		$this->products = loadModel("Products");
	}

	public function _before_checkout() {
		global $_load;

		$product_id = $_load['uri']->getID();

		if ( is_numeric ( $product_id ) ) {
			$this->product_id = $product_id;
			$this->product = $this->products->getProductInfo($this->product_id);
			if ( !$this->product ) {
				redirect("index");
			}
		} else {
			redirect("index");
		}
	}

	public function checkout() {
		global $_load;

		$title = __("Finalice su pago");
		$breadcrumb = array (
			__('Home') => "#",
			__('Payment') => "#",
			__('Product') => "#",
			$this->product->name => ""
		);

		$product = $this->product;

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact('title', 'current_user','breadcrumb','product');
		Haanga::Load("payments/checkout.php", $vars );
	}

	public function _before_proceed() {
		global $_load;

		$product_id = $_load['uri']->getID();

		if ( is_numeric ( $product_id ) ) {
			$this->product_id = $product_id;
			$this->product = $this->products->getProductInfo($this->product_id);
			if ( !$this->product ) {
				redirect("index");
			}
		} else {
			redirect("index");
		}
	}	

	public function proceed() {
		$p = new Paypal();
		$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	    $p->add_field('business', 'yo@sergiosola.com');
	    $p->add_field('return', 'http://peroya.loc/');
	    $p->add_field('cancel_return', $this_script.'?action=cancel');
	    $p->add_field('notify_url', 'http://peroya.loc/payments/checkipn');
	    $p->add_field('item_name', $this->product->name);
	    $p->add_field('amount', $this->product->final_price);
	    $p->add_field('currency_code', 'EUR');
	    $p->add_field('item_number', base64_encode($this->product->id."|".$this->current_user->id));

        $p->submit_paypal_post();
	}

	public function checkipn() {
		$p = new Paypal();
		$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

    if ($p->validate_ipn()) {
          
         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.
  
         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.
  
         // For this example, we'll just email ourselves ALL the data.
         $subject = 'Instant Payment Notification - Recieved Payment';
         $to = 'introduccio@gmail.com';    //  your email
         $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";
         
         foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
         mail($to, $subject, $body);
      }
	}

	public function _logged_index() {
		redirect("index");
	}

	public function index() {
		global $_load;

		$title = __("Your payments - peroya.es");

		$breadcrumb = array (
			__('Home') => "#",
			__('Payments') => ""
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact('title', 'breadcrumb');

		Haanga::Load("payments/index.php", $vars);
	}
}