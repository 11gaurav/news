<?php
$config = array(
        'news/create'=>array(
					array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|exact_length[5]|callback_title_check'
				)),
        array(
                'field' => 'text',
                'label' => 'Text',
                'rules' => 'required'
        )
);