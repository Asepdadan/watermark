<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('image_lib');
    }

    public function index()
    {
        $this->load->view('upload');
    }
//watermark success
    function do_upload()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width']  = '100024';
        $config['max_height']  = '76800';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->watermark($data['upload_data']['full_path']);

            $this->load->view('success', $data);
        }
    }


    public function watermark($path){
        $config['source_image'] = $path;
        $config['wm_text'] = 'Asdan Watermark';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './system/fonts/texb.ttf';
        $config['wm_font_size'] = '20';
        $config['wm_font_color'] = '#0E0808';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '1';

        $this->image_lib->initialize($config);

        $this->image_lib->watermark();


    }

}
