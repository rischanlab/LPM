<?
/***************************************************************************
* Mediatutorial.web.id
***************************************************************************/
class Mediatutorialprofile extends CI_Model {
    function __construct()
    {
        parent::__construct();	
        $this->load->helper(array('html','url'));
    }
    
    /*
     fungsi untuk men-generate profile thumb
    */
	
	function getPath($nim){
		$query = $this->db->query("select PATH_FOTO from KKN_MHS where NIM='$nim'");
		return $query;
	}
	
    function genProfileThumb($ppq){
         
        $tmpl = '_thumbnail_with_status';
        $recent_status = '';
		
		
        $recent_profilepic = base_url().'uploads/foto/'.$ppq;
        //
        $data = array(
            'recent_status' => $recent_status,
            'recent_profilepic' => img($recent_profilepic)
        );
        return $this->load->view($tmpl, $data, true);
        
    }
}