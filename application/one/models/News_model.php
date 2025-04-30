<?php
class News_model extends CI_Model
{

        public function __construct()
        {
                // $this->load->database();
        }

        public function get_news($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $query = $this->db->get('news');
                        return $query->result_array();
                }

                $query = $this->db->get_where('news', array('slug' => $slug));
                return $query->row_array();
        }

        public function set_news()
        {
                $this->load->helper('url');

                $slug = url_title($this->input->post('title'), 'dash', TRUE);

                $data = array(
                        'title' => $this->input->post('title'),
                        'slug' => $slug,
                        'text' => $this->input->post('text')
                );

                return $this->db->insert('news', $data);
        }


        public function get_title_count($current_title) {
                $this->db->select('COUNT(title) as count');
                $this->db->from('news');
                $this->db->where('title=',$current_title);
                $query = $this->db->get();
                $result = $query->row();
                return $result->count;
            }
            
        }
