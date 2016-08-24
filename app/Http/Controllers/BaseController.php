<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use View;
class BaseController extends Controller {

	public function __construct()
	  {

	    // Sharing is caring
	    View::share('isConnected', $this->isConnected());
	  }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	/**
  *function to test weather there is an authentified user
  * or not
  */
  public function isConnected()
  {
    $users=Admin::where('isConnected','=',1)->first();
    if($users===null)
      return false;
    else
      return true;
  }

}
